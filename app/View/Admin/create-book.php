<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f7f2] min-h-screen p-6">

<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">
  <h1 class="text-3xl font-bold mb-6">Tambah Buku</h1>

  <form action="/admin/books/store" method="POST" enctype="multipart/form-data" class="space-y-4">

    <input name="title" placeholder="Judul buku" required class="w-full border px-4 py-3 rounded-xl">

    <input name="author" placeholder="Penulis" class="w-full border px-4 py-3 rounded-xl">

    <input name="category" placeholder="Kategori" class="w-full border px-4 py-3 rounded-xl">

    <input name="language" placeholder="Bahasa" class="w-full border px-4 py-3 rounded-xl">

    <input name="file_url" placeholder="Link PDF / link baca" class="w-full border px-4 py-3 rounded-xl">

    <div>
      <label class="block mb-2 font-medium">Cover Buku</label>
      <input type="file" name="cover" accept="image/*" class="w-full border px-4 py-3 rounded-xl">
    </div>

    <div class="flex gap-3">
      <button class="bg-red-600 text-white px-6 py-3 rounded-xl">Simpan</button>
      <a href="/admin/books" class="px-6 py-3 rounded-xl border">Batal</a>
    </div>

  </form>
</div>

</body>
</html>