<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_ar')
                    ->label('اسم العميل (عربي)')
                    ->placeholder('اكتب اسم العميل بالعربية')
                    ->required(),
                TextInput::make('name_en')
                    ->label('اسم العميل (إنجليزي)')
                    ->placeholder('Client name in English'),
                TextInput::make('website_url')
                    ->label('رابط الموقع')
                    ->placeholder('https://example.com'),
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
                    ->label('شعار العميل')
                    ->collection('logo')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'])
                    ->maxSize(2048)
                    ->columnSpanFull(),
            ]);
    }
}
