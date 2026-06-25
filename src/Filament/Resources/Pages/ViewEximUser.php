<?php

namespace VEximweb\Core\EximUser\Filament\Resources\Pages;

use VEximweb\Core\EximUser\Filament\Resources\EximUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEximUser extends ViewRecord
{
    protected static string $resource = EximUserResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}