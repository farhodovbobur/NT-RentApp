<?php

namespace App;

class Router
{
    public static function get($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $path) {
            $callback();
            exit();
        }
    }

    public static function post($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $path) {
            $callback();
            exit();
        }
    }
}