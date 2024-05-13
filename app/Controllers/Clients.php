<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Clients extends BaseController
{
    public function index()
    {
        return view('posts');
    }

    public function fetch()
    {
        // Ambil data post dari model atau dari sumber lain
        $posts = [
            ['id' => 1, 'title' => 'Post 1'],
            ['id' => 2, 'title' => 'Post 2'],
            ['id' => 3, 'title' => 'Post 3']
        ];

        // Return data dalam format JSON
        return $this->response->setJSON($posts);
    }
}
