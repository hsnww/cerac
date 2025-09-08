<?php

namespace App\Filament\Resources\HomePageSettingResource\Pages;

use App\Filament\Resources\HomePageSettingResource;
use Filament\Resources\Pages\ManageRecords;

class ManageHomePageSetting extends ManageRecords
{
    protected static string $resource = HomePageSettingResource::class;

    protected function getHeaderActions(): array
    {
        if (static::getResource()::getModel()::query()->exists()) {
            return [];
        }

        return parent::getHeaderActions();
    }
}


