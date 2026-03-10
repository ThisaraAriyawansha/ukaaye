<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('subject')
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('submitted_at')
                    ->required(),
                Toggle::make('is_read')
                    ->required(),
                DateTimePicker::make('read_at'),
                TextInput::make('ip_address')
                    ->default(null),
                Select::make('status')
                    ->options(['new' => 'New', 'replied' => 'Replied', 'spam' => 'Spam', 'deleted' => 'Deleted'])
                    ->default('new')
                    ->required(),
            ]);
    }
}
