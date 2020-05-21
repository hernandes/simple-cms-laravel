<?php
use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();

        $pages = [
            [
                'key' => 'home',
                'title' => 'Página inicial',
                'active' => true,
                'body' => null,
                'featured' => false
            ], [
                'key' => 'about',
                'title' => 'Quem somos?',
                'body' => $faker->text,
                'active' => true,
                'featured' => false
            ], [
                'key' => 'contact',
                'title' => 'Contato',
                'body' => '...',
                'active' => true,
                'featured' => false
            ], [
                'key' => 'posts',
                'title' => 'Blog',
                'body' => '...',
                'active' => true,
                'featured' => false
            ]
        ];

        foreach ($pages as $page) {
            $p = Page::create([
                'key' => $page['key'],
                'title' => $page['title'],
                'body' => $page['body'],
                'active' => $page['active'],
                'featured' => $page['featured']
            ]);

            if (isset($page['blocks'])) {
                foreach ($page['blocks'] as $block) {
                    $p->blocks()->create($block);
                }
            }

            if (isset($page['medias'])) {
                foreach ($page['medias'] as $media) {
                    $p->medias()->create($media);
                }
            }
        }
    }
}
