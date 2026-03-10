<?php

namespace App\Filament\Resources\Galleries;

use App\Filament\Resources\Galleries\Pages;
use App\Filament\Resources\Galleries\Schemas\GalleryForm;
use App\Filament\Resources\Galleries\Schemas\GalleryInfolist;
use App\Filament\Resources\Galleries\Tables\GalleriesTable;
use App\Models\Gallery;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Gallery';

    protected static \UnitEnum|string|null $navigationGroup = 'Frontend Management';

    public static function form(Schema $schema): Schema
    {
        return GalleryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GalleryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalleriesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'view'   => Pages\ViewGallery::route('/{record}'),
            'edit'   => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
