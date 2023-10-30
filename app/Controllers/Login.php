<?php

namespace App\Controllers;

class Login extends BaseController
{
    
    public function login(): string {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        
        $rules = [
            'username'     => 'required|max_length[200]|min_length[3]',
            'password'  => 'required|max_length[200]|min_length[6   ]',
        ];

        if (!$this->request->is('post') || !$this->validate($rules)) {
            return view('templates/navbar.html') .
            view('login/login');
        }

        $validData = $this->validator->getValidated();
        $sql       = "SELECT * FROM `users` WHERE `username` = ? AND `password` = ?";
        $query     = $db->query($sql, [$validData['username'], $validData['password']]);

        if($query->getNumRows() == 0) {
            return view('templates/navbar.html') .
            view('login/login');
            session()->setFlashdata('error', 'Username or password is incorrect');
        }else{
            $session->set('username', $row['username']);
            $session->set('email', $validData['username']);
            return view('login/lSuccess', $query->getResult());
        }

    }
    
    public function register(){
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        
        if (!$this->request->is('post')) {
            return view('templates/navbar.html') .
            view('login/register');
        }

        $rules = [
            'username'  => 'required|max_length[50]|min_length[3]',
            'email'     => 'required|max_length[200]|min_length[3]',
            'password'  => 'required|max_length[200]|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return view('templates/navbar.html') .
            view('login/register');
        }

        $validData = $this->validator->getValidated();
        $sql = "INSERT INTO `users`(`id`, `username`, `password`, `email`, `role`) VALUES (NULL, ?, ?, ?, 'guest')";
        $db->query($sql, [$validData['username'], $validData['password'], $validData['email']]);

        return view('login/rSuccess');
    }

}