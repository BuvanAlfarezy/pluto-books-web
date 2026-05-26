<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f7f2] min-h-screen p-6">

<div class="max-w-6xl mx-auto">
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Kelola Buku</h1>

    <div class="flex gap-4">
      <a href="/admin/dashboard" class="text-gray-600">Dashboard</a>
      <a href="/admin/books/create" class="bg-red-600 text-white px-5 py-2 rounded-xl">
        Tambah Buku
      </a>
    </div>
  </div>

  <div class="bg-white rounded-2xl shadow overflow-hidden">
    <table class="w-full">
      <thead class="bg-gray-100 text-left">
        <tr>
          <th class="p-4">Cover</th>
          <th class="p-4">Judul</th>
          <th class="p-4">Penulis</th>
          <th class="p-4">Kategori</th>
          <th class="p-4">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($books as $book): ?>
          <tr class="border-t">
            <td class="p-4">
              <?php if ($book['cover']): ?>
                <img src="/uploads/<?= $book['cover']; ?>" class="w-16 h-20 object-cover rounded">
              <?php else: ?>
                -
              <?php endif; ?>
            </td>

            <td class="p-4 font-semibold"><?= htmlspecialchars($book['title']); ?></td>
            <td class="p-4"><?= htmlspecialchars($book['author']); ?></td>
            <td class="p-4"><?= htmlspecialchars($book['category']); ?></td>

            <td class="p-4 flex gap-3">
              <a href="/admin/books/edit/<?= $book['id']; ?>" class="text-blue-600">Edit</a>

              <form action="/admin/books/delete/<?= $book['id']; ?>" method="POST" onsubmit="return confirm('Hapus buku ini?')">
                <button class="text-red-600">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>