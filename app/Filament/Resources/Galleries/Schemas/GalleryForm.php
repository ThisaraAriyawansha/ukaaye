<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallery Details')
                    ->icon('heroicon-o-photo')
                    ->components([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('category_name')
                            ->label('Category Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->required()
                            ->inline(false),
                    ]),

                Section::make('Image')
                    ->icon('heroicon-o-camera')
                    ->components([
                        Forms\Components\FileUpload::make('image_path')
                            ->hiddenLabel()
                            ->disk('public')
                            ->directory('gallery_img')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight('250')
                            ->nullable(),
                    ]),
            ]);
    }
}
