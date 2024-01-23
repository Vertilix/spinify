<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function uploadSong(): string
    {
        $rules = [
            'songName'  => 'required|max_length[100]|min_length[1]',
            'artistName'  => 'required|max_length[100]|min_length[1]',
        ];

        if (!$this->request->is('post') || !$this->validate($rules)) {
            return view('templates/navbar') .
            view('/', [
                'error' => session()->getFlashdata('error')
            ]);
        }
        
        return view('templates/navbar')
        . view('index');
    }
}
