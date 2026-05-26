<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f7f2] min-h-screen p-6">

  <div class="max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold">Dashboard Admin</h1>
      <a href="/admin/logout" class="text-red-600">Logout</a>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
      <a href="/admin/books" class="bg-white p-6 rounded-2xl shadow hover:shadow-md">
        <h2 class="text-xl font-bold">Kelola Buku</h2>
        <p class="text-gray-500 mt-2">Tambah, edit, dan hapus buku.</p>
      </a>
    </div>
  </div>

</body>
</html>