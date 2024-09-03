<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        $data = [
            'title' => 'Dashboard',
            'user'  => session()->get('isLoggedIn')
        ];
        return view('dashboard/index', $data);
    }
}