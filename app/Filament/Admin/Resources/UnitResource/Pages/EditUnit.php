<?php

namespace App\Filament\Admin\Resources\UnitResource\Pages;

use App\Filament\Admin\Resources\UnitResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use App\Models\User;

class EditUnit extends EditRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected static string $resource = UnitResource::class;


    protected function getSavedNotification(): ?Notification
    {
        $record = $this->getRecord();

        $notification = Notification::make()
            ->success()
            ->icon('heroicon-o-currency-dollar')
            ->title('Unit Updated')
            ->body("Unit {$record->name} address in {$record->address} Updated!")
            ->actions([
                Action::make('view')
                    ->label('Mark as read')
                    ->link()
                    ->markAsRead(),
            ]);

        // Get all users with the 'panel_user' or 'accountant' role
        $notifiedUsers = User::role(['panel_user'])->get();

        // Send notification to all panel users and accountants
        foreach ($notifiedUsers as $user) {
            $notification->sendToDatabase($user);
        }

        // Send notification to the authenticated user
        $notification->sendToDatabase(auth()->user());

        return $notification;
    }
}
