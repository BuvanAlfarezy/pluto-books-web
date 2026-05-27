<?php session_start(); ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f8f7f2] min-h-screen flex items-center justify-center px-4">

    <div class="bg-white w-full max-w-md rounded-2xl shadow p-8">
        <h1 class="text-3xl font-bold mb-2">Admin Login</h1>
        <p class="text-gray-500 mb-6">Masuk untuk kelola buku.</p>

        <?php if (!empty($_SESSION['error'])) : ?>
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-4">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
        <?php endif; ?>

        <form action="/admin/login" method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 text-sm font-medium">Username</label>
                <input type="text" name="username" class="w-full border rounded-xl px-4 py-3 outline-none" required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">Password</label>
                <input type="password" name="password" class="w-full border rounded-xl px-4 py-3 outline-none" required>
            </div>

            <button class="w-full bg-red-600 text-white py-3 rounded-xl font-semibold">
                Login
            </button>
        </form>
    </div>

</body>

</html>