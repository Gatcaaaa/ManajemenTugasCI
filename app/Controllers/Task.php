<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Task extends BaseController
{
    public function index()
    {
        return view('task/index');
    }
    public function create()
    {
        return view('task/create');
    }
}