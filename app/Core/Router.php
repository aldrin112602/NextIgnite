<?php

namespace App\Core;

class Router
{
    protected $routes = [];

    public function add($uri, $controller)
    {
        echo 'add uri: ' . $uri . '<br>';
        $this->routes[$uri] = $controller;
    }

    public function dispatch($uri)
    {
        echo 'dispatch uri: ' . $uri . '<br>';
        var_dump($this->routes);
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri];
            $controller = new $controller;
            $controller->handle();
        } else {
            echo "404 Not Found";
        }
    }
}
