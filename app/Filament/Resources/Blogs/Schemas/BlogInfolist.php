<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BlogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('image_path')
                    ->disk('public')
                    ->label('Image'),
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('category.name')
                    ->label('Category'),
                TextEntry::make('author_name')
                    ->label('Author'),
                TextEntry::make('published_at')
                    ->date()
                    ->label('Published'),
                TextEntry::make('meta_title')
                    ->placeholder('—'),
                TextEntry::make('meta_description')
                    ->placeholder('—'),
                TextEntry::make('meta_keywords')
                    ->placeholder('—'),
                TextEntry::make('description')
                    ->html()
                    ->columnSpanFull(),
                IconEntry::make('is_active')
                    ->boolean()
                    ->label('Active'),
            ]);
    }
}
