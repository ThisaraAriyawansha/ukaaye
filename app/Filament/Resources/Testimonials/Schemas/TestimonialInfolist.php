<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Infolists;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Testimonial Details')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->components([
                        Infolists\Components\TextEntry::make('name'),
                        Infolists\Components\TextEntry::make('position')
                            ->label('Position / Role'),
                        Infolists\Components\TextEntry::make('message'),
                        Infolists\Components\TextEntry::make('star_count')
                            ->label('Star Rating'),
                        Infolists\Components\IconEntry::make('is_active')
                            ->label('Active')
                            ->boolean(),
                    ]),

                Section::make('Photo')
                    ->icon('heroicon-o-user-circle')
                    ->components([
                        Infolists\Components\ImageEntry::make('image_path')
                            ->hiddenLabel()
                            ->disk('public'),
                    ]),
            ]);
    }
}
