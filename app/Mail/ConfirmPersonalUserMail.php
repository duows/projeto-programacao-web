<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Address;
use Illuminate\Queue\SerializesModels;

class ConfirmPersonalUserMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public function __construct(public readonly array $data)
    {
    }

    public function build()
    {
        return $this->view('mails.confirm_user')
                    ->subject($this->data['subject'])
                    ->from('gerencia@projetos.com', 'Gerência');
    }
}
