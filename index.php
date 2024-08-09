<?php

declare(strict_types=1);


require __DIR__ . '/vendor/autoload.php';
require 'bootstrap.php';


//require_once 'view/pages/login.php';

$user = new \App\Users();

//$user->insertUser('Bobur', 'student', 'male', 951880800, '1234');
//$user->insertUser('Mansur', 'student', 'male', 2, '1234');

//$user->deleteUsers(6);

$user->updateUser(7, 'Farhodov', 'student', 'male', 2, '1234');

//var_dump($user->getUser(1));