<?php

namespace App\Filament\Resources\SiteSettings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class SiteSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('الشعار')
                    ->disk('public')
                    ->size(60)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('logo');
                    }),
                ImageColumn::make('logo_light')
                    ->label('الشعار الفاتح')
                    ->disk('public')
                    ->size(60)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('logo_light');
                    }),
                ImageColumn::make('favicon')
                    ->label('الأيقونة')
                    ->disk('public')
                    ->size(30)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('favicon');
                    }),
                TextColumn::make('site_name')
                    ->searchable(),
                TextColumn::make('site_description')
                    ->searchable(),
                TextColumn::make('contact_phone')
                    ->searchable(),
                TextColumn::make('contact_email')
                    ->searchable(),
                TextColumn::make('facebook_url')
                    ->searchable(),
                TextColumn::make('twitter_url')
                    ->searchable(),
                TextColumn::make('linkedin_url')
                    ->searchable(),
                TextColumn::make('instagram_url')
                    ->searchable(),
                TextColumn::make('youtube_url')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
