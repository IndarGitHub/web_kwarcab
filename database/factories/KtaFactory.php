<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Kta;
use Faker\Generator as Faker;

$factory->define(Kta::class, function (Faker $faker) {

    return [
        'nomor' => $faker->word,
        'name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
