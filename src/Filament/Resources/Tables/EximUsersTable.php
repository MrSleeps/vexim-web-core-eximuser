<?php

namespace VEximweb\Core\EximUser\Filament\Resources\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class EximUsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('domain.domain')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('domain_id')
                    ->label('Domain')
                    ->relationship('domain', 'domain'),
                    
                TernaryFilter::make('enabled')
                    ->label('Enabled')
                    ->placeholder('All accounts')
                    ->trueLabel('Enabled only')
                    ->falseLabel('Disabled only'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}