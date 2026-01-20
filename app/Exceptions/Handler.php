<?php

namespace App\Exceptions;

use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (TokenMismatchException $e, $request) {
    // Invalida sessão e gera novo token (opcional, mas recomendado)
    if ($request->hasSession()) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    $redirectUrl = url('/');

    // AJAX / JSON -> retorna instrução para redirecionamento
    if ($request->expectsJson() || $request->ajax()) {
        return response()->json([
            'message'  => 'Sua sessão expirou. Redirecionando...',
            'redirect' => $redirectUrl,
        ], 419);
    }

    // Requisição web normal -> redireciona para "/"
    return redirect($redirectUrl)
        ->with('message', 'Sua sessão expirou. Faça login novamente.');
    });
    }
}
