<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CommentKegiatan;
use Faker\Generator as Faker;

$factory->define(CommentKegiatan::class, function (Faker $faker) {

    return [
        'kegiatan_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'komentar' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
