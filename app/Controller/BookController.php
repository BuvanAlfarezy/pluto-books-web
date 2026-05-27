<?php

namespace Advan\BooksWeb\Controller;

use Advan\BooksWeb\Model\Book;

class BookController
{
    private function checkAdmin()
    {
        session_start();

        if (empty($_SESSION['admin'])) {
            header('Location: /admin/login');
            exit;
        }
    }

    public function dashboard()
    {
        $this->checkAdmin();

        $bookModel = new Book();
        $books = $bookModel->all();

        require __DIR__ . '/../View/Admin/dashboard.php';
    }

    public function books()
{
    $this->checkAdmin();

    $bookModel = new Book();
    $books = $bookModel->allForAdmin();

    require __DIR__ . '/../View/Admin/books.php';
}

    public function create()
    {
        $this->checkAdmin();
        require __DIR__ . '/../View/Admin/create-book.php';
    }

    public function store()
    {
        $this->checkAdmin();

        $coverName = null;

        if (!empty($_FILES['cover']['name'])) {
            $coverName = time() . '-' . $_FILES['cover']['name'];
            move_uploaded_file(
                $_FILES['cover']['tmp_name'],
                __DIR__ . '/../../public/uploads/' . $coverName
            );
        }

        $bookModel = new Book();

        $bookModel->create([
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'category' => $_POST['category'],
            'language' => $_POST['language'],
            'cover' => $coverName,
            'content' => $_POST['content'],
        ]);

        header('Location: /admin/books');
        exit;
    }

    public function edit($id)
{
    $this->checkAdmin();

    $bookModel = new Book();
    $book = $bookModel->find($id);

    if (!$book) {
        echo "Buku dengan ID $id tidak ditemukan";
        exit;
    }

    require __DIR__ . '/../View/Admin/edit-book.php';
}

    public function update($id)
{
    $this->checkAdmin();

    $bookModel = new Book();
    $oldBook = $bookModel->find($id);

    if (!$oldBook) {
        echo "Buku dengan ID $id tidak ditemukan";
        exit;
    }

    $coverName = $oldBook['cover'];

    if (!empty($_FILES['cover']['name'])) {
        $coverName = time() . '-' . $_FILES['cover']['name'];

        move_uploaded_file(
            $_FILES['cover']['tmp_name'],
            __DIR__ . '/../../public/uploads/' . $coverName
        );
    }

    $bookModel->update($id, [
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'category' => $_POST['category'],
        'language' => $_POST['language'],
        'cover' => $coverName,
        'content' => $_POST['content'],
    ]);

    header('Location: /admin/books');
    exit;
}

    public function destroy($id)
    {
        $this->checkAdmin();

        $bookModel = new Book();
        $bookModel->delete($id);

        header('Location: /admin/books');
        exit;
    }

    public function read($id)
{
    $bookModel = new Book();
    $book = $bookModel->find($id);

    if (!$book) {
        echo "Buku tidak ditemukan";
        exit;
    }

    require __DIR__ . '/../View/Home/read.php';
}
}