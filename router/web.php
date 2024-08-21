<?php

declare(strict_types=1);

use App\Router;

Router::get('/', fn() => loadController('homeView.php'));
Router::get('/ads/{id}', fn(int $id) => loadController('showAd.php', ['id' => $id]));


Router::get('/login', fn() => loadController('loginUser.php'));
Router::get('/register', fn() => loadController('registerUser.php'));
Router::get('/logout', fn() => loadController('logoutUser.php'));


Router::post('/login', fn() => loadController('loginUser.php'));
Router::post('/register', fn() => loadController('registerUser.php'));


Router::get('/ads/create', fn() => loadController('createAd.php'));
Router::get('/status/create', fn() => loadController('createStatus.php'));
Router::get('/branch/create', fn() => loadController('createBranch.php'));


Router::post('/ads/create', fn() => loadController('createAd.php'));
Router::post('/status/create', fn() => loadController('createStatus.php'));
Router::post('/branch/create', fn() => loadController('createBranch.php'));
