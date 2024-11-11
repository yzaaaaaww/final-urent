<?php

namespace App\Services;

use App\Models\Requirement;
use Filament\Forms;
use Illuminate\Support\Facades\Auth;

final class RequirementForm
{
    public static function schema($concourseId = null, $concourseLeaseTerm = null): array
    {
        $user = Auth::user();

        return [
            Forms\Components\Hidden::make('user_id')
                ->default(fn() => $user->id),
            Forms\Components\Hidden::make('concourse_id')
                ->default($concourseId)
                ->required(), // Add this line
            Forms\Components\Hidden::make('status')
                ->default('pending'),
            Forms\Components\Section::make('Tenant Information')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Full Name')
                            ->default(fn() => $user->name)
                            ->readOnly(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->default(fn() => $user->email)
                            ->readOnly(),
                        Forms\Components\TextInput::make('phone_number')
                            ->label('Phone Number')
                            ->default(fn() => $user->phone_number)
                            ->required(),

                        Forms\Components\TextInput::make('lease_term')
                            ->label('Lease Term')
                            ->default($concourseLeaseTerm)
                            ->readOnly()
                            ->suffix('Months'),
                    ]),
                    Forms\Components\Textarea::make('address')
                        ->label('Permanent Address')
                        ->default(fn() => $user->address)
                        ->required()
                        ->columnSpanFull(),
                ])
                ->columns(),

            Forms\Components\Section::make('Requirements')
                ->schema(function () {
                    $requirements = Requirement::all();
                    return $requirements->map(function ($requirement) {
                        return Forms\Components\FileUpload::make("requirements.{$requirement->id}")
                            ->label($requirement->name)
                            ->disk('public')
                            ->directory('requirements')
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->maxSize(5120) // 5MB max file size
                            ;
                    })->toArray();
                })
                ->columns(2),
        ];
    }
}
