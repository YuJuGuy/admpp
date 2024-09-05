<?php namespace App\Controllers;

use CodeIgniter\Controller;

class ImagesController extends Controller
{
    public function getCategoryImages($category)
    {
        // Define the path to the category images folder
        $images_path = FCPATH . 'static/' . $category . '_images/';
        
        // Check if the directory exists
        if (!is_dir($images_path)) {
            return $this->response->setStatusCode(404)->setBody('Directory not found');
        }
        
        // Get all PNG image files from the directory
        $image_files = glob($images_path . "*.png");
        
        // Prepare the URLs for the images
        $image_urls = [];
        foreach ($image_files as $file) {
            $image_urls[] = base_url('static/' . $category . '_images/' . basename($file));
        }
        
        // Return the image URLs as JSON
        return $this->response->setJSON($image_urls);
    }
}
