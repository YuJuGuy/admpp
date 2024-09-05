<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ProductsController extends Controller
{
    public function index()
    {
        // Load the correct helper
        helper('filesystem');

        // Get the list of categories (folders) from 'static/categories'
        $categories_path = './static/categories/';
        $categories = directory_map($categories_path, 1); // 1 for first-level directories only

        // Pass the categories data to the view
        return view('pagetemplates/header')
            .view('products/index', ['categories' => $categories])
            . view('pagetemplates/footer');
    }
}
