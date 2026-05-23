<?php

namespace Advan\BooksWeb\Controller;

use Advan\BooksWe\Core\Controller;
use Advan\BooksWe\Config\Database;

class HomeController extends Controller
{
    public function index()
    {
        // $postModel = new Post();

        // $posts = $postModel->getAll();

        $this->view('Home/index', [
            'title' => 'Home',
            // 'posts' => $posts
        ]);
    }
}