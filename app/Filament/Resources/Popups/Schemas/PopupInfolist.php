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
                TextEntry::make('title')
                    ->label('العنوان'),
                TextEntry::make('type')
                    ->label('نوع النافذة')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'poster' => 'بوستر',
                        'video' => 'فيديو',
                        'youtube' => 'يوتيوب',
                        'form' => 'نموذج',
                        'survey' => 'استطلاع',
                        'custom' => 'مخصص',
                        default => $state,
                    }),
                ImageEntry::make('popup_images')
                    ->label('صور النافذة المنبثقة')
                    ->disk('public')
                    ->size(200)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('popup_images');
                    }),
                TextEntry::make('video_url')
                    ->label('رابط الفيديو'),
                TextEntry::make('youtube_url')
                    ->label('رابط يوتيوب'),
                TextEntry::make('form_action')
                    ->label('مسار النموذج'),
                TextEntry::make('button_text')
                    ->label('نص الزر'),
                TextEntry::make('button_url')
                    ->label('رابط الزر'),
                IconEntry::make('show_close_button')
                    ->label('إظهار زر الإغلاق')
                    ->boolean(),
                IconEntry::make('auto_close')
                    ->label('إغلاق تلقائي')
                    ->boolean(),
                TextEntry::make('auto_close_delay')
                    ->label('مدة الإغلاق التلقائي (ثواني)')
                    ->numeric(),
                IconEntry::make('show_once_per_session')
                    ->label('إظهار مرة واحدة لكل جلسة')
                    ->boolean(),
                TextEntry::make('width')
                    ->label('العرض (بكسل)')
                    ->numeric(),
                TextEntry::make('height')
                    ->label('الارتفاع (بكسل)')
                    ->numeric(),
                TextEntry::make('position')
                    ->label('الموضع')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'center' => 'وسط',
                        'top' => 'أعلى',
                        'bottom' => 'أسفل',
                        'left' => 'يسار',
                        'right' => 'يمين',
                        default => $state,
                    }),
                IconEntry::make('is_active')
                    ->label('نشط')
                    ->boolean(),
                TextEntry::make('sort_order')
                    ->label('ترتيب العرض')
                    ->numeric(),
                TextEntry::make('display_count')
                    ->label('عدد المشاهدات')
                    ->numeric(),
                TextEntry::make('starts_at')
                    ->label('تاريخ البداية')
                    ->dateTime(),
                TextEntry::make('ends_at')
                    ->label('تاريخ النهاية')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->label('تاريخ التحديث')
                    ->dateTime(),
            ]);
    }
}
