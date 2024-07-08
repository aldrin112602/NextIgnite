<?php

namespace App\Core;

class Router
{
    protected $getRoutes = [];
    protected $postRoutes = [];

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
        $this->getRoutes[$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->postRoutes[$uri] = $controller;
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
        // For GET request
        // Check if a route exists for the given URI
        if (array_key_exists($uri, $this->getRoutes)) {
            [$controller, $method] = $this->getRoutes[$uri];
            $controller = new $controller;
            $controller->{$method}();
        } else {
            echo "404 Not Found";
        }


        // For POST request
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (array_key_exists($uri, $this->postRoutes)) {
                [$controller, $method] = $this->postRoutes[$uri];
                $controller = new $controller;
                $controller->{$method}();
            } else {
                echo "404 Not Found";
            }
        }
    }
}
