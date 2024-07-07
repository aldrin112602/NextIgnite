<?php

namespace App\Core;

class Router
{
    protected $routes = [];

    /**
     * Adds a new route to the router.
     *
     * @param string $uri The URI to match for this route.
     * @param string $controller The fully qualified class name of the controller to handle this route.
     *
     * @return void
     */
    public function get($uri, $controller)
    {
        $this->routes[$uri] = $controller;
    }

    /**
     * Dispatches the request to the appropriate controller based on the given URI.
     *
     * @param string $uri The URI to match for a route.
     *
     * @return void
     */
    public function dispatch($uri)
    {
        // Check if a route exists for the given URI
        if (array_key_exists($uri, $this->routes)) {
            [$controller, $method] = $this->routes[$uri];
            $controller = new $controller;
            $controller->{$method}();
        } else {
            echo "404 Not Found";
        }
    }
}
