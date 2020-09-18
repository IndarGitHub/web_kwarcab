<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\comment;
use Faker\Generator as Faker;

$factory->define(comment::class, function (Faker $faker) {

    return [
        'berita_id' => $faker->randomDigitNotNull,
        'komentar' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
