<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{

    public function run()
    {
        Client::create([
            'name' => 'Test',
            'email' => 'test@test.com.br',
            'password' => '123456',
            'active' => true
        ]);
    }
}
