<?php

namespace Controller;

class UserController
{
    public function showUsers(): void
    {
        $users = (new \App\Users())->getUsers();
        loadDashboard('users.php', ['users' => $users]);
    }
}