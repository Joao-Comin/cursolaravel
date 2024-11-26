<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            // Se o usuário não estiver autenticado, redireciona para a página de login
            return redirect(route('login.form'));
        }

        // Obtém o e-mail do usuário autenticado
        $email = auth()->user()->email;
        // Divide o e-mail em duas partes: local e domínio
        $data = explode('@', $email);
        $servidorEmail = $data[1]; // A parte após o '@'

        // Verifica se o domínio do e-mail não é 'gmail.com'
        if ($servidorEmail != 'gmail.com') {
            // Se o domínio não for 'gmail.com', redireciona para a página de login
            return redirect(route('login.form'));
        }

        // Caso contrário, o middleware permite que a requisição continue normalmente
        return $next($request);
    }
}

