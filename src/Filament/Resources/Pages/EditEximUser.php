<?php

namespace VEximweb\Core\EximUser\Filament\Resources\Pages;

use VEximweb\Core\EximUser\Filament\Resources\EximUserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditEximUser extends EditRecord
{
    protected static string $resource = EximUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $password = $this->data['crypt'] ?? null;

        if (filled($password)) {
            $data['crypt'] = Hash::make($password);
        } else {
            unset($data['crypt']);
        }

        return $data;
    }
}
