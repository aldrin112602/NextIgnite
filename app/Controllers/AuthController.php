<?php

namespace App\Controllers;

use App\Core\Controller;

class AuthController extends Controller
{
    public function handle()
    {
        $this->login();
    }

    public function login()
    {
        $this->view('auth/login');
    }
}
