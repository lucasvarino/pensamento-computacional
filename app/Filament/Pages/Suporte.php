<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class Suporte extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $title = 'Suporte';
    protected static ?string $navigationGroup = 'Ajuda e Suporte';
    protected static string $view = 'filament.pages.suporte';

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified();
    }

    public $name, $email, $subject, $message;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Nome')
                ->placeholder('Digite seu nome aqui')
                ->required(),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->placeholder('Digite seu email aqui'),
            Forms\Components\TextInput::make('subject')
                ->label('Assunto')
                ->required()
                ->placeholder('Digite o assunto aqui'),
            Forms\Components\Textarea::make('message')
                ->label('Mensagem')
                ->required()
                ->rows(5)
                ->placeholder('Digite sua mensagem aqui'),
        ];
    }

    public function submit()
    {
        Mail::to('projeto.perfiljogador@ufjf.br')->send(new \App\Mail\SuporteMail(
            name: $this->name,
            email: $this->email,
            mailSubject: $this->subject,
            messageBody: $this->message
        ));

        Notification::make()
            ->title('Mensagem enviada com sucesso!')
            ->success()
            ->send();

        $this->form->fill();
    }
}