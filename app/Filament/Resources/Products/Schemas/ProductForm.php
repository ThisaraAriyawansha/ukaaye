<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Details')
                    ->icon('heroicon-o-shopping-bag')
                    ->components([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->live(onBlur: true),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Grid::make(2)
                            ->components([
                                Forms\Components\Select::make('product_category_id')
                                    ->label('Category')
                                    ->relationship(name: 'category', titleAttribute: 'name')
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                                $set('slug', Str::slug($state));
                                            })
                                            ->live(onBlur: true),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->unique('product_categories', 'slug'),
                                        Forms\Components\Textarea::make('description')
                                            ->nullable(),
                                        Forms\Components\Toggle::make('is_active')
                                            ->required(),
                                    ])
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\Select::make('tags')
                                    ->multiple()
                                    ->relationship(name: 'tags', titleAttribute: 'name')
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                                $set('slug', Str::slug($state));
                                            })
                                            ->live(onBlur: true),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->unique('product_tags', 'slug'),
                                        Forms\Components\Toggle::make('is_active')
                                            ->required(),
                                    ])
                                    ->searchable()
                                    ->preload(),
                            ]),
                        Grid::make(3)
                            ->components([
                                Forms\Components\TextInput::make('product_code')
                                    ->maxLength(255)
                                    ->nullable(),
                                Forms\Components\Select::make('product_status')
                                    ->label('Stock Status')
                                    ->options([
                                        'in_stock' => 'In Stock',
                                        'out_of_stock' => 'Out of Stock',
                                        'pre_order' => 'Pre Order',
                                    ])
                                    ->default('in_stock')
                                    ->required(),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->required()
                                    ->inline(false),
                            ]),
                        Grid::make(3)
                            ->components([
                                Forms\Components\TextInput::make('retail_price')
                                    ->numeric()
                                    ->prefix('LKR')
                                    ->required(),
                                Forms\Components\TextInput::make('discounted_price')
                                    ->numeric()
                                    ->prefix('LKR')
                                    ->nullable(),
                                Forms\Components\TextInput::make('qty')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),
                    ]),

                Section::make('Images')
                    ->icon('heroicon-o-photo')
                    ->components([
                        Forms\Components\FileUpload::make('main_img')
                            ->label('Main Image')
                            ->disk('public')
                            ->directory('product_img')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight('250')
                            ->nullable(),
                        Forms\Components\FileUpload::make('other_img')
                            ->label('Other Images')
                            ->disk('public')
                            ->directory('product_img')
                            ->visibility('public')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->nullable(),
                    ]),

                Section::make('Description')
                    ->icon('heroicon-o-pencil-square')
                    ->components([
                        Forms\Components\RichEditor::make('description')
                            ->hiddenLabel()
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('product_attachments'),
                    ]),

                Section::make('SEO')
                    ->icon('heroicon-o-magnifying-glass')
                    ->collapsed()
                    ->components([
                        Forms\Components\TextInput::make('meta_title')
                            ->maxLength(255)
                            ->nullable(),
                        Forms\Components\Textarea::make('meta_description')
                            ->rows(3)
                            ->nullable(),
                        Forms\Components\TextInput::make('meta_keyword')
                            ->nullable(),
                    ]),
            ]);
    }
}
