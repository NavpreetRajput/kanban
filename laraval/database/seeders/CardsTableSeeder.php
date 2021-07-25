<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Let's truncate our existing records to start from scratch.
        Card::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few cards in our database:
        for ($i = 0; $i < 5; $i++) {
            Card::create([
                'title' => $faker->word,
                'description' => $faker->paragraph,
                'card_id'=>3
            ]);
        }
    }
}
