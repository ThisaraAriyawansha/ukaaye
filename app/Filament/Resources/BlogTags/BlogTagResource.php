<?php

namespace App\Filament\Resources\BlogTags;

use App\Filament\Resources\BlogTags\Pages;
use App\Filament\Resources\BlogTags\Schemas\BlogTagForm;
use App\Filament\Resources\BlogTags\Schemas\BlogTagInfolist;
use App\Filament\Resources\BlogTags\Tables\BlogTagsTable;
use App\Models\BlogTag;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class BlogTagResource extends Resource
{
    protected static ?string $model = BlogTag::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Blog Tags';

    protected static \UnitEnum|string|null $navigationGroup = 'Content Management';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BlogTagForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BlogTagInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogTagsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogTags::route('/'),
            'create' => Pages\CreateBlogTag::route('/create'),
            'view' => Pages\ViewBlogTag::route('/{record}'),
            'edit' => Pages\EditBlogTag::route('/{record}/edit'),
        ];
    }
}
