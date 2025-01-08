<?php

use Snairbef\Regional\Contracts\Repositories\RegencyRepository;

it('inserting via repository', function () {
    $repository = app(RegencyRepository::class);

    $repository->create([
        'province_id'   =>  1,
        'name'  =>  'Kota Bandung'
    ]);

    $this->assertDatabaseHas('regencies', [
        'province_id'   =>  1,
        'name'  =>  'Kota Bandung'
    ]);
});

it('updating via repository', function () {
    $repository = app(RegencyRepository::class);

    $province = $repository->create([
        'province_id'   =>  1,
        'name'  =>  'Kota Bandung'
    ]);

    $repository->update($province->id, ['province_id' => 1, 'name' => 'Kota Bandung']);

    $this->assertDatabaseHas('regencies', ['province_id' => 1, 'name' => 'Kota Bandung']);
});

it('deleting via repository', function () {
    $repository = app(RegencyRepository::class);

    $province = $repository->create([
        'province_id'   =>  1,
        'name'  =>  'Kota Bandung'
    ]);

    $repository->delete($province->id);

    $this->assertDatabaseMissing('regencies', ['id', $province->id]);
});

it('soft deleting via repository', function () {
    $repository = app(RegencyRepository::class);

    $province = $repository->create([
        'province_id'   =>  1,
        'name'  =>  'Kota Bandung'
    ]);

    $repository->delete($province->id);

    $this->assertSoftDeleted('regencies', ['id' => 1]);
});
