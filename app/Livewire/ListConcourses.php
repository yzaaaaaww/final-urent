<?php

namespace App\Livewire;

use App\Models\Unit;
use App\Models\User;
use App\Services\RequirementForm;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;

class ListConcourses extends Component implements HasTable, HasForms
{
    use InteractsWithForms, InteractsWithTable;

    public $unitId;

    public function mount()
    {
        $this->unitId = request()->query('unit_id');
    }
    public function render()
    {
        return view('livewire.list-concourses');
    }

    // Table Configuration
    public function table(Table $table): Table
    {
        return $table
            ->query(Unit::query()->where('is_active', true))
            ->contentGrid([
                'md' => 3,
                'lg' => 4,
            ])
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\ImageColumn::make('image')
                        ->width('100%')

                        ->height('200px')
                        ->defaultImageUrl(
                            fn($record) =>
                            $record->image === null
                                ? 'https://placehold.co/600x400'
                                : null
                        ),
                    Tables\Columns\TextColumn::make('name')
                        ->size(TextColumn\TextColumnSize::Large)
                        ->sortable()
                        ->searchable(),
                    Tables\Columns\TextColumn::make('status')
                        ->badge()
                        ->sortable()
                        ->extraAttributes(['class' => 'capitalize']),
                    Tables\Columns\TextColumn::make('price')
                        ->prefix('Monthly Rent ')
                        ->sortable()
                        ->money('PHP'),
                    Tables\Columns\TextColumn::make('deposit')
                        ->prefix('Deposit ')
                        ->sortable()
                        ->money('PHP'),
                    Tables\Columns\TextColumn::make('address'),
                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime('F j, Y')
                        ->color('gray')
                        ->toggleable(isToggledHiddenByDefault: true),
                ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'Available' => 'Available',
                        'Occupied' => 'Occupied',
                    ]),
            ])
            ->actions([
                Tables\Actions\CreateAction::make()
                    ->disableCreateAnother()
                    ->label('Rent')
                    ->slideOver()
                    ->icon('heroicon-o-plus')
                    ->form(function ($record) {
                        return RequirementForm::schema($record->id, $record->lease_term);
                    })
                    ->using(function (array $data, $record) {
                        // Create the application with unit_id included
                        $application = \App\Models\Application::create([
                            ...$data,
                            'unit_id' => $record->id,
                            'user_id' => Auth::id(),
                            'status' => 'pending'
                        ]);

                        // Store the uploaded requirements
                        if (isset($data['requirements'])) {
                            foreach ($data['requirements'] as $requirementId => $file) {
                                if ($file) {
                                    \App\Models\AppRequirement::create([
                                        'requirement_id' => $requirementId,
                                        'user_id' => Auth::id(),
                                        'unit_id' => $record->id,
                                        'application_id' => $application->id,
                                        'name' => \App\Models\Requirement::find($requirementId)->name,
                                        'status' => 'pending',
                                        'file' => $file,
                                    ]);
                                }
                            }
                        }

                        if ($record) {
                            $record->update([
                                'user_id' => Auth::id(),
                                'status' => 'pending'
                            ]);
                        }

                        $applicationUrl = route('filament.app.pages.edit-requirement', ['unit_id' => $record->id, 'user_id' => Auth::id()]);

                        // Notify the user
                        $this->notifyUser('Application Submitted', 'Your application has been submitted.');

                        // Notify the admin
                        $this->notifyAdmin('New Application', 'A new application has been submitted.');

                     // Send email to admin (User with ID 1)
                    //  $admin = User::find(1);
                    //  if ($admin) {
                    //      Mail::to($admin->email)->send(new NewApplicationSubmitted($application));
                    //  }

                     return $application;
                    })
                    ->hidden(function ($record) {
                        if (!$record) return true; // Hide if no record (shouldn't happen, but just in case)

                        // Hide if space is not available
                        if ($record->status !== 'available') return true;

                        // Hide if user already has an application for this space
                        return \App\Models\Application::where('user_id', Auth::id())
                            ->where('unit_id', $record->id) // Change this line
                            ->exists();
                    }),
                Tables\Actions\Action::make('Check Application')
                    ->link()
                    ->icon('heroicon-o-pencil')
                    ->url(fn($record) => route('filament.app.pages.edit-requirement', ['unit_id' => $record->id, 'user_id' => Auth::id()]))
                    ->openUrlInNewTab()
                    ->visible(function ($record) {
                        return \App\Models\Application::where('user_id', Auth::id())
                            ->where('unit_id', $record->id)
                            ->where('status', 'pending')
                            ->exists();
                    }),
            ])
            ->poll('3s');
    }

    public function notifyUser(string $title, string $body): void
    {
        Notification::make()
            ->title($title)
            ->body($body)
            ->icon('heroicon-o-document-text')
            ->actions([
                Action::make('markAsRead')
                    ->label('Mark as read')
                    ->button()
                    ->markAsRead(),
            ])
            ->sendToDatabase(Auth::user());
    }

    public function notifyAdmin(string $title, string $body): void
    {
        Notification::make()
            ->title($title)
            ->body($body)
            ->icon('heroicon-o-document-text')
            ->actions([
                Action::make('markAsRead')
                    ->label('Mark as read')
                    ->button()
                    ->markAsRead(),
            ])
            ->sendToDatabase(User::find(1));
    }
}
