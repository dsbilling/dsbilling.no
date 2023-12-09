<?php

namespace App\Filament\Resources\CompanyResource\RelationManagers;

use App\Filament\Resources\CertificationResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class CertificationsRelationManager extends RelationManager
{
    protected static string $relationship = 'certifications';

    public function form(Form $form): Form
    {
        return CertificationResource::form($form);
    }

    public function table(Table $table): Table
    {
        return CertificationResource::table($table);
    }
}
