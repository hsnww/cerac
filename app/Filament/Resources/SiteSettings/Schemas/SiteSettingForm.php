<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->required()
                    ->default('سيراك'),
                TextInput::make('site_description'),
                Textarea::make('site_keywords')
                    ->columnSpanFull(),
                TextInput::make('contact_phone')
                    ->tel(),
                TextInput::make('contact_email')
                    ->email(),
                Textarea::make('contact_address')
                    ->columnSpanFull(),
                TextInput::make('facebook_url'),
                TextInput::make('twitter_url'),
                TextInput::make('linkedin_url'),
                TextInput::make('instagram_url'),
                TextInput::make('youtube_url'),
                Textarea::make('about_text')
                    ->columnSpanFull(),
                Textarea::make('services_text')
                    ->columnSpanFull(),
            ]);
    }
}
