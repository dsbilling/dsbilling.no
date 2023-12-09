<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificationResource\Pages;
use App\Models\Certification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CertificationResource extends Resource
{
    protected static ?string $model = Certification::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->autofocus()
                    ->required()
                    ->placeholder(__('Name')),

                TextInput::make('short')
                    ->placeholder(__('Short')),

                TextInput::make('identifier')
                    ->placeholder(__('Identifier')),

                DatePicker::make('issued_at')
                    ->required()
                    ->placeholder(__('Issued at')),

                DatePicker::make('expiration_at')
                    ->placeholder(__('Expiration at')),

                Select::make('company_id')
                    ->required()
                    ->relationship('company', 'name'),

                FileUpload::make('file_path')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('uploads')
                    ->preserveFilenames()
                    ->downloadable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('short')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('issued_at')
                    ->searchable()
                    ->sortable()
                    ->date(),
                TextColumn::make('expiration_at')
                    ->searchable()
                    ->sortable()
                    ->date(),
                TextColumn::make('company.name')
                    ->searchable()
                    ->sortable(),
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
            ->defaultSort('issued_at', 'desc');
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
            'index' => Pages\ListCertifications::route('/'),
            'create' => Pages\CreateCertification::route('/create'),
            'edit' => Pages\EditCertification::route('/{record}/edit'),
        ];
    }
}
