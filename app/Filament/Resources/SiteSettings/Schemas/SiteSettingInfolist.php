<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class SiteSettingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('logo')
                    ->label('شعار الموقع')
                    ->disk('public')
                    ->size(200)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('logo');
                    }),
                ImageEntry::make('logo_light')
                    ->label('شعار الموقع الفاتح')
                    ->disk('public')
                    ->size(200)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('logo_light');
                    }),
                ImageEntry::make('favicon')
                    ->label('أيقونة الموقع')
                    ->disk('public')
                    ->size(100)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('favicon');
                    }),
                TextEntry::make('site_name'),
                TextEntry::make('site_description'),
                TextEntry::make('contact_phone'),
                TextEntry::make('contact_email'),
                TextEntry::make('facebook_url'),
                TextEntry::make('twitter_url'),
                TextEntry::make('linkedin_url'),
                TextEntry::make('instagram_url'),
                TextEntry::make('youtube_url'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
