<?php

use Snairbef\Regional\Models\Province;

// it('can test', function () {
//     expect(true)->toBeTrue();
// });

it('get province records', function () {
    Province::factory()->create();

    $province = Province::all();

    expect($province->count())->toBe(1);
});
