<?php

namespace Advan\BooksWeb\Model;

use Advan\BooksWeb\Config\Database;
use PDO;

class Book
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM books ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO books (title, author, category, language, cover, content)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['title'],
            $data['author'],
            $data['category'],
            $data['language'],
            $data['cover'],
            $data['content'],
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("
            UPDATE books 
            SET title = ?, author = ?, category = ?, language = ?, cover = ?, content = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            $data['title'],
            $data['author'],
            $data['category'],
            $data['language'],
            $data['cover'],
            $data['content'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([$id]);
    }
}