<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\SuporteMail;

class SendEmailTest extends TestCase
{
    public function test_suporte_mail_is_dispatched()
    {
        Mail::fake();
        $name = 'Teste';
        $subject = 'Assunto de Teste';
        $body = 'Corpo da mensagem de teste.';

        $mailable = new SuporteMail($name, 'sender@example.com', $subject, $body);

        Mail::to('recipient@example.com')->send($mailable);

        Mail::assertSent(SuporteMail::class);
    }
}
