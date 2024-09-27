<?php

namespace Manza\Paisa;

use Manza\Paisa\Commands\PaisaCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PaisaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('paisa')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_paisa_table')
            ->hasCommand(PaisaCommand::class);
    }
}
