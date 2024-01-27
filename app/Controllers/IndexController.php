<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function navSearch(): string
    {
        $searchText = $this->request->getPost('navSearchText');

        return view('templates/navbar')
        . view('index');
    }
}
