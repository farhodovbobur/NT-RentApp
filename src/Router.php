<?php

namespace App;

class Router
{
    public function getResourceId(): false|int
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = explode('/', $uri);
        $resourceId = end($path);

        return is_numeric($resourceId) ? (int)$resourceId : false;
    }

    public static function post($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $path) {
            $callback();
            exit();
        }
    }

    public static function get($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $resourceId = (new self())->getResourceId();
            if ($resourceId) {
                $path = str_replace('{id}', (string)$resourceId, $path);
                if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                    $callback($resourceId);
                    exit();
                }
            }

            if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                $callback();
                exit();
            }
        }
    }

    public function errorResponse()
    {

    }
}