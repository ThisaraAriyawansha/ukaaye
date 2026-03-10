<?php

namespace App\Filament\Resources\ContactMessages;

use App\Filament\Resources\ContactMessages\Pages\EditContactMessage;
use App\Filament\Resources\ContactMessages\Pages\ListContactMessages;
use App\Filament\Resources\ContactMessages\Pages\ViewContactMessage;
use App\Models\ContactMessage;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-envelope';

    protected static string | \UnitEnum | null $navigationGroup = 'Frontend Management';

    protected static ?string $navigationLabel = 'Contact Messages';

    protected static ?string $pluralModelLabel = 'Contact Messages';

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_read', false)->count() ?: null;
    }

    public static function getNavigationBadgeColor(): string
    {
        return 'danger';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('full_name')
                    ->label('Full Name')
                    ->disabled()
                    ->columnSpan(1),

                TextInput::make('email')
                    ->label('Email')
                    ->disabled()
                    ->columnSpan(1),

                TextInput::make('phone')
                    ->label('Phone')
                    ->disabled()
                    ->columnSpan(1),

                TextInput::make('subject')
                    ->label('Subject')
                    ->disabled()
                    ->columnSpan(1),

                Textarea::make('message')
                    ->label('Message')
                    ->disabled()
                    ->rows(6)
                    ->columnSpanFull(),

                TextInput::make('ip_address')
                    ->label('IP Address')
                    ->disabled()
                    ->columnSpan(1),

                DateTimePicker::make('created_at')
                    ->label('Submitted At')
                    ->disabled()
                    ->columnSpan(1),

                DateTimePicker::make('read_at')
                    ->label('Read At')
                    ->disabled()
                    ->columnSpan(1),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'new'     => 'New',
                        'replied' => 'Replied',
                        'spam'    => 'Spam',
                        'deleted' => 'Deleted',
                    ])
                    ->required()
                    ->columnSpan(1),

                Toggle::make('is_read')
                    ->label('Mark as Read')
                    ->inline(false)
                    ->columnSpan(1),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                IconColumn::make('is_read')
                    ->label('Read')
                    ->boolean()
                    ->trueIcon('heroicon-o-envelope-open')
                    ->falseIcon('heroicon-o-envelope')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                TextColumn::make('full_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->searchable(),

                TextColumn::make('subject')
                    ->searchable()
                    ->limit(40),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new'     => 'info',
                        'replied' => 'success',
                        'spam'    => 'danger',
                        'deleted' => 'gray',
                        default   => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_read')
                    ->label('Read Status')
                    ->trueLabel('Read')
                    ->falseLabel('Unread')
                    ->placeholder('All Messages'),

                SelectFilter::make('status')
                    ->options([
                        'new'     => 'New',
                        'replied' => 'Replied',
                        'spam'    => 'Spam',
                        'deleted' => 'Deleted',
                    ]),
            ])
            ->actions([
                ViewAction::make()
                    ->after(function (ContactMessage $record) {
                        if (! $record->is_read) {
                            $record->update([
                                'is_read' => true,
                                'read_at' => now(),
                            ]);
                        }
                    }),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListContactMessages::route('/'),
            'view'   => ViewContactMessage::route('/{record}'),
            'edit'   => EditContactMessage::route('/{record}/edit'),
        ];
    }
}