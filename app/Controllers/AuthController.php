<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Http\Request;

class AuthController extends Controller
{
    public function signup()
    {
        $this->view('auth/signup');
    }

    public function login()
    {
        $this->view('auth/login');
    }

    public function handleLogin()
    {
        $request = new Request();
        $validated = $request->validation([
            "email" => "required|unique",
            "password" => "required|min=6,max=20"
        ]);

        var_dump($validated);
    }

}
