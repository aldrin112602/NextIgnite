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
    public function add($uri, $controller)
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
            // Get the fully qualified class name of the controller for the route
            $controller = $this->routes[$uri];

            // Instantiate the controller class
            $controller = new $controller;

            // Call the handle method on the controller to handle the request
            $controller->handle();
        } else {
            // If no route exists for the given URI, display a 404 Not Found message
            echo "404 Not Found";
        }
    }
}
