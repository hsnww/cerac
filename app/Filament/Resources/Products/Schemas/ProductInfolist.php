<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('product_image')
                    ->label('صورة المنتج')
                    ->disk('public')
                    ->size(200)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('product_image');
                    }),
                TextEntry::make('title_ar')
                    ->label('العنوان (عربي)'),
                TextEntry::make('title_en')
                    ->label('العنوان (إنجليزي)'),
                IconEntry::make('is_active')
                    ->label('نشط')
                    ->boolean(),
                TextEntry::make('sort_order')
                    ->label('ترتيب')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
