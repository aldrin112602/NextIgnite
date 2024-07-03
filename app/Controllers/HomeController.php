<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Mailer;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }

    public function sendEmail()
    {
        $mailer = new Mailer();
        $mailer->sendMail(
            'caballeroaldrin02@gmail.com',
            'Test Email',
            '<p>This is a test email</p>',
            'This is a test email'
        );

        $this->view('home/index');
    }
}
