<?php

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\Pager\Pager;

class Blogs extends BaseController
{
    public function index()
    {
        $model = model(BlogModel::class);

        // Get the current page number from the query string or set it to 1
        $page = $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1;

        // Define the number of blogs per page
        $perPage = 6;

        // Get the blogs for the current page
        $data['blogs_list'] = $model->paginate($perPage, 'default', $page);
        
        // Pass the pager object to the view
        $data['pager'] = $model->pager;

        $data['title'] = 'blogs archive';

        return view('templates/header', $data)
            . view('blogs/index')
            . view('templates/footer');
    }

    public function show(?string $id = null)
    {
        $model = model(BlogModel::class);

        $data['blogs'] = $model->getBlogs($id);

        if ($data['blogs'] === null) {
            throw new PageNotFoundException('Cannot find the blogs item: ' . $id);
        }

        $data['title'] = $data['blogs']['title'];

        return view('templates/header', $data)
            . view('blogs/view')
            . view('templates/footer');
    }
}
