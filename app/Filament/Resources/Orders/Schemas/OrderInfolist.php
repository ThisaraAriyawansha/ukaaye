<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                // ── Top: Order meta (full width) ─────────────────
                Section::make('Order Details')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->columnSpanFull()
                    ->components([
                        Grid::make(4)
                            ->components([
                                TextEntry::make('order_code')
                                    ->label('Order Code')
                                    ->copyable()
                                    ->weight('bold')
                                    ,
                                TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->color(fn (string $state) => match ($state) {
                                        'pending'  => 'warning',
                                        'approved' => 'success',
                                        'rejected' => 'danger',
                                        default    => 'gray',
                                    }),
                                TextEntry::make('payment_type')
                                    ->label('Payment Method')
                                    ->formatStateUsing(fn (string $state) => str_replace('_', ' ', ucwords($state, '_')))
                                    ->badge()
                                    ->color('info'),
                                TextEntry::make('created_at')
                                    ->label('Placed At')
                                    ->dateTime('d M Y, h:i A'),
                            ]),
                    ]),

                // ── Left: Customer information ────────────────────
                Section::make('Customer Information')
                    ->icon('heroicon-o-user')
                    ->columnSpan(1)
                    ->components([
                        Grid::make(2)
                            ->components([
                                TextEntry::make('first_name')->label('First Name'),
                                TextEntry::make('last_name')->label('Last Name'),
                                TextEntry::make('email')->columnSpanFull(),
                                TextEntry::make('phone'),
                                TextEntry::make('town')->label('Town / City'),
                                TextEntry::make('state'),
                                TextEntry::make('zip')->label('ZIP Code'),
                                TextEntry::make('address')->label('Address')->columnSpanFull(),
                                TextEntry::make('notes')
                                    ->label('Additional Notes')
                                    ->placeholder('—')
                                    ->columnSpanFull(),
                            ]),
                    ]),

                // ── Right: Payment summary ────────────────────────
                Section::make('Payment Summary')
                    ->icon('heroicon-o-banknotes')
                    ->columnSpan(1)
                    ->components([
                        TextEntry::make('subtotal')
                            ->label('Subtotal')
                            ->money('LKR'),
                        TextEntry::make('shipping')
                            ->label('Shipping')
                            ->money('LKR'),
                        TextEntry::make('total')
                            ->label('Grand Total')
                            ->money('LKR')
                            ->weight('bold')
                            ,
                    ]),

                // ── Bottom: Order items (full width) ──────────────
                Section::make('Order Items')
                    ->icon('heroicon-o-shopping-bag')
                    ->columnSpanFull()
                    ->components([
                        RepeatableEntry::make('items')
                            ->hiddenLabel()
                            ->schema([
                                TextEntry::make('title')
                                    ->label('Product')
                                    ->weight('bold'),
                                TextEntry::make('qty')
                                    ->label('Quantity'),
                                TextEntry::make('price')
                                    ->label('Unit Price')
                                    ->money('LKR'),
                                TextEntry::make('subtotal')
                                    ->label('Subtotal')
                                    ->money('LKR')
                                    ->weight('bold'),
                            ])
                            ->columns(4),
                    ]),

            ]);
    }
}
