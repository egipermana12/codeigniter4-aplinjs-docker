<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('dashboard');
    }

    public function testDB(): string
    {
        $db = \Config\Database::connect();

        // Test database connection
        if ($db->connect()) {
            return "Database connection successful!";
        } else {
            return "Unable to connect to the database.";
        }
    }

    public function testLayout():string {
        return view('clients/clients');
    }
}
