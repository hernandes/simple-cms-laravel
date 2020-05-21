<?php
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key' => 'phone',
                'type' => 'text',
                'value' => '(51) 9999-9999'
            ], [
                'key' => 'whatsapp',
                'type' => 'text',
                'value' => '(51) 9999-9999'
            ], [
                'key' => 'email',
                'type' => 'text',
                'value' => 'test@test.com.br'
            ], [
                'key' => 'address',
                'type' => 'textarea',
                'value' => 'Av. xxxx'
            ], [
                'key' => 'facebook',
                'type' => 'text',
                'value' => '(51) 9999-9999'
            ], [
                'key' => 'instagram',
                'type' => 'text',
                'value' => '(51) 9999-9999'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
