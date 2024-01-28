<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function index(): string
    {
        $sql       = "SELECT * FROM `songs`";
        $query     = $this->db->query($sql);
        $results   = $query->getRowArray();

        if(count($results) > 0){
            $data = ['songsArray' => $query->getResult()];
        }
        
        return view('index', $data);
    }

    public function navSearch(): string
    {
        $searchText = $this->request->getPost('navSearchText');

        return view('templates/navbar')
        . view('index');
    }
}
