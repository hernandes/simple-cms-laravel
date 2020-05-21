<?php
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();

        $banners = [
            [
                'phrases' => [
                    $faker->text(40),
                    $faker->text(30)
                ],
                'image' => $faker->imageUrl(1920, 400),
                'active' => true
            ], [
                'phrases' => [
                    $faker->text(40),
                    $faker->text(30)
                ],
                'url' => 'https://google.com',
                'image' => $faker->imageUrl(1920, 400),
                'active' => true
            ]
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
