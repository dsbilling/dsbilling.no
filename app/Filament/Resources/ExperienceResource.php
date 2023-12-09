<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Models\Experience;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Title'))
                    ->columnSpan(2),

                TextInput::make('department')
                    ->autofocus()
                    ->placeholder(__('Department')),

                Select::make('type')
                    ->options([
                        'apprenticeship' => __('Apprenticeship'),
                        'contract' => __('Contract'),
                        'freelance' => __('Freelance'),
                        'full-time' => __('Full Time'),
                        'part-time' => __('Part Time'),
                        'remote' => __('Remote'),
                        'seasonal' => __('Seasonal'),
                        'self-employed' => __('Self Employed'),
                        'volunteer' => __('Volunteer'),
                    ])
                    ->required()
                    ->placeholder(__('Type')),

                TextInput::make('description')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Description'))
                    ->columnSpan(2),

                TextInput::make('started_at')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Started At')),

                TextInput::make('ended_at')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Ended At')),

                Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required()
                    ->placeholder(__('Company')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('started_at')
                    ->searchable()
                    ->sortable()
                    ->date(),

                TextColumn::make('ended_at')
                    ->searchable()
                    ->sortable()
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('started_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
