<?php

namespace App\Filament\App\Pages;

use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Tenant;
use Filament\Notifications\Notification;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmation;
use App\Models\Payment;
use App\Services\ReportForm;
use App\Models\Report;
// use App\Filament\App\Resources\TenantSpaceResource\Widgets\WaterMonthlyBills;
// use App\Filament\App\Resources\TenantSpaceResource\Widgets\ElectricityMonthlyBills;

class TenantSpace extends Page implements HasForms, HasTable
{
    public $tenantId;

    use InteractsWithForms, InteractsWithTable;

    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         WaterMonthlyBills::class,
    //         ElectricityMonthlyBills::class,
    //     ];
    // }

    protected static ?string $title = 'Tenant';
    
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static string $view = 'filament.app.pages.tenant-space';

    public function table(Table $table): Table
    {
        return $table
            ->query(Tenant::query()
                ->where('is_active', true)
                ->where('tenant_id', auth()->user()->id))
            ->headerActions([
                Tables\Actions\Action::make('viewReports')
                    ->label('View Reports')
                    ->url(fn() => route('filament.app.pages.reports'))
                    ->icon('heroicon-o-document-text')
                    ->openUrlInNewTab()
            ])
            ->columns([
                Tables\Columns\TextColumn::make('tenant.name')
                    ->description(fn($record) => $record->unit->name)   
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('owner.name')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('lease_start')
                    ->dateTime('F j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('lease_end')
                    ->dateTime('F j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('lease_due')
                    ->dateTime('F j, Y')
                    ->sortable()
                    ->disabled()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('lease_term')
                    ->label('Lease Term')
                    ->formatStateUsing(fn($state) => $state . ' Months')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('lease_status')
                    ->label('Lease Status')
                    ->badge()
                    ->extraAttributes(['class' => 'capitalize'])
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('monthly_payment')
                    ->label('Rent Monthly Payment')
                    ->description(fn($record) => $record->rent_payment_status ?? '')
                    ->extraAttributes(['class' => 'capitalize'])
                    ->prefix('₱')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('water_bill')
                    ->label('Water Bill')
                    ->description(fn($record) => $record->water_payment_status ?? '')
                    ->extraAttributes(['class' => 'capitalize'])
                    ->prefix('₱')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('electric_bill')
                    ->label('Electric Bill')
                    ->description(fn($record) => $record->electric_payment_status ?? '')
                    ->extraAttributes(['class' => 'capitalize'])
                    ->prefix('₱')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('F j, Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\Action::make('payBills')
                    ->label('Bills to Pay')
                    ->button()
                    ->action(fn($record) => $this->payWithGCash($record))
                    ->visible(fn($record) => $record->rent_payment_status !== 'Paid' && $record->monthly_payment > 0 || $record->water_payment_status !== 'Paid' && $record->water_bill > 0 || $record->electric_payment_status !== 'Paid' && $record->electric_bill > 0),
                Tables\Actions\CreateAction::make('create')
                    ->label('Report Issue')
                    ->disableCreateAnother()
                    ->modalHeading('Report Issue')
                    ->modalDescription('Report an issue with your unit.')
                    ->modalSubmitActionLabel('Report Issue')
                    ->modalCancelActionLabel('Cancel')
                    ->form(fn(Tenant $record) => ReportForm::schema($record))
                    ->action(function (array $data, Tenant $record) {
                        Report::create([
                            'landlord_email' => 'admin@example.com',
                            'unit_number' => $record->unit->unit_number,
                            'email' => auth()->user()->email,
                            'phone' => $data['phone'],
                            'issue_type' => $data['issue_type'],
                            'message' => $data['message'],
                            'status' => 'pending',
                        ]);

                        Notification::make()
                            ->title('Report Submitted')
                            ->body('Your issue has been reported successfully.')
                            ->success()
                            ->send();
                    })
            ]);
    }

    protected function payWithGCash($record)
    {
        
        $monthlyRent = $record->monthly_payment;
        $waterBill = $record->water_bill;
        $electricBill = $record->electric_bill;
        $total = $monthlyRent + $waterBill + $electricBill;
        $lineItems = [
            [
                'currency' => 'PHP',
                'amount' => $total * 100,
                'description' => 'Utility and Rent Bills',
                'name' => 'Utility and Rent Bills',
                'quantity' => 1,
            ]
        ];

        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => $lineItems,
                    'amount_total' => $total * 100,
                    'payment_method_types' => ['gcash'],
                    'success_url' => route('filament.app.pages.tenant-space.payment-success', ['record' => $record->id]),
                    'cancel_url' => route('filament.app.pages.tenant-space.payment-cancel'),
                    'description' => 'Payment for monthly rent',
                ],
            ],
        ];

        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic c2tfdGVzdF9ZS1lMMnhaZWVRRDZjZ1dYWkJYZ1dHVU46')
            ->withData($data)
            ->asJson()
            ->post();

        if (isset($response->data)) {
            $checkoutSession = $response->data;
            $checkoutUrl = $checkoutSession->attributes->checkout_url;

            // Redirect the user to the GCash checkout URL
            return redirect()->away($checkoutUrl);
        } else {
            $this->notify('danger', 'Payment Failed', 'An error occurred while processing your payment. Please try again.');
            return null;
        }
    }

    protected function notify($status, $title, $message)
    {
        Notification::make()
            ->title($title)
            ->body($message)
            ->status($status)
            ->send();
    }

    protected function sendPaymentConfirmationEmail($tenant)
    {
        $user = $tenant->tenant;

        if ($user) {
            Mail::to($user->email)->send(new PaymentConfirmation($tenant, $user));
        }
    }

    public function handlePaymentSuccess($recordId)
    {
        $tenant = Tenant::findOrFail($recordId);

        // Store the amount paid before resetting
        $amountPaid = $tenant->monthly_payment;

        // Update tenant record
        $tenant->monthly_payment = 0;
        $tenant->water_bill = 0;
        $tenant->electric_bill = 0;
        $tenant->rent_payment_status = 'Paid';
        $tenant->water_payment_status = 'Paid';
        $tenant->electric_payment_status = 'Paid';
        $tenant->save();

        // Create a new Payment record
        Payment::create([
            'tenant_id' => $tenant->id,
            'unit_number' => $tenant->unit->unit_number,
            'amount' => $amountPaid,
            'payment_type' => 'Monthly Rent',
            'payment_details' => json_encode(['Monthly Rent' => $amountPaid]),
            'payment_method' => 'GCash',
            'payment_status' => 'paid',
        ]);

        $this->notify('success', 'Payment Successful', 'Your payment has been processed successfully.');
        return redirect()->route('filament.app.pages.tenant-space');
    }

    public function handlePaymentCancel()
    {
        $this->notify('warning', 'Payment Cancelled', 'Your payment has been cancelled.');
        return redirect()->route('filament.app.pages.tenant-space');
    }
}
