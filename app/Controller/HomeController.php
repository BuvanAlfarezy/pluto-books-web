<?php

namespace Advan\BooksWeb\Controller;

use Advan\BooksWeb\Core\Controller;
use Advan\BooksWeb\Config\Database;
use Advan\BooksWeb\Model\Book;

class HomeController extends Controller
{
    public function index()
    {
        // $postModel = new Post();

        // $posts = $postModel->getAll();

        $bookModel = new Book();

        $books = $bookModel->allForHome();

        $this->view('Home/index', [
            'title' => 'Home',
            'books' => $books
        ]);
    }
}