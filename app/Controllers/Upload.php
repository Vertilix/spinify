<?php

namespace App\Controllers;

class Upload extends BaseController
{
    public function index(): string
    {   
        return view('templates/navbar')
        . view('upload');
    }

    public function uploadSong(): string
    {
        $rules = [
            'songName'  => 'required|max_length[100]|min_length[1]',
            'artistName'  => 'required|max_length[100]|min_length[1]',
        ];

        if ($this->request->is('post') || !$this->validate($rules)) {
            return view('templates/navbar') .
            view('/', [
                'error' => session()->getFlashdata('error')
            ]);
        }
    }
}
