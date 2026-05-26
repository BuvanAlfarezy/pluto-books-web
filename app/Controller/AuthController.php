<?php

namespace Advan\BooksWeb\Controller;

use Advan\BooksWeb\Model\Admin;

class AuthController
{
    public function login()
    {
        require __DIR__ . '/../View/Admin/login.php';
    }

    public function processLogin()
    {
        session_start();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $adminModel = new Admin();
        $admin = $adminModel->findByUsername($username);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['username'];
            header('Location: /admin/dashboard');
            exit;
        }

        $_SESSION['error'] = 'Username atau password salah';
        header('Location: /admin/login');
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();

        header('Location: /admin/login');
        exit;
    }
}