<?php

declare(strict_types=1);



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    loadView('auth/login.php');
    exit();
}


(new \App\Users())->login();
