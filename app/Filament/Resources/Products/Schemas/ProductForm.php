<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title_ar')
                    ->label('عنوان المنتج (عربي)')
                    ->placeholder('اكتب عنوان المنتج بالعربية')
                    ->required(),
                TextInput::make('title_en')
                    ->label('عنوان المنتج (إنجليزي)')
                    ->placeholder('Enter product title in English')
                    ->required(),
                Textarea::make('description_ar')
                    ->label('وصف المنتج (عربي)')
                    ->placeholder('اكتب وصف المنتج بالعربية')
                    ->columnSpanFull(),
                Textarea::make('description_en')
                    ->label('وصف المنتج (إنجليزي)')
                    ->placeholder('Enter product description in English')
                    ->columnSpanFull(),
                TextInput::make('features_ar')
                    ->label('المميزات (عربي)')
                    ->placeholder('افصل العناصر بفاصلة ,') ,
                TextInput::make('features_en')
                    ->label('المميزات (إنجليزي)')
                    ->placeholder('Separate items with a comma ,'),
                Toggle::make('is_active')
                    ->label('نشط')
                    ->required(),
                TextInput::make('sort_order')
                    ->label('ترتيب العرض')
                    ->required()
                    ->numeric()
                    ->default(0),

                // صورة الغلاف
                SpatieMediaLibraryFileUpload::make('product_cover')
                    ->label('صورة الغلاف')
                    ->collection('product_cover')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(2048)
                    ->columnSpanFull(),

                // معرض الصور
                SpatieMediaLibraryFileUpload::make('product_gallery')
                    ->label('معرض الصور')
                    ->collection('product_gallery')
                    ->disk('public')
                    ->multiple()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(2048)
                    ->columnSpanFull(),

                // ملف المواصفات (PDF/Word)
                SpatieMediaLibraryFileUpload::make('product_spec_document')
                    ->label('ملف المواصفات (PDF / Word)')
                    ->collection('product_spec_document')
                    ->disk('public')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(102400) // 100 ميجابايت
                    ->columnSpanFull(),
            ]);
    }
}
