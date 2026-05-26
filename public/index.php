<?php 

use Advan\BooksWeb\Controller\HomeController;
use Advan\BooksWeb\Core\Controller;
use Advan\BooksWeb\Core\Router;
use Advan\BooksWeb\Controller\AuthController;
use Advan\BooksWeb\Controller\BookController;

require_once __DIR__ . '/../vendor/autoload.php';


Router::get('/', HomeController::class, 'index');
Router::get('/home', HomeController::class, 'index');


Router::get('/admin/login', AuthController::class, 'login');
Router::post('/admin/login', AuthController::class, 'processLogin');
Router::get('/admin/logout', AuthController::class, 'logout');

Router::get('/admin/dashboard', BookController::class, 'dashboard');
Router::get('/admin/books', BookController::class, 'books');
Router::get('/admin/books/create', BookController::class, 'create');
Router::post('/admin/books/store', BookController::class, 'store');
Router::get('/admin/books/edit/{id}', BookController::class, 'edit');
Router::post('/admin/books/update/{id}', BookController::class, 'update');
Router::post('/admin/books/delete/{id}', BookController::class, 'destroy');