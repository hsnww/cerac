<?php

namespace App\Filament\Resources\AboutPageResource\Pages;

use App\Filament\Resources\AboutPageResource;
use Filament\Resources\Pages\ManageRecords;

class ManageAboutPage extends ManageRecords
{
    protected static string $resource = AboutPageResource::class;

    protected function getHeaderActions(): array
    {
        $actions = parent::getHeaderActions();

        // Hide "Create" button if a record already exists (single-record approach)
        if (static::getResource()::getModel()::query()->exists()) {
            return [];
        }

        return $actions;
    }
}


