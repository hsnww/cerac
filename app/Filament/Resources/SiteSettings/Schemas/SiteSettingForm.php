<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
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
                FileUpload::make('logo')
                    ->label('شعار الموقع')
                    ->image()
                    ->disk('public')
                    ->directory('site-settings')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'])
                    ->maxSize(2048)
                    ->columnSpanFull(),
                FileUpload::make('logo_light')
                    ->label('شعار الموقع الفاتح')
                    ->image()
                    ->disk('public')
                    ->directory('site-settings')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'])
                    ->maxSize(2048)
                    ->columnSpanFull(),
                FileUpload::make('favicon')
                    ->label('أيقونة الموقع')
                    ->image()
                    ->disk('public')
                    ->directory('site-settings')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/png', 'image/ico', 'image/svg+xml'])
                    ->maxSize(512)
                    ->columnSpanFull(),
            ]);
    }
}
