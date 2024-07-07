<?php

namespace App\Core;

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        $viewPath = __DIR__ . "/../../app/Views/{$view}.nxt.php";

        // Check if the view file exists and require it
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            throw new \Exception("View file not found: {$viewPath}");
        }
    }
}
