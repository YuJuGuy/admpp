<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Blogs; // Add this line
use App\Controllers\Contact; // Add this line
use App\Controllers\FAQ; // Add this line
use App\Controllers\Home;
use App\Controllers\Quote; // Add this line
use App\Controllers\Pages;
use App\Controllers\ProductsController; // Add this line

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('faq', [FAQ::class, 'index']);   
$routes->get('blogs', [Blogs::class, 'index']);    
$routes->get('quote', [Quote::class, 'index']);
$routes->get('products', [ProductsController::class, 'index']); // Add this line
$routes->get('blogs/(:segment)', [Blogs::class, 'show']); // Add this line
$routes->get('contact', [Contact::class, 'index']);



$routes->post('quote/submit', [Quote::class, 'submit']);
$routes->post('contact/submit', [Contact::class, 'submit']);
$routes->get('(:segment)', 'Pages::view/$1');
