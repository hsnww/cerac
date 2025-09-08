<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('الاسم')
                    ->placeholder('اكتب اسم المستخدم')
                    ->required(),
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->placeholder('name@example.com')
                    ->email()
                    ->required(),
                Select::make('roles')
                    ->label('الأدوار')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->native(false),
                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->placeholder('05xxxxxxxx')
                    ->tel(),
                Textarea::make('address')
                    ->label('العنوان')
                    ->placeholder('العنوان بالتفصيل')
                    ->columnSpanFull(),
                DateTimePicker::make('email_verified_at')
                    ->label('تاريخ توثيق البريد'),
                TextInput::make('password')
                    ->label('كلمة المرور')
                    ->password()
                    ->nullable()
                    ->revealable()
                    ->dehydrated(fn ($state) => filled($state))
                    ->dehydrateStateUsing(fn ($state) => \Illuminate\Support\Facades\Hash::make($state)),
            ]);
    }
}
