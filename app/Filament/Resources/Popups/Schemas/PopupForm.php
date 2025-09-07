<?php

namespace App\Filament\Resources\Popups\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PopupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('type')
                    ->options([
            'poster' => 'Poster',
            'video' => 'Video',
            'youtube' => 'Youtube',
            'form' => 'Form',
            'survey' => 'Survey',
            'custom' => 'Custom',
        ])
                    ->default('poster')
                    ->required(),
                Textarea::make('content')
                    ->columnSpanFull(),
                FileUpload::make('image_url')
                    ->image(),
                TextInput::make('video_url'),
                TextInput::make('youtube_url'),
                TextInput::make('form_action'),
                TextInput::make('form_fields'),
                TextInput::make('button_text')
                    ->required()
                    ->default('إغلاق'),
                TextInput::make('button_url'),
                Toggle::make('show_close_button')
                    ->required(),
                Toggle::make('auto_close')
                    ->required(),
                TextInput::make('auto_close_delay')
                    ->numeric(),
                Toggle::make('show_once_per_session')
                    ->required(),
                TextInput::make('display_rules'),
                TextInput::make('width')
                    ->required()
                    ->numeric()
                    ->default(800),
                TextInput::make('height')
                    ->required()
                    ->numeric()
                    ->default(600),
                Select::make('position')
                    ->options([
            'center' => 'Center',
            'top' => 'Top',
            'bottom' => 'Bottom',
            'left' => 'Left',
            'right' => 'Right',
        ])
                    ->default('center')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('display_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                DateTimePicker::make('starts_at'),
                DateTimePicker::make('ends_at'),
            ]);
    }
}
