<?php

namespace App\Mail;

use App\Models\BartleResult;
use App\Models\HexadResult;
use App\Models\Group;
use App\Models\Method;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class TestResult extends Mailable
{
    use Queueable, SerializesModels;

    public Collection $results;
    public string $className;

    /**
     * Create a new message instance.
     */
    public function __construct(Collection $results, string $className)
    {
        $method = $results->first()->answer->method->name;

        if ($method === 'Hexad') {
            $this->results = HexadResult::formatTestResult($results);
        } if ($method === 'Bartle') {
            $this->results = BartleResult::formatTestResult($results);
        }
    
        $this->className = $className;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Perfil de Jogador - Resultado do Teste',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.test.result',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
