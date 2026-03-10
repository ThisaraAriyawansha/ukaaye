<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Details')
                    ->components([
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('category.name')->label('Category'),
                        TextEntry::make('tags.name')->label('Tags')->badge(),
                        Grid::make(3)
                            ->components([
                                TextEntry::make('product_code')->placeholder('—'),
                                TextEntry::make('product_status')
                                    ->label('Stock Status')
                                    ->formatStateUsing(fn (string $state) => match ($state) {
                                        'in_stock' => 'In Stock',
                                        'out_of_stock' => 'Out of Stock',
                                        'pre_order' => 'Pre Order',
                                        default => $state,
                                    })
                                    ->badge()
                                    ->color(fn (string $state) => match ($state) {
                                        'in_stock' => 'success',
                                        'out_of_stock' => 'danger',
                                        'pre_order' => 'warning',
                                        default => 'gray',
                                    }),
                                IconEntry::make('is_active')->boolean()->label('Active'),
                            ]),
                        Grid::make(3)
                            ->components([
                                TextEntry::make('retail_price')->money('LKR'),
                                TextEntry::make('discounted_price')->money('LKR')->placeholder('—'),
                                TextEntry::make('qty')->label('Quantity'),
                            ]),
                    ]),

                Section::make('Images')
                    ->components([
                        ImageEntry::make('main_img')
                            ->disk('public')
                            ->label('Main Image'),
                        ImageEntry::make('other_img')
                            ->disk('public')
                            ->label('Other Images'),
                    ]),

                Section::make('Description')
                    ->components([
                        TextEntry::make('description')
                            ->html()
                            ->columnSpanFull(),
                    ]),

                Section::make('SEO')
                    ->collapsed()
                    ->components([
                        TextEntry::make('meta_title')->placeholder('—'),
                        TextEntry::make('meta_description')->placeholder('—'),
                        TextEntry::make('meta_keyword')->placeholder('—'),
                    ]),
            ]);
    }
}
