<?php

namespace App;

use JetBrains\PhpStorm\NoReturn;

class Auth extends Users
{
    #[NoReturn] public function register(): void
    {
        $_SESSION['error'] = null;
        if ($this->isUserExists()) {
            $_SESSION['error'] = "This User already exists";
            header('location: /register');

        } else {
            $user = $this->create();
            $_SESSION['user'] = [
                'id' => $user->id,
                'username' => $user->username,
            ];
            header('location: /ads/create');
        }
        exit();
    }

    #[NoReturn] public function login(): void
    {
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $user = $this->getUser($phone);


        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = [
                'id' => $user->id,
                'username' => $user->username,
            ];

            header('location: /ads/create');
        } else {
            $_SESSION['error'] = "Wrong phone number or password";
            header('location: /login');
        }
        exit();
    }

    #[NoReturn] public function logout(): void
    {
        session_destroy();
        header('location: /');
        exit();
    }

    public function isUserExists(): bool
    {
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
            return (bool)$this->getUser($phone);
        }
        return false;
    }

    public function create()
    {
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (strlen($phone) == 9) {
            $this->insertUser($username, $gender, $phone, $password);
            return $this->getUser($phone);
        }
        $_SESSION['error'] = "Wrong information entered";
        header('location: /register');
        exit();
    }
}