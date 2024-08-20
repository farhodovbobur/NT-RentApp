<?php

declare(strict_types=1);

use App\Router;

Router::get('/', fn() => loadController('homeView.php'));
Router::get('/ads/{id}', fn(int $id) => loadController('showAd.php', ['id' => $id]));

Router::get('/ads/create', fn() => loadView('dashboard/createAd.php'));

Router::get('/login', fn() => loadView('auth/login.php'));
Router::get('/register', fn() => loadView('auth/register.php'));

Router::get('/logout', fn() => loadController('logoutUser.php'));
Router::post('/login', fn() => loadController('loginUser.php'));
Router::post('/register', fn() => loadController('registerUser.php'));

