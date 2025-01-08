<?php

namespace Snairbef\Regional\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Snairbef\Regional\RegionalServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Snairbef\\Regional\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            RegionalServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $this->migration();
    }

    protected function migration()
    {
        $migration_province = include __DIR__.'/../database/migrations/create_provinces_table.php.stub';
        $migration_province->up();

        $migration_regency = include __DIR__.'/../database/migrations/create_regencies_table.php.stub';
        $migration_regency->up();

        $migration_district = include __DIR__.'/../database/migrations/create_districts_table.php.stub';
        $migration_district->up();

        $migration_sub_district = include __DIR__.'/../database/migrations/create_sub_districts_table.php.stub';
        $migration_sub_district->up();
    }
}
