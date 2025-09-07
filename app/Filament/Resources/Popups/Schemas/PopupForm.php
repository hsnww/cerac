<?php

namespace App\Filament\Resources\Popups\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PopupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('العنوان')
                    ->required(),
                Select::make('type')
                    ->label('نوع النافذة')
                    ->options([
                        'poster' => 'بوستر',
                        'video' => 'فيديو',
                        'youtube' => 'يوتيوب',
                        'form' => 'نموذج',
                        'survey' => 'استطلاع',
                        'custom' => 'مخصص',
                    ])
                    ->default('poster')
                    ->required(),
                Textarea::make('content')
                    ->label('المحتوى')
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('popup_images')
                    ->label('صور النافذة المنبثقة')
                    ->collection('popup_images')
                    ->image()
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(2048)
                    ->multiple()
                    ->columnSpanFull(),
                TextInput::make('video_url')
                    ->label('رابط الفيديو'),
                TextInput::make('youtube_url')
                    ->label('رابط يوتيوب'),
                TextInput::make('form_action')
                    ->label('مسار النموذج'),
                TextInput::make('form_fields')
                    ->label('حقول النموذج'),
                TextInput::make('button_text')
                    ->label('نص الزر')
                    ->required()
                    ->default('إغلاق'),
                TextInput::make('button_url')
                    ->label('رابط الزر'),
                Toggle::make('show_close_button')
                    ->label('إظهار زر الإغلاق')
                    ->required(),
                Toggle::make('auto_close')
                    ->label('إغلاق تلقائي')
                    ->required(),
                TextInput::make('auto_close_delay')
                    ->label('مدة الإغلاق التلقائي (ثواني)')
                    ->numeric(),
                Toggle::make('show_once_per_session')
                    ->label('إظهار مرة واحدة لكل جلسة')
                    ->required(),
                TextInput::make('display_rules')
                    ->label('قواعد العرض'),
                TextInput::make('width')
                    ->label('العرض (بكسل)')
                    ->required()
                    ->numeric()
                    ->default(800),
                TextInput::make('height')
                    ->label('الارتفاع (بكسل)')
                    ->required()
                    ->numeric()
                    ->default(600),
                Select::make('position')
                    ->label('الموضع')
                    ->options([
                        'center' => 'وسط',
                        'top' => 'أعلى',
                        'bottom' => 'أسفل',
                        'left' => 'يسار',
                        'right' => 'يمين',
                    ])
                    ->default('center')
                    ->required(),
                Toggle::make('is_active')
                    ->label('نشط')
                    ->required()
                    ->helperText('عند تفعيل هذه النافذة، سيتم تعطيل جميع النوافذ الأخرى تلقائياً')
                    ->live()
                    ->afterStateUpdated(function ($state, $set) {
                        if ($state) {
                            // Deactivate all other popups when this one is activated
                            \App\Models\Popup::where('id', '!=', request()->route('record'))
                                ->update(['is_active' => false]);
                        }
                    }),
                TextInput::make('sort_order')
                    ->label('ترتيب العرض')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('display_count')
                    ->label('عدد المشاهدات')
                    ->required()
                    ->numeric()
                    ->default(0),
                DateTimePicker::make('starts_at')
                    ->label('تاريخ البداية'),
                DateTimePicker::make('ends_at')
                    ->label('تاريخ النهاية'),
            ]);
    }
}
