<?php

use Snairbef\Regional\Contracts\Repositories\ProvinceRepository;

it('inserting via repository', function () {
    $repository = app(ProvinceRepository::class);

    $repository->create(['name' => 'Jawa Tengah']);

    $this->assertDatabaseHas('provinces', ['name' => 'Jawa Tengah']);
});

it('updating via repository', function () {
    $repository = app(ProvinceRepository::class);

    $province = $repository->create(['name' => 'Jawa Tengah']);

    $repository->update($province->id, ['name' => 'Jawa Timur']);

    $this->assertDatabaseHas('provinces', ['name' => 'Jawa Timur']);
});

it('deleting via repository', function () {
    $repository = app(ProvinceRepository::class);

    $province = $repository->create(['name' => 'Jawa Tengah']);

    $repository->delete($province->id);

    $this->assertDatabaseMissing('provinces', ['id', $province->id]);
});

it('soft deleting via repository', function () {
    $repository = app(ProvinceRepository::class);

    $province = $repository->create(['name' => 'Jawa Tengah']);

    $repository->delete($province->id);

    $this->assertSoftDeleted('provinces', ['id' => 1]);
});
