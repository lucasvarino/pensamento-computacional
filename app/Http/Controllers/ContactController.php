<?php

namespace App\Http\Controllers;

use App\Mail\SuporteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::to('projeto.perfiljogador@ufjf.br')
            ->send(new SuporteMail(
                name:        $data['name'],
                email:       $data['email'],
                mailSubject: 'Contato: ' . $data['subject'],
                messageBody: $data['message'],
            ));

        return redirect('/');
    }
}
