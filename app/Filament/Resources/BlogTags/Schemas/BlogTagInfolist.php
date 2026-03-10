<?php

namespace App\Filament\Resources\BlogTags\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BlogTagInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                IconEntry::make('is_active')
                    ->boolean()
                    ->label('Active'),
            ]);
    }
}
