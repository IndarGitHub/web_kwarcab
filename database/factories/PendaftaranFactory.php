<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pendaftaran;
use Faker\Generator as Faker;

$factory->define(Pendaftaran::class, function (Faker $faker) {

    return [
        'kta_id' => $faker->word,
        'user_id' => $faker->word,
        'no_tlp' => $faker->word,
        'nama_gudep' => $faker->word,
        'tempat_lahir' => $faker->word,
        'tanggal_lahir' => $faker->word,
        'jenis_kelamin_id' => $faker->word,
        'tingkatan_id' => $faker->word,
        'bukti_pembayaran' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
