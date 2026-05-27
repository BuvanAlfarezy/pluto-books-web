<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-[#f8f7f2] h-screen overflow-hidden">

    <!-- Wrapper -->
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
                        class="flex items-center gap-3 bg-white text-black px-4 py-3 rounded-xl font-medium">
                        Dashboard
                    </a>

                    <a href="/admin/books"
                        class="flex items-center gap-3 text-gray-300 hover:bg-white/10 px-4 py-3 rounded-xl transition">
                        Kelola Buku
                    </a>
                </nav>
            </div>

            <a href="/admin/logout"
                class="flex items-center gap-3 text-red-300 hover:text-red-400 px-4 py-3 rounded-xl">
                Logout
            </a>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-72 overflow-y-auto p-5 md:p-8">

            <!-- Topbar -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

                <div>
                    <p class="text-sm text-gray-500">Selamat datang kembali</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-[#111] mt-1">
                        Dashboard Admin
                    </h2>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/" target="_blank" class="bg-white border px-5 py-3 rounded-xl hover:shadow transition">
                        Lihat Website
                    </a>

                    <a href="/admin/books/create"
                        class="bg-red-600 text-white px-5 py-3 rounded-xl shadow hover:bg-red-700 transition">
                        + Tambah Buku
                    </a>
                </div>

            </div>

            <!-- Hero Card -->
            <section class="bg-[#111] text-white rounded-3xl p-8 md:p-10 mb-8 relative overflow-hidden">
                <div class="relative z-10 max-w-2xl">
                    <span class="inline-block bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-full mb-5">
                        ADMIN AREA
                    </span>

                    <h3 class="text-3xl md:text-5xl font-bold leading-tight">
                        Kelola koleksi buku digital dengan lebih rapi.
                    </h3>

                    <p class="text-gray-300 mt-5 text-lg leading-relaxed">
                        Tambah, edit, dan hapus buku dari satu tempat tanpa ribet.
                    </p>
                </div>

                <div class="absolute -right-10 -bottom-16 text-[180px] opacity-10">
                    📚
                </div>
            </section>

            <!-- Stats -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Total Buku</p>
                            <h4 class="text-4xl font-bold mt-2"><?= count($books ?? []); ?></h4>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-2xl">
                            📘
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Kategori</p>
                            <h4 class="text-4xl font-bold mt-2">
                                <?= count(array_unique(array_column($books ?? [], 'category'))); ?></h4>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center text-2xl">
                            🏷️
                        </div>
                    </div>
                </div>
            </section>

            <!-- Action Cards -->
            <section class="grid grid-cols-1 md:grid-cols-1 gap-5">

                <a href="/admin/books"
                    class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <div
                                class="w-14 h-14 rounded-2xl bg-black text-white flex items-center justify-center text-2xl mb-5">
                                📚
                            </div>

                            <h3 class="text-2xl font-bold">Kelola Buku</h3>
                            <p class="text-gray-500 mt-2 leading-relaxed">
                                Tambah, edit, hapus, dan atur data buku digital.
                            </p>
                        </div>

                        <span class="text-3xl group-hover:translate-x-1 transition">→</span>
                    </div>
                </a>

            </section>

        </main>

    </div>

</body>

</html>