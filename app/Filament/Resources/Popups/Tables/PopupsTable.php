<?php

namespace App\Filament\Resources\Popups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PopupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // الصورة
                ImageColumn::make('popup_images')
                    ->label('الصورة')
                    ->disk('public')
                    ->size(60)
                    ->getStateUsing(function ($record) {
                        return $record->getFirstMediaUrl('popup_images');
                    }),
                
                // العنوان
                TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                // النوع
                TextColumn::make('type')
                    ->label('النوع')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'poster' => 'success',
                        'youtube' => 'danger',
                        'video' => 'warning',
                        'form' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'poster' => 'بوستر',
                        'youtube' => 'يوتيوب',
                        'video' => 'فيديو',
                        'form' => 'نموذج',
                        default => $state,
                    }),
                
                // الحالة
                IconColumn::make('is_active')
                    ->label('الحالة')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                
                // عدد المشاهدات
                TextColumn::make('display_count')
                    ->label('المشاهدات')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                
                // تاريخ البداية
                TextColumn::make('starts_at')
                    ->label('يبدأ من')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(),
                
                // تاريخ النهاية
                TextColumn::make('ends_at')
                    ->label('ينتهي في')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(),
                
                // ترتيب العرض
                TextColumn::make('sort_order')
                    ->label('الترتيب')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // زر التنشيط/التعطيل
                Action::make('toggle_active')
                    ->label(fn ($record) => $record->is_active ? 'تعطيل' : 'تنشيط')
                    ->icon(fn ($record) => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->is_active ? 'danger' : 'success')
                    ->size('sm')
                    ->action(function ($record) {
                        if (!$record->is_active) {
                            // If activating this popup, deactivate all others first
                            \App\Models\Popup::where('id', '!=', $record->id)
                                ->update(['is_active' => false]);
                        }
                        $record->update(['is_active' => !$record->is_active]);
                    })
                    ->requiresConfirmation()
                    ->modalHeading(fn ($record) => $record->is_active ? 'تعطيل النافذة المنبثقة' : 'تنشيط النافذة المنبثقة')
                    ->modalDescription(fn ($record) => $record->is_active 
                        ? 'هل أنت متأكد من تعطيل هذه النافذة المنبثقة؟' 
                        : 'هل أنت متأكد من تنشيط هذه النافذة المنبثقة؟ سيتم تعطيل جميع النوافذ الأخرى تلقائياً.')
                    ->modalSubmitActionLabel('تأكيد')
                    ->modalCancelActionLabel('إلغاء'),
                
                ViewAction::make()
                    ->label('عرض'),
                EditAction::make()
                    ->label('تعديل'),
            ])
            ->defaultSort('sort_order', 'asc')
            ->headerActions([
                // Add a header action to show active popups count
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('لا توجد نوافذ منبثقة')
            ->emptyStateDescription('ابدأ بإنشاء نافذة منبثقة جديدة')
            ->emptyStateIcon('heroicon-o-rectangle-stack');
    }
}
