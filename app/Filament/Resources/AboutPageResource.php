<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Models\AboutFeature;
use App\Models\AboutPage;
use Filament\Forms;
// use Filament\Forms\Components\Grid; // Not available in your Filament version
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ColorPicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
// Filament v4: use built-in record action without explicit action classes
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
// use Filament\Forms\Components\Section; // Not available in your Filament version
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\ToggleButtons;
// use Filament\Forms\Components\Placeholder;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Group;
// use Filament\Forms\Components\Fieldset; // Not available in your Filament version
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    // navigation icon optional to avoid linter type issues

    protected static ?string $navigationLabel = 'من نحن';

    public static function form(Schema $schema): Schema
    {
        $heroicons = [
            'check-badge' => 'شهادة/تحقق',
            'bolt' => 'سرعة',
            'heart' => 'دعم',
            'light-bulb' => 'ابتكار',
            'shield-check' => 'جودة/حماية',
            'sparkles' => 'تميز',
        ];

        return $schema
            ->schema([
                // 1) Hero
                TextInput::make('hero_title')->label('عنوان الهيرو')->helperText('القسم: الهيرو'),
                TextInput::make('hero_subtitle')->label('وصف الهيرو')->helperText('القسم: الهيرو'),
                ColorPicker::make('hero_bg_color')->label('لون خلفية الهيرو')->default('#1cabe3')->helperText('القسم: الهيرو'),
                ColorPicker::make('hero_text_color')->label('لون نص الهيرو')->default('#0e183c')->helperText('القسم: الهيرو'),

                // 2) About
                TextInput::make('about_title')->label('عنوان قسم التعريف')->helperText('القسم: التعريف'),
                Textarea::make('about_paragraph_1')->label('نص التعريف 1')->rows(4)->helperText('القسم: التعريف'),
                Textarea::make('about_paragraph_2')->label('نص التعريف 2')->rows(4)->helperText('القسم: التعريف'),
                SpatieMediaLibraryFileUpload::make('about_main_image')
                    ->collection('about_main_image')
                    ->disk('public')
                    ->label('صورة قسم التعريف')
                    ->image()
                    ->directory('about')
                    ->downloadable(),

                // 3) Mission
                TextInput::make('mission_title')->label('عنوان الرؤية')->helperText('القسم: الرؤية'),
                Textarea::make('mission_text')->label('نص الرؤية')->rows(4)->helperText('القسم: الرؤية'),

                // 4) Vision
                TextInput::make('vision_title')->label('عنوان الرسالة')->helperText('القسم: الرسالة'),
                Textarea::make('vision_text')->label('نص الرسالة')->rows(4)->helperText('القسم: الرسالة'),

                // 5) Features
                Repeater::make('features')
                    ->relationship()
                    ->label('عناصر المميزات')
                    ->helperText('القسم: عناصر المميزات')
                    ->orderable('sort_order')
                    ->schema([
                        TextInput::make('title')->label('عنوان الميزة')->required(),
                        TextInput::make('text')->label('نص الميزة')->required(),
                        Select::make('icon_type')
                            ->label('نوع الأيقونة')
                            ->options([
                                'heroicon' => 'من قائمة أيقونات',
                                'media' => 'رفع صورة أيقونة',
                            ])
                            ->default('heroicon')
                            ->reactive(),
                        Select::make('heroicon_name')
                            ->label('اختيار الأيقونة')
                            ->options($heroicons)
                            ->visible(function ($get) { return $get('icon_type') === 'heroicon'; })
                            ->searchable(),
                        SpatieMediaLibraryFileUpload::make('icon_media')
                            ->collection('about_feature_icons')
                            ->disk('public')
                            ->label('أيقونة (صورة)')
                            ->image()
                            ->directory('about/icons')
                            ->visible(function ($get) { return $get('icon_type') === 'media'; }),
                    ])
                    ->columns(2)
                    ->defaultItems(4)
                    ->collapsed(false),

                // 6) CTA
                TextInput::make('cta_title')->label('عنوان الدعوة للتواصل')->helperText('القسم: الدعوة للتواصل'),
                Textarea::make('cta_text')->label('نص الدعوة للتواصل')->rows(3)->helperText('القسم: الدعوة للتواصل'),
                TextInput::make('cta_primary_text')->label('نص الزر الرئيسي')->helperText('القسم: الدعوة للتواصل'),
                TextInput::make('cta_primary_url')->label('رابط الزر الرئيسي')->helperText('القسم: الدعوة للتواصل'),
                TextInput::make('cta_secondary_text')->label('نص الزر الثانوي')->helperText('القسم: الدعوة للتواصل'),
                TextInput::make('cta_secondary_url')->label('رابط الزر الثانوي')->helperText('القسم: الدعوة للتواصل'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('hero_title')->label('عنوان الهيرو'),
                TextColumn::make('about_title')->label('عنوان التعريف'),
                TextColumn::make('updated_at')->label('آخر تحديث')->dateTime(),
            ])
            ->filters([])
            ->recordAction('edit');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAboutPage::route('/'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}


