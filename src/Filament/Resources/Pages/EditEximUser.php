<?php

namespace VEximweb\Core\EximUser\Filament\Resources\Pages;

use VEximweb\Core\EximUser\Filament\Resources\EximUserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEximUser extends EditRecord
{
    protected static string $resource = EximUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
