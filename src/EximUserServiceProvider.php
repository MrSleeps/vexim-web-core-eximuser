<?php
namespace VEximweb\Core\EximUser;

use Filament\Panel;
use Illuminate\Support\ServiceProvider;
use VEximweb\Core\Data\Repositories\Interfaces\EximUserRepositoryInterface;
use VEximweb\Core\Data\Repositories\EximUserRepository;

class EximUserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/eximuser.php',
            'eximuser'
        );
        
        // Bind plugin repositories
        $this->bindRepositories();
        
        // Bind plugin Services
        $this->bindServices();        
        
        Panel::configureUsing(function (Panel $panel) {
            $panel->plugin(EximUserPlugin::make());
        });
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        //$this->loadViewsFrom(__DIR__ . '/../resources/views', 'eximuser');
        //$this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->publishes([
            __DIR__ . '/../config/eximuser.php' => config_path('eximuser.php'),
        ], 'eximuser-config');
        if ($this->app->runningInConsole()) {
            $this->commands([

            ]);
        }
    }
    
    /**
     * Bind all repositories to their interfaces.
     */
    protected function bindRepositories(): void
    {
        $this->app->bind(EximUserRepositoryInterface::class, EximUserRepository::class);
    }    
    
    /**
     * Bind all services to the container.
     */
    protected function bindServices(): void
    {
        /*
        $this->app->singleton(DomainAdminService::class, function ($app) {
            return new DomainAdminService();
        });
        
        $this->app->singleton(DomainAdminLimitService::class, function ($app) {
            return new DomainAdminLimitService();
        });   
        */
    }      
}
