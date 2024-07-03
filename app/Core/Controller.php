<?php

namespace App\Core;

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        require "../app/Views/{$view}.php";
    }
}
