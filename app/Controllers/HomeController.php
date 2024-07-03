<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function handle()
    {
        $this->index();
    }

    public function index()
    {
        $this->view('home/index');
    }
}
