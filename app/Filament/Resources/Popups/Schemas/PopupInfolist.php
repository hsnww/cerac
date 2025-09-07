<?php

namespace App\Filament\Resources\Popups\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PopupInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('type'),
                ImageEntry::make('image_url'),
                TextEntry::make('video_url'),
                TextEntry::make('youtube_url'),
                TextEntry::make('form_action'),
                TextEntry::make('button_text'),
                TextEntry::make('button_url'),
                IconEntry::make('show_close_button')
                    ->boolean(),
                IconEntry::make('auto_close')
                    ->boolean(),
                TextEntry::make('auto_close_delay')
                    ->numeric(),
                IconEntry::make('show_once_per_session')
                    ->boolean(),
                TextEntry::make('width')
                    ->numeric(),
                TextEntry::make('height')
                    ->numeric(),
                TextEntry::make('position'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('sort_order')
                    ->numeric(),
                TextEntry::make('display_count')
                    ->numeric(),
                TextEntry::make('starts_at')
                    ->dateTime(),
                TextEntry::make('ends_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
