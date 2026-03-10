<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Infolists;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery Details')
                    ->icon('heroicon-o-photo')
                    ->components([
                        Infolists\Components\TextEntry::make('name'),
                        Infolists\Components\TextEntry::make('category_name')
                            ->label('Category Name'),
                        Infolists\Components\IconEntry::make('is_active')
                            ->label('Active')
                            ->boolean(),
                    ]),

                Section::make('Image')
                    ->icon('heroicon-o-camera')
                    ->components([
                        Infolists\Components\ImageEntry::make('image_path')
                            ->hiddenLabel()
                            ->disk('public'),
                    ]),
            ]);
    }
}
