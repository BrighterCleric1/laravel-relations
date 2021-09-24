<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 7; $i++) {
            $tagObject = new Tag();
            $tagObject->name = $faker->word();
            $tagObject->save();
        }
    }
}
