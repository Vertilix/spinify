<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

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
        } else {
            return redirect()->route('/');
        }
    }

    public function uploadSong()
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] != 'guest') {
                $rules = [
                    'songName' => [
                        'rules' => 'trim|required|max_length[100]|min_length[1]',
                        'errors' => [
                            'required' => 'A song name is required',
                            'max_length' => 'Song name is too long',
                            'min_length' => 'Song name is too short',
                        ]
                    ],

                    'songDesc' => [
                        'rules' => 'trim|required|max_length[1000]',
                        'errors' => [
                            'required' => 'Description is required',
                            'max_length' => 'Description is too long',
                        ]
                    ],

                    'songFile' => [
                        'rules' => 'uploaded[songFile]|max_size[songFile,32000]|ext_in[songFile,mp3]',
                        'errors' => [
                            'uploaded' => 'Audio file is required',
                            'max_size' => 'Audio file is too large',
                            'ext_in' => 'Audio file must be an mp3 file',
                        ]
                    ],

                    'songPicture' => [
                        'rules' => 'uploaded[songPicture]|max_size[songPicture,16000]|ext_in[songPicture,png,jpg,jpeg]',
                        'errors' => [
                            'uploaded' => 'Image is required',
                            'max_size' => 'Image is too large',
                            'ext_in' => 'Image must be a png, jpg, or jpeg',
                        ]
                    ],
                ];

                if (!$this->validate($rules)) {
                    session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                    return redirect()->route('upload');
                }

                $audioFile = $this->request->getFile('songFile');
                $songPicture = $this->request->getFile('songPicture');

                if ($audioFile->isValid() && !$audioFile->hasMoved()) {
                    if ($songPicture->isValid() && !$songPicture->hasMoved()) {
                        $audioFileName = $audioFile->getRandomName();
                        $audioFile->move(WRITEPATH . 'uploads/audio', $audioFileName);
                        $filepath = WRITEPATH . 'uploads/audio/';

                        $validData = $this->validator->getValidated();
                        $sql       = "INSERT INTO `songs`(`id`, `userid`, `filename`, `location`, `songname`, `songpicture`, `songdescription`, `dateadded`) VALUES (null, ?, ?, ?, ?, ?, ?, ?)";
                        $this->db->query($sql, [$_SESSION['user']['id'], $audioFileName, $filepath, $validData['songName'], file_get_contents($songPicture), $validData['songDesc'], date("Y-m-d H:i:s")]);

                        session()->setFlashdata('success', "Song uploaded successfully");
                        return view('templates/navbar')
                            . view('upload');
                    }
                } 
            }
        }
        session()->setFlashdata('error', "Something went wrong, Please try again.");
        return redirect()->route('/upload');
    }
}
