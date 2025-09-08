<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->label('اسم الموقع')
                    ->placeholder('اكتب اسم الموقع')
                    ->required()
                    ->default('سيراك'),
                TextInput::make('site_description')
                    ->label('وصف الموقع')
                    ->placeholder('نبذة مختصرة عن الموقع'),
                Textarea::make('site_keywords')
                    ->label('الكلمات المفتاحية')
                    ->placeholder('افصل الكلمات بفاصلة ,')
                    ->columnSpanFull(),
                TextInput::make('contact_phone')
                    ->label('رقم التواصل')
                    ->placeholder('05xxxxxxxx')
                    ->tel(),
                TextInput::make('contact_email')
                    ->label('البريد الإلكتروني')
                    ->placeholder('name@example.com')
                    ->email(),
                Textarea::make('contact_address')
                    ->label('العنوان')
                    ->placeholder('العنوان بالتفصيل')
                    ->columnSpanFull(),
                TextInput::make('facebook_url')
                    ->label('رابط فيسبوك')
                    ->placeholder('https://facebook.com/username'),
                TextInput::make('twitter_url')
                    ->label('رابط تويتر / X')
                    ->placeholder('https://x.com/username'),
                TextInput::make('linkedin_url')
                    ->label('رابط لينكدإن')
                    ->placeholder('https://linkedin.com/company/name'),
                TextInput::make('instagram_url')
                    ->label('رابط انستقرام')
                    ->placeholder('https://instagram.com/username'),
                TextInput::make('youtube_url')
                    ->label('رابط يوتيوب')
                    ->placeholder('https://youtube.com/@channel'),
                Textarea::make('about_text')
                    ->label('نص التعريف بالموقع')
                    ->placeholder('وصف موجز عن الموقع أو الشركة')
                    ->columnSpanFull(),
                Textarea::make('services_text')
                    ->label('نص الخدمات')
                    ->placeholder('وصف موجز للخدمات المقدمة')
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('logo')
                    ->label('شعار الموقع')
                    ->collection('logo')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'])
                    ->maxSize(2048)
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('logo_light')
                    ->label('شعار الموقع (نسخة فاتحة)')
                    ->collection('logo_light')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'])
                    ->maxSize(2048)
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('favicon')
                    ->label('أيقونة الموقع (favicon)')
                    ->collection('favicon')
                    ->disk('public')
                    ->acceptedFileTypes(['image/png', 'image/ico', 'image/svg+xml'])
                    ->maxSize(512)
                    ->columnSpanFull(),
            ]);
    }
}
