<?php

namespace App\middlewares;

class Authentication
{
    public function middleware(string|null $middleware = null): void
    {
        if (!$middleware) {
            return;
        }

        if ($middleware === 'guest') {
            if (isset($_SESSION['user'])) {
                redirect('/');
            }
        } elseif ($middleware === 'auth') {
            if (!isset($_SESSION['user'])) {
                redirect('/login');
            }
        }
    }
}