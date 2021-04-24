<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\flight;
use Faker\Generator as Faker;

$factory->define(flight::class, function (Faker $faker) {

    return [
        'movie' => $faker->word,
        'start' => $faker->word,
        'stop' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
