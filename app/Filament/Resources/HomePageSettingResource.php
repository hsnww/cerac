<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomePageSettingResource\Pages;
use App\Models\HomePageSetting;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class HomePageSettingResource extends Resource
{
    protected static ?string $model = HomePageSetting::class;

    protected static ?string $navigationLabel = 'الصفحة الرئيسية';
    protected static string|\UnitEnum|null $navigationGroup = 'اعدادات الموقع';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Toggle::make('show_hero')->label('إظهار الهيرو'),
            TextInput::make('order_hero')->label('ترتيب الهيرو')->numeric()->default(1),

            Toggle::make('show_cta')->label('إظهار CTA'),
            TextInput::make('order_cta')->label('ترتيب CTA')->numeric()->default(2),

            Toggle::make('show_products')->label('إظهار المنتجات'),
            TextInput::make('order_products')->label('ترتيب المنتجات')->numeric()->default(3),

            Toggle::make('show_partners')->label('إظهار الشركاء'),
            TextInput::make('order_partners')->label('ترتيب الشركاء')->numeric()->default(4),

            Toggle::make('show_projects')->label('إظهار الأعمال'),
            TextInput::make('order_projects')->label('ترتيب الأعمال')->numeric()->default(5),

            Toggle::make('show_clients')->label('إظهار العملاء'),
            TextInput::make('order_clients')->label('ترتيب العملاء')->numeric()->default(6),

            Toggle::make('show_contact_teaser')->label('إظهار تواصل مختصر'),
            TextInput::make('order_contact_teaser')->label('ترتيب تواصل مختصر')->numeric()->default(7),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('updated_at')->label('آخر تحديث')->dateTime(),
            ])
            ->recordAction('edit');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageHomePageSetting::route('/'),
            'edit' => Pages\EditHomePageSetting::route('/{record}/edit'),
        ];
    }

    public static function getNavigationUrl(): string
    {
        $record = HomePageSetting::query()->first();
        return $record
            ? static::getUrl('edit', ['record' => $record])
            : static::getUrl('index');
    }
}


