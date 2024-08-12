<?php

declare(strict_types=1);

\App\Router::get('/', fn() => require 'view/pages/home.php');

\App\Router::get('/login', fn() => require 'view/pages/auth/login.php');
\App\Router::get('/register', fn() => require 'view/pages/auth/register.php');
\App\Router::get('/logout', fn() => (new \App\Users())->logout());

\App\Router::post('/register', fn() => (new \App\Users())->register());
\App\Router::post('/login', fn() => (new \App\Users())->login());
