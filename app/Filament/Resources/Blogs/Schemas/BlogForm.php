<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Blog Details')
                    ->icon('heroicon-o-document-text')
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
                        Grid::make(2)
                            ->components([
                                Forms\Components\Select::make('blog_category_id')
                                    ->label('Category')
                                    ->relationship(name: 'category', titleAttribute: 'name')
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                                $set('slug', Str::slug($state));
                                            })
                                            ->live(onBlur: true),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->unique('blog_categories', 'slug'),
                                        Forms\Components\Textarea::make('description')
                                            ->nullable(),
                                        Forms\Components\Toggle::make('is_active')
                                            ->required(),
                                    ])
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\Select::make('tags')
                                    ->multiple()
                                    ->relationship(name: 'tags', titleAttribute: 'name')
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                                $set('slug', Str::slug($state));
                                            })
                                            ->live(onBlur: true),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->unique('blog_tags', 'slug'),
                                        Forms\Components\Toggle::make('is_active')
                                            ->required(),
                                    ])
                                    ->searchable()
                                    ->preload(),
                            ]),
                        Grid::make(3)
                            ->components([
                                Forms\Components\TextInput::make('author_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('published_at')
                                    ->required()
                                    ->native(false),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Published')
                                    ->required()
                                    ->inline(false),
                            ]),
                    ]),

                Section::make('Featured Image')
                    ->icon('heroicon-o-photo')
                    ->components([
                        Forms\Components\FileUpload::make('image_path')
                            ->hiddenLabel()
                            ->disk('public')
                            ->directory('blog_img')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight('250')
                            ->nullable(),
                    ]),

                Section::make('Content')
                    ->icon('heroicon-o-pencil-square')
                    ->components([
                        Forms\Components\RichEditor::make('description')
                            ->hiddenLabel()
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('blog_attachments'),
                    ]),

                Section::make('SEO')
                    ->icon('heroicon-o-magnifying-glass')
                    ->components([
                        Forms\Components\TextInput::make('meta_title')
                            ->maxLength(255)
                            ->nullable(),
                        Forms\Components\Textarea::make('meta_description')
                            ->rows(3)
                            ->nullable(),
                        Forms\Components\TextInput::make('meta_keywords')
                            ->nullable(),
                    ]),
            ]);
    }
}
