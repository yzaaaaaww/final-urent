<?php

namespace App\Filament\Reports;

use EightyNine\Reports\Report;
use EightyNine\Reports\Components\Body;
use EightyNine\Reports\Components\Footer;
use EightyNine\Reports\Components\Header;
use EightyNine\Reports\Components\Text;
use EightyNine\Reports\Components\VerticalSpace;
use Filament\Forms\Form;
use App\Models\Tenant;
use Illuminate\Support\Collection;

class UnitReport extends Report
{
    public ?string $heading = "Report";

    // public ?string $subHeading = "A great report";

    public function header(Header $header): Header
    {
        return $header
            ->schema([
                Header\Layout\HeaderRow::make()
                    ->schema([
                        Header\Layout\HeaderColumn::make()
                            ->schema([
                                Text::make('Unit Report')
                                    ->title(),
                                Text::make('This report shows unit in the system')
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
                                fn(?array $filters) => $this->tenantSummary($filters)
                            ),
                        VerticalSpace::make(),
                        Body\Table::make()
                            ->data(
                                fn(?array $filters) => $this->statusSummary($filters)
                            ),
                    ]),
            ]);
    }

    public function footer(Footer $footer): Footer
    {
        return $footer
        ->schema([
            Footer\Layout\FooterRow::make()
                ->schema([
                    Footer\Layout\FooterColumn::make()
                        ->schema([
                            Text::make("URent")
                                ->title()
                                ->primary(),
                            Text::make("All Rights Reserved")
                                ->subtitle(),
                        ]),
                    Footer\Layout\FooterColumn::make()
                        ->schema([
                            Text::make("Generated on: " . now()->format('F d, Y')),
                        ])
                        ->alignRight(),
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
                \Filament\Forms\Components\Select::make('lease_status')
                    ->label('Lease Status')
                    ->native(false)
                    ->options([
                        'all' => 'All',
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ]),
                \Filament\Forms\Components\DatePicker::make('date_from')
                    ->label('Lease Start From')
                    ->timezone('Asia/Manila')
                    ->displayFormat('F d, Y')
                    ->maxDate(now())
                    ->native(false),
                \Filament\Forms\Components\DatePicker::make('date_to')
                    ->label('Lease Start To')
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
                                'lease_status' => null,
                                'date_from' => null,
                                'date_to' => null,
                            ]);
                        })
                ]),
            ]);
    }

    public function tenantSummary(?array $filters): Collection
    {
        $query = Tenant::query();

        $filtersApplied = false;

        if (isset($filters['search']) && !empty($filters['search'])) {
            $query->whereHas('tenant', function ($q) use ($filters) {
                $q->where('first_name', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('last_name', 'like', '%' . $filters['search'] . '%');
            })->orWhereHas('unit', function ($q) use ($filters) {
                $q->where('unit_number', 'like', '%' . $filters['search'] . '%');
            });
            $filtersApplied = true;
        }

        if (isset($filters['lease_status']) && $filters['lease_status'] !== 'all') {
            $query->where('is_active', $filters['lease_status'] === 'active');
            $filtersApplied = true;
        }

        if (isset($filters['date_from'])) {
            $query->whereDate('lease_start', '>=', $filters['date_from']);
            $filtersApplied = true;
        }

        if (isset($filters['date_to'])) {
            $query->whereDate('lease_start', '<=', $filters['date_to']);
            $filtersApplied = true;
        }

        if (!$filtersApplied) {
            return collect();
        }

        $tenants = $query->with(['tenant', 'unit'])->latest('lease_start')->get();

        return collect([
            [
                'column1' => 'Lease Start',
                'column2' => 'Tenant Name',
                'column3' => 'Unit Number',
                'column4' => 'Monthly Payment',
                'column5' => 'Status',
            ]
        ])->concat($tenants->map(function ($tenant) {
            return [
                'column1' => $tenant->lease_start->format('F d, Y'),
                'column2' => $tenant->tenant->first_name . ' ' . $tenant->tenant->last_name,
                'column3' => $tenant->unit->unit_number,
                'column4' => '₱' . number_format($tenant->monthly_payment, 2),
                'column5' => $tenant->is_active ? 'Active' : 'Inactive',
            ];
        }));
    }

    public function statusSummary(?array $filters): Collection
    {
        $query = Tenant::query();

        $filtersApplied = false;

        if (isset($filters['date_from'])) {
            $query->whereDate('lease_start', '>=', $filters['date_from']);
            $filtersApplied = true;
        }

        if (isset($filters['date_to'])) {
            $query->whereDate('lease_start', '<=', $filters['date_to']);
            $filtersApplied = true;
        }

        if (!$filtersApplied) {
            return collect();
        }

        $totalCount = $query->count();
        $activeCount = (clone $query)->where('is_active', true)->count();
        $inactiveCount = $totalCount - $activeCount;

        return collect([
            [
                'column1' => 'Status',
                'column2' => 'Count',
            ],
            [
                'column1' => 'Active Leases',
                'column2' => $activeCount,
            ],
            [
                'column1' => 'Inactive Leases',
                'column2' => $inactiveCount,
            ],
            [
                'column1' => 'Total',
                'column2' => $totalCount,
            ],
        ]);
    }
}
