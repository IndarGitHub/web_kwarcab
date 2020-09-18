<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Berita;
use Faker\Generator as Faker;

$factory->define(Berita::class, function (Faker $faker) {

    return [
        'category_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->word,
        'judul' => $faker->word,
        'picture' => $faker->word,
        'isi' => $faker->word,
        'comment_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
