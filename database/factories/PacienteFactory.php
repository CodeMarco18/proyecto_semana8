<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {

    return [
        'ape_nom' => $faker->word,
        'dni' => $faker->word,
        'celular' => $faker->word
    ];
});
