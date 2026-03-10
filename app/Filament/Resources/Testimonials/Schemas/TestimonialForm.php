<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Testimonial Details')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->components([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('position')
                            ->label('Position / Role')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('message')
                            ->required()
                            ->rows(4)
                            ->maxLength(1000),
                        Forms\Components\Select::make('star_count')
                            ->label('Star Rating')
                            ->options([
                                1 => '★ 1',
                                2 => '★★ 2',
                                3 => '★★★ 3',
                                4 => '★★★★ 4',
                                5 => '★★★★★ 5',
                            ])
                            ->default(5)
                            ->required(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->inline(false),
                    ]),

                Section::make('Photo')
                    ->icon('heroicon-o-user-circle')
                    ->components([
                        Forms\Components\FileUpload::make('image_path')
                            ->hiddenLabel()
                            ->disk('public')
                            ->directory('testimonials_img')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight('250')
                            ->nullable(),
                    ]),
            ]);
    }
}
