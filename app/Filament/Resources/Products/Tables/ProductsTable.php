<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('main_img')
                    ->disk('public')
                    ->label('Image')
                    ->defaultImageUrl(asset('assets/images/product/81zLS5Rv18L.jpg')),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Category')->sortable(),
                TextColumn::make('product_code')->label('Code')->placeholder('—'),
                TextColumn::make('retail_price')->money('LKR')->sortable(),
                TextColumn::make('discounted_price')->money('LKR')->placeholder('—'),
                TextColumn::make('qty')->label('Qty')->sortable(),
                TextColumn::make('product_status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'in_stock' => 'In Stock',
                        'out_of_stock' => 'Out of Stock',
                        'pre_order' => 'Pre Order',
                        default => $state,
                    })
                    ->color(fn (string $state) => match ($state) {
                        'in_stock' => 'success',
                        'out_of_stock' => 'danger',
                        'pre_order' => 'warning',
                        default => 'gray',
                    }),
                IconColumn::make('is_active')->boolean()->label('Active'),
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
