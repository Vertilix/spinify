<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function index(): string
    {
        $sql       =
            "SELECT S.*, U.username
            FROM users U
            INNER JOIN songs S on (S.userid = U.id)
            LIMIT 5";

        $query     = $this->db->query($sql);
        $results   = $query->getRowArray();

        if (!empty($results)) {
            $data = ['songsArray' => $query->getResult()];
        }

        return view('index', $data);
    }

    public function navSearch(): string
    {
        $searchText = $this->request->getPost('navSearchText');
        $sql       =
            "SELECT S.*, U.username
            FROM users U
            INNER JOIN songs S on (S.userid = U.id)
            WHERE s.songname LIKE ?
            LIMIT 5";

        $query     = $this->db->query($sql, [$searchText . '%']);
        $results   = $query->getRowArray();

        if (!empty($results)) {
            $data = ['songsArray' => $query->getResult()];
        }else{
            $data = ['noResults' => 'No results found'];
        }

        return view('index', $data);
    }

    public function library(): string
    {
        return view('library');
    }

    public function addPlaylist(): string
    {
        return view('library/form');
    }
}
