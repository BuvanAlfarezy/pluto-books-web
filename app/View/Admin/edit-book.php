<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f7f2] min-h-screen p-6">

<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">
  <h1 class="text-3xl font-bold mb-6">Edit Buku</h1>

  <form action="/admin/books/update/<?= $book['id']; ?>" method="POST" enctype="multipart/form-data" class="space-y-4">

    <input name="title" value="<?= htmlspecialchars($book['title']); ?>" required class="w-full border px-4 py-3 rounded-xl">

    <input name="author" value="<?= htmlspecialchars($book['author']); ?>" class="w-full border px-4 py-3 rounded-xl">

    <input name="category" value="<?= htmlspecialchars($book['category']); ?>" class="w-full border px-4 py-3 rounded-xl">

    <input name="language" value="<?= htmlspecialchars($book['language']); ?>" class="w-full border px-4 py-3 rounded-xl">

    <input name="file_url" value="<?= htmlspecialchars($book['file_url']); ?>" class="w-full border px-4 py-3 rounded-xl">

    <?php if ($book['cover']): ?>
      <img src="/uploads/<?= $book['cover']; ?>" class="w-28 h-36 object-cover rounded mb-3">
    <?php endif; ?>

    <div>
      <label class="block mb-2 font-medium">Ganti Cover</label>
      <input type="file" name="cover" accept="image/*" class="w-full border px-4 py-3 rounded-xl">
    </div>

    <div class="flex gap-3">
      <button class="bg-red-600 text-white px-6 py-3 rounded-xl">Update</button>
      <a href="/admin/books" class="px-6 py-3 rounded-xl border">Batal</a>
    </div>

  </form>
</div>

</body>
</html>