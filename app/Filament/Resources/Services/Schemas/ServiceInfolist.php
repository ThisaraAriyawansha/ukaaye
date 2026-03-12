<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Service Details')
                    ->icon('heroicon-o-briefcase')
                    ->components([
                        Grid::make(2)
                            ->components([
                                TextEntry::make('title'),
                                TextEntry::make('slug'),
                            ]),
                        TextEntry::make('description')
                            ->html()
                            ->placeholder('—')
                            ->columnSpanFull(),
                    ]),

                Section::make('Service Image')
                    ->icon('heroicon-o-photo')
                    ->components([
                        ImageEntry::make('image_path')
                            ->disk('public')
                            ->hiddenLabel(),
                    ]),

                Section::make('Visibility')
                    ->icon('heroicon-o-eye')
                    ->components([
                        IconEntry::make('is_public')
                            ->boolean()
                            ->label('Publicly Visible'),
                    ]),

                Section::make('SEO')
                    ->icon('heroicon-o-magnifying-glass')
                    ->components([
                        Grid::make(2)
                            ->components([
                                TextEntry::make('meta_title')
                                    ->placeholder('—'),
                                TextEntry::make('meta_keyword')
                                    ->placeholder('—'),
                            ]),
                        TextEntry::make('meta_description')
                            ->placeholder('—')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
