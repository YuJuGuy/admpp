<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Blogs; // Add this line
use App\Controllers\Contact; // Add this line
use App\Controllers\FAQ; // Add this line


/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('faq', [FAQ::class, 'index']);   
$routes->get('blogs', [Blogs::class, 'index']);           // Add this line
$routes->get('blogs/(:segment)', [Blogs::class, 'show']); // Add this line
$routes->get('contact', [Contact::class, 'index']);

$routes->post('contact/submit', [Contact::class, 'submit']);
