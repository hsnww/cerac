<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class PartnerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('logo')
                    ->label('شعار الشريك')
                    ->disk('public')
                    ->size(200)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('logo');
                    }),
                TextEntry::make('name_ar'),
                TextEntry::make('name_en'),
                TextEntry::make('website_url'),
                TextEntry::make('contact_phone'),
                TextEntry::make('contact_email'),
                IconEntry::make('is_featured')
                    ->boolean(),
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
