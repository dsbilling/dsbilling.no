<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->autofocus()
                    ->required()
                    ->unique(Post::class, 'title', null, 'id')
                    ->placeholder(__('Title'))
                    ->columnSpan(2),

                Toggle::make('draft')
                    ->default(false)
                    ->label(__('Draft')),

                DateTimePicker::make('published_at')
                    ->required()
                    ->label(__('Published At')),

                MarkdownEditor::make('body')
                    ->required()
                    ->placeholder(__('Body'))
                    ->columnSpan(2),

                SpatieTagsInput::make('tags')
                    ->placeholder(__('Tags'))
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('draft')
                    ->label(__('Draft'))
                    ->boolean()
                    ->sortable(),

                TextColumn::make('published_at')
                    ->searchable()
                    ->sortable()
                    ->dateTime(),

                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->dateTime(),

                TextColumn::make('updated_at')
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
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
