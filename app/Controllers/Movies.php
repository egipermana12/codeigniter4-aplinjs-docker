<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Movies extends BaseController
{
    private $access_token;

    public function __construct()
    {
        $this->access_token = Services::getTokenTMDB();
    }

    public function index(): string
    {
        return view('movies/index', $data = ['access_token' => $this->access_token]);
    }
}
