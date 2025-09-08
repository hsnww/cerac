<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title_ar')
                    ->label('عنوان العمل (عربي)')
                    ->placeholder('اكتب عنوان العمل بالعربية')
                    ->required(),
                TextInput::make('title_en')
                    ->label('عنوان العمل (إنجليزي)')
                    ->placeholder('Project title in English'),
                Textarea::make('description_ar')
                    ->label('وصف العمل (عربي)')
                    ->placeholder('اكتب وصف العمل بالعربية')
                    ->columnSpanFull(),
                Textarea::make('description_en')
                    ->label('وصف العمل (إنجليزي)')
                    ->placeholder('Enter project description in English')
                    ->columnSpanFull(),
                TextInput::make('video_url')
                    ->label('رابط الفيديو')
                    ->placeholder('https://...'),
                TextInput::make('location_text')
                    ->label('الموقع')
                    ->placeholder('المدينة، الدولة'),
                TextInput::make('latitude')
                    ->label('خط العرض')
                    ->numeric(),
                TextInput::make('longitude')
                    ->label('خط الطول')
                    ->numeric(),
                TextInput::make('client_id')
                    ->label('العميل (ID)')
                    ->numeric(),
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
                SpatieMediaLibraryFileUpload::make('cover_image')
                    ->label('صورة الغلاف')
                    ->collection('cover_image')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(2048)
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('gallery')
                    ->label('معرض الصور')
                    ->collection('gallery')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(2048)
                    ->multiple()
                    ->columnSpanFull(),
            ]);
    }
}
