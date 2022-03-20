<?php
namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 3; $i++) {
            Post::create([
                'title' => $faker->sentence(10),
                'image' => $faker->imageUrl(),
                'active' => $faker->boolean,
                'body' => $faker->paragraph(),
                'published_at' => $faker->dateTime
            ]);
        }
    }
}
