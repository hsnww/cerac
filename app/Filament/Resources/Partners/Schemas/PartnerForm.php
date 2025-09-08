<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_ar')
                    ->label('اسم الشريك (عربي)')
                    ->placeholder('اكتب اسم الشريك بالعربية')
                    ->required(),
                TextInput::make('name_en')
                    ->label('اسم الشريك (إنجليزي)')
                    ->placeholder('Partner name in English'),
                TextInput::make('website_url')
                    ->label('رابط الموقع')
                    ->placeholder('https://example.com'),
                TextInput::make('contact_phone')
                    ->label('هاتف التواصل')
                    ->placeholder('05xxxxxxxx')
                    ->tel(),
                TextInput::make('contact_email')
                    ->label('بريد التواصل')
                    ->placeholder('name@example.com')
                    ->email(),
                Toggle::make('is_featured')
                    ->label('مميز')
                    ->required(),
                Toggle::make('is_active')
                    ->label('نشط')
                    ->required(),
                TextInput::make('sort_order')
                    ->label('ترتيب العرض')
                    ->required()
                    ->numeric()
                    ->default(0),
                SpatieMediaLibraryFileUpload::make('logo')
                    ->label('شعار الشريك')
                    ->collection('logo')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'])
                    ->maxSize(2048)
                    ->columnSpanFull(),
            ]);
    }
}
