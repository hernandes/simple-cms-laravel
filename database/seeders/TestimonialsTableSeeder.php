<?php
namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $testimonials = [
            [
                'image' => $faker->imageUrl(100, 100),
                'name' => $faker->name,
                'company' => $faker->company,
                'body' => $faker->paragraph
            ], [
                'image' => $faker->imageUrl(100, 100),
                'name' => $faker->name,
                'company' => $faker->company,
                'body' => $faker->paragraph
            ],[
                'image' => $faker->imageUrl(100, 100),
                'name' => $faker->name,
                'company' => $faker->company,
                'body' => $faker->paragraph
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
