<?php

use Snairbef\Regional\Contracts\Repositories\DistrictRepository;

it('inserting via repository', function () {
    $repository = app(DistrictRepository::class);

    $repository->create([
        'regency_id'   =>  1,
        'name'  =>  'Sukajadi'
    ]);

    $this->assertDatabaseHas('districts', [
        'regency_id'   =>  1,
        'name'  =>  'Sukajadi'
    ]);
});

it('updating via repository', function () {
    $repository = app(DistrictRepository::class);

    $province = $repository->create([
        'regency_id'   =>  1,
        'name'  =>  'Sukajadi'
    ]);

    $repository->update($province->id, ['regency_id' => 1, 'name' => 'Sukajadi']);

    $this->assertDatabaseHas('districts', ['regency_id' => 1, 'name' => 'Sukajadi']);
});

it('deleting via repository', function () {
    $repository = app(DistrictRepository::class);

    $province = $repository->create([
        'regency_id'   =>  1,
        'name'  =>  'Sukajadi'
    ]);

    $repository->delete($province->id);

    $this->assertDatabaseMissing('districts', ['id', $province->id]);
});

it('soft deleting via repository', function () {
    $repository = app(DistrictRepository::class);

    $province = $repository->create([
        'regency_id'   =>  1,
        'name'  =>  'Sukajadi'
    ]);

    $repository->delete($province->id);

    $this->assertSoftDeleted('districts', ['id' => 1]);
});
