<?php

namespace App\Controllers;

// Import the class.
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function view(string $page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);

        return view('pagetemplates/header', $data)
            . view('pages/' . $page)
            . view('pagetemplates/footer');
    }
}
