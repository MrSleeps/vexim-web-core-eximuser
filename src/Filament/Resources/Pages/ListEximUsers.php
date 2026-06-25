<?php

namespace VEximweb\Core\EximUser\Filament\Resources\Pages;

use VEximweb\Core\EximUser\Filament\Resources\EximUserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEximUsers extends ListRecords
{
    protected static string $resource = EximUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
