<?php 


use Advan\BooksWeb\Controller\HomeController;
use Advan\BooksWeb\Core\Controller;
use Advan\BooksWeb\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';


Router::get('/', HomeController::class, 'index');
Router::get('/home', HomeController::class, 'index');