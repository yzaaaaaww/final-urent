<?php

namespace App\Filament\App\Pages;

use Filament\Pages\Dashboard;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Rupadana\FilamentAnnounce\Models\Announcement;

class AnnouncementDashboard extends Dashboard implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Announcements';
    protected static ?string $navigationLabel = 'Announcements';
    protected static ?int $navigationSort = -2;

    protected static string $view = 'filament.app.pages.announcement-dashboard';

    public function table(Table $table): Table
    {
        return $table
            ->query(Announcement::query())
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('body')->limit(50)->searchable(),
                TextColumn::make('created_at')->dateTime(),
            ]);
    }
}
