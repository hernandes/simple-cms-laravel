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
                'title' => 'Início',
                'url' => '/',
                'active' => true
            ], [
                'title' => 'Quem Somos',
                'page_id' => 2,
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
