<?php

use App\Article;
use App\Author;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


        $authorList = [
            'Pippo Baudo',
            'Concas',
            'Re Monzide',
            'Gerry Scotti',
            'Paperino'
        ];

        $listOfAuthorID = [];

        foreach ($authorList as $author) {
            $authorObject = new Author();
            $authorObject->name = $author;
            $authorObject->email = $faker->email();
            $authorObject->born = $faker->date();
            $authorObject->save();
            $listOfAuthorID[] = $authorObject->id;
        }




        for ($x = 0; $x < 50; $x++) {
            $articleObject = new Article();
            $articleObject->title = $faker->sentence(4);
            $articleObject->subtitle = $faker->sentence(7);
            $articleObject->published_at = $faker->dateTime();
            $articleObject->content = $faker->paragraphs(5, true);
            $articleObject->image = $faker->imageUrl(640, 480, 'animals', true);
            $randAuthorKey = array_rand($listOfAuthorID, 1);
            $categoryID = $listOfAuthorID[$randAuthorKey];
            $articleObject->author_id = $categoryID;
            $articleObject->save();
        }
    }
}
