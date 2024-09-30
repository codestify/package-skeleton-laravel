<?php

namespace Manza\Paisa;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PaisaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('paisa')
            ->hasConfigFile('paisa')
            ->hasMigration('create_paisa_table');
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(Paisa::class, function ($app) {
            $manager = $app->make(PaisaManager::class);
            return new Paisa($manager);
        });
    }
}
