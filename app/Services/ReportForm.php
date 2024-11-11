<?php

namespace App\Services;

use App\Models\Tenant;
use Filament\Forms;
use Illuminate\Support\Facades\Auth;

final class ReportForm
{
    public static function schema(Tenant $tenant): array
    {
        return [
            Forms\Components\Section::make('Report Form')
                ->description('Report an issue with your unit directly will send to landlord.')
                ->schema([
                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->required()
                        ->default(Auth::user()->email)
                        ->disabled(),
                    Forms\Components\TextInput::make('unit_number')
                        ->label('Unit')
                        ->required()
                        ->default($tenant->unit->unit_number)
                        ->disabled()
                        ->numeric()
                        ->integer(), // Ensure the value is an integer
                    Forms\Components\TextInput::make('phone')
                        ->label('Phone')
                        ->required()
                        ->default(Auth::user()->phone),
                    Forms\Components\Select::make('issue_type')
                        ->label('Issue Type')
                        ->required()
                        ->native(false)
                        ->options([
                            'Maintenance' => 'Maintenance',
                            'Security' => 'Security',
                            'Cleaning' => 'Cleaning',
                            'Other' => 'Other',
                        ]),
                    Forms\Components\Textarea::make('message')
                        ->label('Message')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),
        ];
    }
}
