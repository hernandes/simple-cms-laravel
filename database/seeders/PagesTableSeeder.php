<?php
namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();

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
                'key' => 'what_we_do',
                'title' => 'O que fazemos?',
                'body' => $faker->text,
                'active' => true,
                'featured' => true
            ], [
                'key' => 'customers',
                'title' => 'Clientes',
                'body' => $faker->text,
                'active' => true,
                'featured' => true
            ], [
                'key' => 'beyond',
                'title' => 'Além do óbvio',
                'body' => $faker->text,
                'active' => true,
                'featured' => true
            ], [
                'key' => 'contact',
                'title' => 'Contato',
                'body' => '...',
                'active' => true,
                'featured' => false
            ], [
                'key' => 'posts',
                'title' => 'Notícias',
                'body' => '',
                'active' => true,
                'featured' => false
            ], [
                'key' => 'info',
                'title' => 'Informações',
                'body' => '',
                'active' => true,
                'featured' => true,
                'blocks' => [
                    [
                        'key' => 'integracoes',
                        'title' => 'integrações',
                        'subtitle' => '100'
                    ], [
                        'key' => 'nfe',
                        'title' => 'integrações',
                        'subtitle' => '100'
                    ], [
                        'key' => 'clientes',
                        'title' => 'integrações',
                        'subtitle' => '100'
                    ], [
                        'key' => 'boletos',
                        'title' => 'integrações',
                        'subtitle' => '100'
                    ]
                ]
            ], [
                'key' => 'business',
                'title' => 'Soluções para seu negócio',
                'body' => '...',
                'active' => true,
                'featured' => true
            ], [
                'key' => 'business_varejo',
                'title' => 'Varejo',
                'body' => '...',
                'active' => true,
                'featured' => true,
                'medias' => [
                    [
                        'key' => 'icon',
                        'file' => $faker->imageUrl(80, 80)
                    ]
                ]
            ], [
                'key' => 'business_comercio',
                'title' => 'Comercio',
                'body' => '...',
                'active' => true,
                'featured' => true,
                'medias' => [
                    [
                        'key' => 'icon',
                        'file' => $faker->imageUrl(80, 80)
                    ]
                ]
            ], [
                'key' => 'business_autopecas',
                'title' => 'Auto peças',
                'body' => '...',
                'active' => true,
                'featured' => true,
                'medias' => [
                    [
                        'key' => 'icon',
                        'file' => $faker->imageUrl(80, 80)
                    ]
                ]
            ], [
                'key' => 'business_outro',
                'title' => 'Outros',
                'body' => '...',
                'active' => true,
                'featured' => true,
                'medias' => [
                    [
                        'key' => 'icon',
                        'file' => $faker->imageUrl(80, 80)
                    ]
                ]
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
