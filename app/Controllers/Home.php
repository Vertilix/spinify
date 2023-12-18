<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('templates/navbar')
        . view('index');
    }

    public function navSearch(): string
    {
        return view('templates/navbar')
        . view('index');
    }
}
