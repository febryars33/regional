<?php

namespace Snairbef\Regional;

use Snairbef\Regional\Commands\ImportCommand;
use Snairbef\Regional\Contracts\Repositories\DistrictRepository;
use Snairbef\Regional\Contracts\Repositories\ProvinceRepository;
use Snairbef\Regional\Contracts\Repositories\RegencyRepository;
use Snairbef\Regional\Contracts\Repositories\SubDistrictRepository;
use Snairbef\Regional\Repositories\DistrictRepository as District;
use Snairbef\Regional\Repositories\ProvinceRepository as Province;
use Snairbef\Regional\Repositories\RegencyRepository as Regency;
use Snairbef\Regional\Repositories\SubDistrictRepository as SubDistrict;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RegionalServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('regional')
            ->hasConfigFile()
            ->hasMigrations(['create_provinces_table', 'create_regencies_table', 'create_districts_table', 'create_sub_districts_table'])
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, thanks for installing package from Snairbef!');
                    })
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->copyAndRegisterServiceProviderInApp()
                    ->askToStarRepoOnGitHub('snairbef/regional')
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Done installing the package!');
                    });
            })
            ->hasCommands([
                ImportCommand::class,
            ]);
    }

    public function registeringPackage()
    {
        $this->app->bind(ProvinceRepository::class, Province::class);
        $this->app->bind(RegencyRepository::class, Regency::class);
        $this->app->bind(DistrictRepository::class, District::class);
        $this->app->bind(SubDistrictRepository::class, SubDistrict::class);
    }
}
