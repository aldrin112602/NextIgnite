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
            "email" => "required",
            "password" => "required"
        ]);

    }

    public function handleSignup()
    {
        $request = new Request();
        $validated = $request->validation([
            "username" => "required|min=6|max=20",
            "email" => "required",
            "password" => "required|min=6|max=20"
        ]);

        // Save to database
        // $user = new User($validated);
        // $user->save();

        
    }
}
