<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\kegiatan;
use Faker\Generator as Faker;

$factory->define(kegiatan::class, function (Faker $faker) {

    return [
        'category_id' => $faker->word,
        'user_id' => $faker->word,
        'judul_kegiatan' => $faker->word,
        'isi_kegiatan' => $faker->text,
        'picture' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
