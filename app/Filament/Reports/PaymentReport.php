<?php

namespace App\Filament\Reports;

use EightyNine\Reports\Report;
use EightyNine\Reports\Components\Body;
use EightyNine\Reports\Components\Footer;
use EightyNine\Reports\Components\Header;
use Filament\Forms\Form;
use App\Models\Payment;
use Illuminate\Support\Collection;
use EightyNine\Reports\Components\Text;
use EightyNine\Reports\Components\VerticalSpace;

class PaymentReport extends Report
{
    public ?string $heading = "Payment Report";

    public function header(Header $header): Header
    {
        return $header
            ->schema([
                Header\Layout\HeaderRow::make()
                    ->schema([
                        Header\Layout\HeaderColumn::make()
                            ->schema([
                                Text::make('Payment Report')
                                    ->title(),
                                Text::make('This report shows all payments in the system')
                                    ->subtitle(),
                            ]),
                        Header\Layout\HeaderColumn::make()
                            ->schema([
                                Text::make(now()->format('F, d Y'))
                                    ->subtitle(),
                            ])->alignRight(),
                    ])
            ]);
    }

    public function body(Body $body): Body
    {
        return $body
            ->schema([
                Body\Layout\BodyColumn::make()
                    ->schema([
                        Body\Table::make()
                            ->data(
                                fn(?array $filters) => $this->paymentSummary($filters)
                            ),
                        VerticalSpace::make(),
                        Body\Table::make()
                            ->data(
                                fn(?array $filters) => $this->statusSummary($filters)
                            ),
                    ]),
            ]);
    }

    public function filterForm(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('search')
                    ->placeholder('Search')
                    ->autofocus(),
                \Filament\Forms\Components\Select::make('payment_status')
                    ->label('Payment Status')
                    ->native(false)
                    ->options([
                        'all' => 'All',
                        'paid' => 'Paid',
                        'pending' => 'Pending',
                        'failed' => 'Failed',
                    ]),
                \Filament\Forms\Components\DatePicker::make('date_from')
                    ->label('Payment Date From')
                    ->timezone('Asia/Manila')
                    ->displayFormat('F d, Y')
                    ->maxDate(now())
                    ->native(false),
                \Filament\Forms\Components\DatePicker::make('date_to')
                    ->label('Payment Date To')
                    ->timezone('Asia/Manila')
                    ->displayFormat('F d, Y')
                    ->maxDate(now())
                    ->native(false),
                \Filament\Forms\Components\Actions::make([
                    \Filament\Forms\Components\Actions\Action::make('reset')
                        ->label('Reset Filters')
                        ->color('danger')
                        ->action(function (Form $form) {
                            $form->fill([
                                'search' => null,
                                'payment_status' => null,
                                'date_from' => null,
                                'date_to' => null,
                            ]);
                        })
                ]),
            ]);
    }

    public function paymentSummary(?array $filters): Collection
    {
        $query = Payment::query();

        $filtersApplied = false;

        if (isset($filters['search']) && !empty($filters['search'])) {
            $query->whereHas('tenant', function ($q) use ($filters) {
                $q->where('first_name', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('last_name', 'like', '%' . $filters['search'] . '%');
            })->orWhere('unit_number', 'like', '%' . $filters['search'] . '%');
            $filtersApplied = true;
        }

        if (isset($filters['payment_status']) && $filters['payment_status'] !== 'all') {
            $query->where('payment_status', $filters['payment_status']);
            $filtersApplied = true;
        }

        if (isset($filters['date_from'])) {
            $query->whereDate('created_at', '>=', $filters['date_from']);
            $filtersApplied = true;
        }

        if (isset($filters['date_to'])) {
            $query->whereDate('created_at', '<=', $filters['date_to']);
            $filtersApplied = true;
        }

        if (!$filtersApplied) {
            return collect();
        }

        $payments = $query->with('tenant')->latest()->get();

        return collect([
            [
                'column1' => 'Date',
                'column2' => 'Tenant Name',
                'column3' => 'Unit Number',
                'column4' => 'Amount',
                'column5' => 'Payment Type',
                'column6' => 'Status',
            ]
        ])->concat($payments->map(function ($payment) {
            return [
                'column1' => $payment->created_at->format('F d, Y'),
                'column2' => $payment->tenant->first_name . ' ' . $payment->tenant->last_name,
                'column3' => $payment->unit_number,
                'column4' => '₱' . number_format($payment->amount, 2),
                'column5' => $payment->payment_type,
                'column6' => ucfirst($payment->payment_status),
            ];
        }));
    }

    public function statusSummary(?array $filters): Collection
    {
        $query = Payment::query();

        $filtersApplied = false;

        if (isset($filters['date_from'])) {
            $query->whereDate('created_at', '>=', $filters['date_from']);
            $filtersApplied = true;
        }

        if (isset($filters['date_to'])) {
            $query->whereDate('created_at', '<=', $filters['date_to']);
            $filtersApplied = true;
        }

        if (!$filtersApplied) {
            return collect();
        }

        $totalAmount = $query->sum('amount');
        $paidAmount = (clone $query)->where('payment_status', 'paid')->sum('amount');
        $pendingAmount = (clone $query)->where('payment_status', 'pending')->sum('amount');
        $failedAmount = (clone $query)->where('payment_status', 'failed')->sum('amount');

        return collect([
            [
                'column1' => 'Status',
                'column2' => 'Amount',
            ],
            [
                'column1' => 'Paid Payments',
                'column2' => '₱' . number_format($paidAmount, 2),
            ],
            [
                'column1' => 'Pending Payments',
                'column2' => '₱' . number_format($pendingAmount, 2),
            ],
            [
                'column1' => 'Failed Payments',
                'column2' => '₱' . number_format($failedAmount, 2),
            ],
            [
                'column1' => 'Total',
                'column2' => '₱' . number_format($totalAmount, 2),
            ],
        ]);
    }
}
