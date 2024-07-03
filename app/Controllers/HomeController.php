<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    
    public function index()
    {
        return $this->view('home/index');
    }
}
