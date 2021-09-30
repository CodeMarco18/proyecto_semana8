<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Citas_detalle;
use Faker\Generator as Faker;

$factory->define(Citas_detalle::class, function (Faker $faker) {

    return [
        'id_cita' => $faker->randomDigitNotNull
    ];
});
