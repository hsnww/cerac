<?php

namespace App\Filament\Resources\SiteSettings\Pages;

use App\Filament\Resources\SiteSettings\SiteSettingResource;
use App\Models\SiteSetting;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSiteSettings extends ListRecords
{
    protected static string $resource = SiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        // إخفاء زر الإضافة إذا كان هناك سجل واحد أو أكثر
        if (SiteSetting::count() > 0) {
            return [];
        }
        
        return [
            CreateAction::make(),
        ];
    }
}
