<?php
use Illuminate\Database\Seeder;
use App\Models\EmailGroup;
use App\Models\EmailRecipient;

class EmailsTableSeeder extends Seeder
{

    public function run()
    {
        $groups = [
            [
                'key' => 'contact',
                'subject' => 'Contato',
            ]
        ];

        foreach ($groups as $group) {
            EmailGroup::create($group);
        }

        $recipients = [
            [
                'name' => 'E-mail teste',
                'email' => 'admin@admin.com.br'
            ]
        ];

        foreach ($recipients as $recipient) {
            $model = EmailRecipient::create($recipient);
            $model->groups()->sync([1]);
        }
    }
}
