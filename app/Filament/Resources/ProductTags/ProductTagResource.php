<?php

namespace App\Filament\Resources\ProductTags;

use App\Filament\Resources\ProductTags\Pages;
use App\Filament\Resources\ProductTags\Schemas\ProductTagForm;
use App\Filament\Resources\ProductTags\Schemas\ProductTagInfolist;
use App\Filament\Resources\ProductTags\Tables\ProductTagsTable;
use App\Models\ProductTag;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ProductTagResource extends Resource
{
    protected static ?string $model = ProductTag::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Product Tags';

    protected static \UnitEnum|string|null $navigationGroup = 'Product Management';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ProductTagForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProductTagInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductTagsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductTags::route('/'),
            'create' => Pages\CreateProductTag::route('/create'),
            'view' => Pages\ViewProductTag::route('/{record}'),
            'edit' => Pages\EditProductTag::route('/{record}/edit'),
        ];
    }
}
