<?php

use Snairbef\Regional\Contracts\Repositories\SubDistrictRepository;

it('inserting via repository', function () {
    $repository = app(SubDistrictRepository::class);

    $repository->create([
        'district_id' => 1,
        'name' => 'Sukagalih',
    ]);

    $this->assertDatabaseHas('sub_districts', [
        'district_id' => 1,
        'name' => 'Sukagalih',
    ]);
});

it('updating via repository', function () {
    $repository = app(SubDistrictRepository::class);

    $province = $repository->create([
        'district_id' => 1,
        'name' => 'Sukagalih',
    ]);

    $repository->update($province->id, ['district_id' => 1, 'name' => 'Sukagalih']);

    $this->assertDatabaseHas('sub_districts', ['district_id' => 1, 'name' => 'Sukagalih']);
});

it('deleting via repository', function () {
    $repository = app(SubDistrictRepository::class);

    $province = $repository->create([
        'district_id' => 1,
        'name' => 'Sukagalih',
    ]);

    $repository->delete($province->id);

    $this->assertDatabaseMissing('sub_districts', ['id', $province->id]);
});

it('soft deleting via repository', function () {
    $repository = app(SubDistrictRepository::class);

    $province = $repository->create([
        'district_id' => 1,
        'name' => 'Sukagalih',
    ]);

    $repository->delete($province->id);

    $this->assertSoftDeleted('sub_districts', ['id' => 1]);
});
