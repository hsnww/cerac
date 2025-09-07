<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SiteSettingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
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
