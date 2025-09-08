<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('العنوان')
                    ->placeholder('عنوان الشريحة')
                    ->required(),
                TextInput::make('subtitle')
                    ->label('العنوان الفرعي')
                    ->placeholder('عنوان فرعي اختياري'),
                Textarea::make('description')
                    ->label('الوصف')
                    ->placeholder('وصف الشريحة')
                    ->columnSpanFull(),
                TextInput::make('button_text')
                    ->label('نص الزر 1')
                    ->placeholder('مثال: اكتشف المزيد'),
                TextInput::make('button_url')
                    ->label('رابط الزر 1')
                    ->placeholder('https://...'),
                TextInput::make('button_text_2')
                    ->label('نص الزر 2')
                    ->placeholder('اختياري'),
                TextInput::make('button_url_2')
                    ->label('رابط الزر 2')
                    ->placeholder('اختياري'),
                Toggle::make('is_active')
                    ->label('نشط')
                    ->required(),
                TextInput::make('sort_order')
                    ->label('ترتيب العرض')
                    ->required()
                    ->numeric()
                    ->default(0),
                SpatieMediaLibraryFileUpload::make('hero_image')
                    ->label('صورة الشريحة')
                    ->collection('hero_image')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(2048)
                    ->columnSpanFull(),
            ]);
    }
}
