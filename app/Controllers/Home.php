<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pagetemplates/header')
        .view('home/index')
        . view('pagetemplates/footer');
    }
}
