<?php

namespace App\Filament\Resources\CompanyResource\RelationManagers;

use App\Filament\Resources\CourseResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class CoursesRelationManager extends RelationManager
{
    protected static string $relationship = 'courses';

    public function form(Form $form): Form
    {
        return CourseResource::form($form);
    }

    public function table(Table $table): Table
    {
        return CourseResource::table($table);
    }
}
