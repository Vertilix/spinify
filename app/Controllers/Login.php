<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();

        return view('login')
        . view('templates/navbar.html');
    }
}