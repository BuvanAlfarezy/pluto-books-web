<?php

namespace Advan\BooksWeb\Core;

class Controller {
    public function view($view, $data = [])
    {
        extract($data);

        require_once __DIR__ . "/../app/View/header.php";
        require_once __DIR__ . "/../app/View/$view.php";
        require_once __DIR__ . "/../app/View/footer.php";
    }
}