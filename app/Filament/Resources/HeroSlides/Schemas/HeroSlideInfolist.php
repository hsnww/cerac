<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class HeroSlideInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('hero_image')
                    ->label('صورة الشريحة')
                    ->disk('public')
                    ->size(200)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('hero_image');
                    }),
                TextEntry::make('title'),
                TextEntry::make('subtitle'),
                TextEntry::make('button_text'),
                TextEntry::make('button_url'),
                TextEntry::make('button_text_2'),
                TextEntry::make('button_url_2'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('sort_order')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
