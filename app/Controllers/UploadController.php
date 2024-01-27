<?php

namespace App\Controllers;

class UploadController extends BaseController
{
    public function index()
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == 'guest') {
                return redirect()->route('/');
            }
            return view('templates/navbar')
                . view('upload');
        }else{
            return redirect()->route('/');
        }

    
    }

    public function uploadSong()
    {
        $files = $this->request->getFiles();
        var_dump($files);

        // if (isset($_SESSION['user'])) {
        //     if ($_SESSION['user']['role'] == 'guest') {
        //         return redirect()->route('/');
        //     }
        //     return view('templates/navbar')
        //         . view('upload');
        // }else{
        //     return redirect()->route('/');
        // }

        // $rules = [
        //     'songName'  => 'required|max_length[100]|min_length[1]',
        //     'songFile'  => 'uploaded[songFile]|max_size[songFile,10240]|ext_in[songFile,mp3,wav,ogg]',
        //     'songDesc'  => 'trim|required|max_length[100]|',
        // ];

        // // if (!$this->validate($rules)) {
        // //     return view('templates/navbar') .
        // //         view('/upload', [
        // //             'error' => session()->getFlashdata('error')
        // //         ]);
        // // } 

        // $file = $this->request->getFile('songFile');
        // print_r($file);

        // if ($file->isValid() && !$file->hasMoved()) {
        //     echo "test";
        // }

    }
}
