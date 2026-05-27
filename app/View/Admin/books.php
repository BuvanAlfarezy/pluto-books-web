<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Buku</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-[#f8f7f2] h-screen overflow-hidden">

    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside
            class="hidden md:flex fixed left-0 top-0 h-screen w-72 bg-[#111] text-white flex-col justify-between p-6">
            <div>
                <div class="mb-10">
                    <h1 class="text-2xl font-bold">Pluto Books</h1>
                    <p class="text-sm text-gray-400 mt-1">Admin Panel</p>
                </div>

                <nav class="space-y-3">
                    <a href="/admin/dashboard"
                        class="flex items-center gap-3 text-gray-300 hover:bg-white/10 px-4 py-3 rounded-xl transition">
                        Dashboard
                    </a>

                    <a href="/admin/books"
                        class="flex items-center gap-3 bg-white text-black px-4 py-3 rounded-xl font-medium">
                        Kelola Buku
                    </a>
                </nav>
            </div>

            <a href="/admin/logout"
                class="flex items-center gap-3 text-red-300 hover:text-red-400 px-4 py-3 rounded-xl">
                Logout
            </a>
        </aside>

        <!-- Main -->
        <main class="flex-1 ml-72 overflow-y-auto p-5 md:p-8">

            <!-- Header -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-8">

                <div>
                    <p class="text-sm text-gray-500">Admin / Kelola Buku</p>
                    <h1 class="text-3xl md:text-4xl font-bold text-[#111] mt-1">
                        Kelola Buku
                    </h1>
                    <p class="text-gray-500 mt-2">
                        Atur data buku digital yang tampil di website.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="/admin/books/create"
                        class="bg-red-600 text-white px-5 py-3 rounded-xl shadow hover:bg-red-700 transition">
                        + Tambah Buku
                    </a>
                </div>

            </div>

            <!-- Summary -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <p class="text-gray-500">Total Buku</p>
                    <h2 class="text-4xl font-bold mt-2">
                        <?= count($books); ?>
                    </h2>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <p class="text-gray-500">Data Terbaru</p>
                    <h2 class="text-2xl font-bold mt-2">
                        <?= !empty($books) ? htmlspecialchars($books[0]['title']) : '-'; ?>
                    </h2>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <p class="text-gray-500">Status</p>
                    <h2 class="text-2xl font-bold mt-2 text-green-600">
                        Aktif
                    </h2>
                </div>

            </section>

            <!-- Table Card -->
            <section class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="p-6 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-bold">Daftar Buku</h2>
                        <p class="text-gray-500 text-sm mt-1">
                            Semua buku yang sudah ditambahkan.
                        </p>
                    </div>

                    <div class="relative w-full md:w-80">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">⌕</span>
                        <input type="text" placeholder="Cari buku..."
                            class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 outline-none focus:border-red-500">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-212.5">
                        <thead class="bg-gray-50 text-left text-sm text-gray-500">
                            <tr>
                                <th class="px-6 py-4">Cover</th>
                                <th class="px-6 py-4">Judul</th>
                                <th class="px-6 py-4">Penulis</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Bahasa</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            <?php if (!empty($books)): ?>
                            <?php foreach ($books as $book): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <?php if (!empty($book['cover'])): ?>
                                    <img src="/uploads/<?= htmlspecialchars($book['cover']); ?>"
                                        class="w-14 h-20 object-cover rounded-xl shadow-sm"
                                        alt="<?= htmlspecialchars($book['title']); ?>">
                                    <?php else: ?>
                                    <div
                                        class="w-14 h-20 rounded-xl bg-gray-100 flex items-center justify-center text-xl">
                                        📘
                                    </div>
                                    <?php endif; ?>
                                </td>

                                <td class="px-6 py-4">
                                    <h3 class="font-semibold text-[#111]">
                                        <?= htmlspecialchars($book['title']); ?>
                                    </h3>
                                    <p class="text-sm text-gray-500 mt-1">
                                        ID: <?= $book['id']; ?>
                                    </p>
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    <?= htmlspecialchars($book['author']); ?>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                        <?= htmlspecialchars($book['category']); ?>
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    <?= htmlspecialchars($book['language']); ?>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-3">

                                        <a href="/admin/books/edit/<?= $book['id']; ?>"
                                            class="bg-blue-50 text-blue-600 px-4 py-2 rounded-xl hover:bg-blue-100 transition">
                                            Edit
                                        </a>

                                        <form action="/admin/books/delete/<?= $book['id']; ?>" method="POST"
                                            onsubmit="return confirm('Yakin hapus buku ini?')">
                                            <button
                                                class="bg-red-50 text-red-600 px-4 py-2 rounded-xl hover:bg-red-100 transition">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div class="text-5xl mb-4">📚</div>
                                    <h3 class="text-xl font-bold">Belum ada buku</h3>
                                    <p class="text-gray-500 mt-2">
                                        Tambahkan buku pertama untuk mulai mengisi koleksi.
                                    </p>
                                    <a href="/admin/books/create"
                                        class="inline-block mt-5 bg-red-600 text-white px-5 py-3 rounded-xl">
                                        + Tambah Buku
                                    </a>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </section>

        </main>

    </div>

</body>

</html>