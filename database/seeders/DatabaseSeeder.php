<?php
namespace Database\Seeders;

use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(EmailsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
