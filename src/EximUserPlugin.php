<?php

namespace VEximweb\Core\EximUser;

use Filament\Contracts\Plugin;
use Filament\Panel;
use VEximweb\Core\EximUser\Filament\Resources\EximUserResource;

class EximUserPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());
        return $plugin;
    }       
    
    public function getId(): string
    {
        return 'eximuser';
    }

    public function register(Panel $panel): void
    {
        // Register the Group resource
        $panel->resources([
            EximUserResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        // Any boot logic
    }  
}