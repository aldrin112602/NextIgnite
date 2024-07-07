<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // show default welcome page: app/Views/welcome.nxt.php
        $this->view('welcome');
    }
        // Add methods here
        // Quotes: "Life is not a problem to be solved, but a reality to be experienced. - Soren Kierkegaard"

}
