<?php

namespace Advan\BooksWeb\Core;

class Model {
    protected $db;

    public function __construct() {
        $this->db = require '../config/Database.php';
    }
}