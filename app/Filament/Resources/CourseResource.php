<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->autofocus()
                    ->required()
                    ->unique(Course::class, 'name', null, 'id')
                    ->placeholder(__('Name')),

                TextInput::make('short')
                    ->placeholder(__('Short')),

                Select::make('type')
                    ->options([
                        'Online' => __('Online'),
                        'Classroom' => __('Classroom'),
                        'Interactive Online' => __('Interactive Online'),
                    ])
                    ->required()
                    ->placeholder(__('Type')),

                DatePicker::make('issued_at')
                    ->required()
                    ->placeholder(__('Issued at')),

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
                TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('issued_at')
                    ->searchable()
                    ->sortable()
                    ->date(),
                TextColumn::make('company.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->dateTime(),
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
