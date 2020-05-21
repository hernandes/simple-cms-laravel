<?php

namespace App\Mail;

use App\Models\EmailGroup;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];
    private $group = null;

    public function __construct(EmailGroup $group, $data)
    {
        $this->group = $group;
        $this->data = $data;

        foreach ($group->recipients as $recipient) {
            $this->to($recipient->email, $recipient->name);
        }

        if (isset($data['email'])) {
            $this->replyTo($data['email']);
        }

        $this->subject($group->subject);
    }

    public function build()
    {
        return $this->markdown('mail.contact', $this->data);
    }
}
