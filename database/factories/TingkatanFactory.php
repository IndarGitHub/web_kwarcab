<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tingkatan;
use Faker\Generator as Faker;

$factory->define(Tingkatan::class, function (Faker $faker) {

    return [
        'tingkatan' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
