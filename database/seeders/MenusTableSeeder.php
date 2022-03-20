<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'title' => 'Sobre Nós',
                'page_id' => 2,
                'active' => true
            ], [
                'title' => 'O que fizemos',
                'page_id' => 3,
                'active' => true
            ], [
                'title' => 'Clientes',
                'page_id' => 4,
                'active' => true
            ], [
                'title' => 'Além do óbvio',
                'page_id' => 5,
                'active' => true
            ], [
                'title' => 'Notícias',
                'url' => '/noticias',
                'active' => true
            ], [
                'title' => 'Contato',
                'url' => '/contato',
                'active' => true
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
