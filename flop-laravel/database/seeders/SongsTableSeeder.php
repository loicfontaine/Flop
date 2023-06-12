<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;

class SongsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();

        // Générer des données aléatoires pour remplir la table "songs"
        for ($i = 0; $i < 100; $i++) {
            DB::table('songs')->insert([
                'name' => $faker->word,
                'artist' => $faker->name,
                'duration' => $faker->time('i:s'),
                'played_times' => $faker->numberBetween(0, 100),
            ]);
        }
    }
}
