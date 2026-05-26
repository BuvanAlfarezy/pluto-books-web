<?php

namespace Advan\BooksWeb\Model;

use Advan\BooksWeb\Config\Database;
use PDO;

class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}