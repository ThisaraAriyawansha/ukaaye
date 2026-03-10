<?php

namespace App\Filament\Resources\ProductTags\Pages;

use App\Filament\Resources\ProductTags\ProductTagResource;
use Filament\Resources\Pages\EditRecord;

class EditProductTag extends EditRecord
{
    protected static string $resource = ProductTagResource::class;
}
