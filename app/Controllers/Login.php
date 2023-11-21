<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login() {        
        $rules = [
            'username'  => 'required|max_length[50]|min_length[3]',
            'password'  => 'required|max_length[200]|min_length[6]',
        ];

        if (!$this->request->is('post') || !$this->validate($rules)) {
            return view('templates/navbar') .
            view('login/login', [
                'error' => session()->getFlashdata('error')
            ]);
        }

        $validData = $this->validator->getValidated();
        $sql       = "SELECT * FROM `users` WHERE `username` = ?";
        $query     = $this->db->query($sql, [$validData['username']]);
        $results   = $query->getRowArray();

        if(isset($results['password']) && isset($results['password'])){
            if(password_verify($validData['password'], $results['password'])){
                $this->session->set('user', $results);
                return redirect()->route('/');
            }else{
                session()->setFlashdata('error', 'Username or password is incorrect');
                return redirect()->route('login');
            }
        }else{
            session()->setFlashdata('error', 'Something went wrong please try again later.');
            return redirect()->route('login');
        }
    }
    
    public function logout() {
        $this->session->destroy();
        return redirect()->route('/');
    }

    public function register(): string {
        $rules = [
            'username'  => 'required|max_length[50]|min_length[3]',
            'email'     => 'required|max_length[200]|min_length[3]',
            'password'  => 'required|max_length[200]|min_length[6]',
        ];

        if (!$this->validate($rules) || !$this->request->is('post')) {
            return view('templates/navbar') .
            view('login/register');
        }

        $validData = $this->validator->getValidated();
        $sql       = "SELECT * FROM `users` WHERE `username` = ?";
        $query     = $this->db->query($sql, [$validData['username']]);
        $results   = $query->getRowArray();

        if(isset($results['username'])){
            if($results['username'] == $validData['username']){
                session()->setFlashdata('error', 'Username already exists');
                return view('templates/navbar') .
                view('login/register');
            }
        }

        $hashedPassword = password_hash($validData['password'], PASSWORD_DEFAULT);
        $sql            = "INSERT INTO `users`(`id`, `username`, `password`, `email`, `role`) VALUES (NULL, ?, ?, ?, 'guest')";
        $this->db->query($sql, [$validData['username'], $hashedPassword, $validData['email']]);
        return redirect()->route('/');
        return view('templates/navbar') .
        view('login/rSuccess');
    }
}