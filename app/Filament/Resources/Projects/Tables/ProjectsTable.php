<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('صورة الغلاف')
                    ->disk('public')
                    ->size(60)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('cover_image');
                    }),
                TextColumn::make('title_ar')
                    ->label('العنوان (عربي)')
                    ->searchable(),
                TextColumn::make('title_en')
                    ->label('العنوان (إنجليزي)')
                    ->searchable(),
                TextColumn::make('video_url')
                    ->label('رابط الفيديو')
                    ->searchable(),
                TextColumn::make('location_text')
                    ->label('الموقع')
                    ->searchable(),
                TextColumn::make('latitude')
                    ->label('خط العرض')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('longitude')
                    ->label('خط الطول')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('client_id')
                    ->label('العميل (ID)')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->label('مميز')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label('الترتيب')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('أُنشئ في')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('عُدّل في')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()->label('عرض'),
                EditAction::make()->label('تعديل'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('حذف المحدد'),
                ]),
            ]);
    }
}
