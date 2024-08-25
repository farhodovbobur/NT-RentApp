<?php

declare(strict_types=1);

use App\Router;

Router::get('/', fn() => loadController('homeView.php'));
Router::get('/ads/{id}', fn(int $id) => loadController('showAd.php', ['id' => $id]));


Router::get('/login', fn() => (new \App\AuthController())->login());
Router::get('/register', fn() => (new \App\AuthController())->register());
Router::get('/logout', fn() => (new \App\AuthController())->logout());


Router::post('/login', fn() => (new \App\AuthController())->login());
Router::post('/register', fn() => (new \App\AuthController())->register());


Router::get('/ads/create', fn() => loadController('createAd.php'));
Router::get('/status/create', fn() => loadController('createStatus.php'));
Router::get('/branch/create', fn() => loadController('createBranch.php'));


Router::post('/ads/create', fn() => loadController('createAd.php'));
Router::post('/status/create', fn() => loadController('createStatus.php'));
Router::post('/branch/create', fn() => loadController('createBranch.php'));

Router::errorResponse(404, 'Not Found');