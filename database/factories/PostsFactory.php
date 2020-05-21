<?php

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'image' => $faker->imageUrl(),
        'active' => $faker->boolean,
        'body' => $faker->paragraph(),
        'published_at' => $faker->dateTime
    ];
});
