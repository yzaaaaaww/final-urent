<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AAStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalRevenue = Payment::where('payment_status', 'paid')->sum('amount');
        // Calculate annual revenue (payments from the last 365 days)
        $annualRevenue = Payment::where('payment_status', 'paid')
            ->where('created_at', '>=', now()->subYear())
            ->sum('amount');
        $paymentCount = Payment::where('payment_status', 'paid')->count();

        return [
            Stat::make('Total Revenue', '₱ ' . number_format($totalRevenue, 2))
                ->description('Total completed payments')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
            Stat::make('Annual Revenue', '₱ ' . number_format($annualRevenue, 2))
                ->description('Total revenue in the last year')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),
            Stat::make('Payment Count', $paymentCount)
                ->description('Total number of payments')
                ->descriptionIcon('heroicon-m-document')
                ->color('warning'),
        ];
    }

    
}
