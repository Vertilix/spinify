<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function loginIndex() {
        return view('login/login');
    }

    public function login() {        
        $rules = [
            'username'  => 'trim|required|max_length[50]|min_length[3]',
            'password'  => 'trim|required|max_length[200]|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Username or password is incorrect.');
            return redirect()->route('login');
        }

        $validData = $this->validator->getValidated();
        $sql       = "SELECT * FROM `users` WHERE `username` = ?";
        $query     = $this->db->query($sql, [$validData['username']]);
        $results   = $query->getRowArray();

        if(isset($results['password'])){
            if(password_verify($validData['password'], $results['password'])){
                $this->session->set('user', $results);
                return redirect()->route('/');
            }else{
                session()->setFlashdata('error', 'Username or password is incorrect');
                return redirect()->route('login');
            }
        }else{
            session()->setFlashdata('error', 'Username or password is incorrect');
            return redirect()->route('login');
        }
    }
    
    public function logout() {
        $this->session->destroy();
        return redirect()->route('/');
    }

    public function registerIndex() {
        return view('login/register');
    }

    public function register() {
        $rules = [
            'username'  => 'trim|required|max_length[50]|min_length[3]',
            'email'     => 'trim|validateEmail|required|max_length[200]|min_length[5]',
            'password'  => 'trim|required|max_length[200]|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Username or password is incorrect.');
            return redirect()->route('register');
        }

        $validData = $this->validator->getValidated();
        $sql       = "SELECT * FROM `users` WHERE `username` = ?";
        $query     = $this->db->query($sql, [$validData['username']]);
        $results   = $query->getRowArray();

        if(isset($results['username'])){
            if($results['username'] == $validData['username']){
                session()->setFlashdata('error', 'Username already exists');
                return view('login/register');
            }
        }

        $hashedPassword = password_hash($validData['password'], PASSWORD_DEFAULT);
        $sql            = "INSERT INTO `users`(`id`, `username`, `password`, `email`, `role`) VALUES (NULL, ?, ?, ?, 'guest')";
        $this->db->query($sql, [$validData['username'], $hashedPassword, $validData['email']]);
        return redirect()->route('login');
    }
}