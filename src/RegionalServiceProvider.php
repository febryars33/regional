<?php

namespace Snairbef\Regional;

use Snairbef\Regional\Commands\RegionalCommand;
use Snairbef\Regional\Contracts\Repositories\DistrictRepository;
use Snairbef\Regional\Contracts\Repositories\ProvinceRepository;
use Snairbef\Regional\Contracts\Repositories\RegencyRepository;
use Snairbef\Regional\Contracts\Repositories\SubDistrictRepository;
use Snairbef\Regional\Repositories\DistrictRepository as District;
use Snairbef\Regional\Repositories\ProvinceRepository as Province;
use Snairbef\Regional\Repositories\RegencyRepository as Regency;
use Snairbef\Regional\Repositories\SubDistrictRepository as SubDistrict;
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
            // ->hasViews()
            ->hasMigration('create_provinces_table')
            ->hasMigration('create_regencies_table')
            ->hasMigration('create_districts_table')
            ->hasMigration('create_sub_districts_table')
            ->hasCommand(RegionalCommand::class);
    }

    public function registeringPackage()
    {
        $this->app->bind(ProvinceRepository::class, Province::class);
        $this->app->bind(RegencyRepository::class, Regency::class);
        $this->app->bind(DistrictRepository::class, District::class);
        $this->app->bind(SubDistrictRepository::class, SubDistrict::class);
    }
}
