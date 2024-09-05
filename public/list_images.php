<?php
$category = isset($_GET['category']) ? $_GET['category'] : '';
$images_path = __DIR__ . '/static/products/';

$image_urls = [];

// Check if the category is "all"
if ($category === 'all') {
    // Get all subdirectories in the 'products' folder
    $directories = glob($images_path . '*', GLOB_ONLYDIR);
    
    // Loop through each directory and get all PNG images
    foreach ($directories as $dir) {
        $image_files = glob($dir . "/*.png");
        foreach ($image_files as $file) {
            $image_urls[] = '/static/products/' . basename($dir) . '/' . basename($file);
        }
    }
    
    // Shuffle the image URLs
    shuffle($image_urls);
} else {
    $images_path .= $category . '_images/';
    
    // Check if the directory exists
    if (!is_dir($images_path)) {
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'Directory not found']);
        exit;
    }
    
    // Get all PNG image files from the directory
    $image_files = glob($images_path . "*.png");
    
    // Prepare the URLs for the images
    foreach ($image_files as $file) {
        $image_urls[] = '/static/products/' . $category . '_images/' . basename($file);
    }
}

// Return the image URLs as JSON
header('Content-Type: application/json');
echo json_encode($image_urls);
?>
