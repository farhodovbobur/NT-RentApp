<?php

namespace App;

use PDO;

class Users
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function insertUser(
        string $username,
        string $position,
        string $gender,
        int    $phone,
        string $password): bool
    {
        $query = "INSERT INTO users (username, position, gender, phone, password, created_at) 
                  VALUES (:username, :position, :gender, :phone, :password, NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }

    public function getUser(int $id)
    {
        return $this->pdo->query("SELECT * FROM users WHERE id = {$id}")->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteUsers(int $id): bool
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updateUser(
        int    $id,
        string $username,
        string $position,
        string $gender,
        int    $phone,
        string $password)
    {
        $query = "UPDATE users SET username = :username, position = :position, gender = :gender, phone = :phone, password = :password, updated_at = NOW() WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }
}