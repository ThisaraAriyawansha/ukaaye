<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
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
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                        $set('slug', Str::slug($state));
                                    })
                                    ->live(onBlur: true),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                            ]),
                        Forms\Components\RichEditor::make('description')
                            ->nullable()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('service_attachments'),
                    ]),

                Section::make('Service Image')
                    ->icon('heroicon-o-photo')
                    ->components([
                        Forms\Components\FileUpload::make('image_path')
                            ->hiddenLabel()
                            ->disk('public')
                            ->directory('service_img')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight('220')
                            ->nullable(),
                    ]),

                Section::make('Visibility')
                    ->icon('heroicon-o-eye')
                    ->components([
                        Forms\Components\Toggle::make('is_public')
                            ->label('Publicly Visible')
                            ->default(true)
                            ->inline(false),
                    ]),

                Section::make('SEO')
                    ->icon('heroicon-o-magnifying-glass')
                    ->components([
                        Grid::make(2)
                            ->components([
                                Forms\Components\TextInput::make('meta_title')
                                    ->maxLength(255)
                                    ->nullable(),
                                Forms\Components\TextInput::make('meta_keyword')
                                    ->nullable()
                                    ->helperText('Separate keywords with commas'),
                            ]),
                        Forms\Components\Textarea::make('meta_description')
                            ->rows(3)
                            ->nullable(),
                    ]),
            ]);
    }
}
