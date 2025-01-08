<?php

use Snairbef\Regional\Commons\Import\Regions\District;
use Snairbef\Regional\Commons\Import\Regions\Province;
use Snairbef\Regional\Commons\Import\Regions\Regency;
use Snairbef\Regional\Commons\Import\Regions\SubDistrict;
use Snairbef\Regional\Models\District as ModelsDistrict;
use Snairbef\Regional\Models\Province as ModelsProvince;
use Snairbef\Regional\Models\Regency as ModelsRegency;
use Snairbef\Regional\Models\SubDistrict as ModelsSubDistrict;

it('importing province records', function () {
    $province = new Province(new ModelsProvince);

    $import = $province->import([
        'id' => 1,
        'name' => 'Jawa Barat',
        'status' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    expect($import)->toBeBool();
});

it('importing regency records', function () {
    $regency = new Regency(new ModelsRegency);

    $import = $regency->import([
        'id' => 100,
        'province_id' => 1,
        'name' => 'Kota Bandung',
        'status' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    expect($import)->toBeBool();
});

it('importing district records', function () {
    $district = new District(new ModelsDistrict);

    $import = $district->import([
        'id' => 100,
        'regency_id' => 1,
        'name' => 'Sukajadi',
        'status' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    expect($import)->toBeBool();
});

it('importing sub district records', function () {
    $sub_district = new SubDistrict(new ModelsSubDistrict);

    $import = $sub_district->import([
        'id' => 100,
        'district_id' => 1,
        'name' => 'Sukabungah',
        'status' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    expect($import)->toBeBool();
});
