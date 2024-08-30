<?php

declare(strict_types=1);

use App\Router;

Router::get('/', fn() => loadController('homeView.php'));
Router::get('/ads/{id}', fn(int $id) => (new \Controller\AdsController())->show($id));


Router::get('/login', fn() => (new \Controller\AuthController())->login(), 'guest');
Router::get('/register', fn() => (new \Controller\AuthController())->register(), 'guest');
Router::get('/logout', fn() => (new \Controller\AuthController())->logout(), 'auth');


Router::post('/login', fn() => (new \Controller\AuthController())->login());
Router::post('/register', fn() => (new \Controller\AuthController())->register());


Router::get('/ads/create', fn() => (new \Controller\AdsController())->create(), 'auth');
Router::get('/status/create', fn() => loadController('createStatus.php'), 'auth');
Router::get('/branch/create', fn() => loadController('createBranch.php'), 'auth');


Router::post('/ads/create', fn() => (new \Controller\AdsController())->create());
Router::post('/status/create', fn() => loadController('createStatus.php'));
Router::post('/branch/create', fn() => loadController('createBranch.php'));

Router::get('/profile', fn() => loadController('profileView.php'), 'auth');

Router::errorResponse(404, 'Not Found');