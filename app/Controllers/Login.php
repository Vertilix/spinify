<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login(): string {        
        $rules = [
            'username'     => 'required|max_length[50]|min_length[3]',
            'password'  => 'required|max_length[200]|min_length[6   ]',
        ];

        if (!$this->request->is('post') || !$this->validate($rules)) {
            return view('templates/navbar.html') .
            view('login/login');
        }

        $validData = $this->validator->getValidated();
        $sql       = "SELECT * FROM `users` WHERE `username` = ?";
        $query     = $this->db->query($sql, [$validData['username']]);
        $results   = $query->getRowArray();

        if(password_verify($validData['password'], $results['password'])){
            $this->session->set('user', $results);
            return view('login/lSuccess', $results);
        }else{
            session()->setFlashdata('error', 'Username or password is incorrect');
            return view('login/login');
        }
    }
    
    public function register(): string{
        $rules = [
            'username'  => 'required|max_length[50]|min_length[3]',
            'email'     => 'required|max_length[200]|min_length[3]',
            'password'  => 'required|max_length[200]|min_length[6]',
        ];

        if (!$this->validate($rules) || !$this->request->is('post')) {
            return view('templates/navbar.html') .
            view('login/register');
        }

        $validData      = $this->validator->getValidated();
        $hashedPassword = password_hash($validData['password'], PASSWORD_DEFAULT);
        $sql            = "INSERT INTO `users`(`id`, `username`, `password`, `email`, `role`) VALUES (NULL, ?, ?, ?, 'guest')";
        $this->db->query($sql, [$validData['username'], $hashedPassword, $validData['email']]);

        return view('login/rSuccess');
    }
}