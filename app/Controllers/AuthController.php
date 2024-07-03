<?php

namespace App\Controllers;

use App\Core\Controller;

class AuthController extends Controller
{
    
    public function login()
    {
        return $this->view('auth/login');
    }
}
