<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Download;
use Faker\Generator as Faker;

$factory->define(Download::class, function (Faker $faker) {

    return [
        'judul' => $faker->word,
        'tanggal' => $faker->word,
        'user_id' => $faker->word,
        'jam' => $faker->word,
        'keterangan' => $faker->word,
        'file_download' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
