<?php

namespace Advan\BooksWeb\Controller;

use Advan\BooksWeb\Core\Controller;
use Advan\BooksWeb\Config\Database;

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