<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\JenisKelamin;
use Faker\Generator as Faker;

$factory->define(JenisKelamin::class, function (Faker $faker) {

    return [
        'jeniskelamin' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
