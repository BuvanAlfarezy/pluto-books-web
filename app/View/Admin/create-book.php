<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Buku</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="bg-[#f8f7f2] h-screen overflow-hidden">


<div class="flex h-screen">

  <!-- Sidebar -->
   <aside class="hidden md:flex fixed left-0 top-0 h-screen w-72 bg-[#111] text-white flex-col justify-between p-6">

    <div>
      <div class="mb-10">
        <h1 class="text-2xl font-bold">Pluto Books</h1>
        <p class="text-sm text-gray-400 mt-1">Admin Panel</p>
      </div>

      <nav class="space-y-3">

        <a href="/admin/dashboard" class="flex items-center gap-3 text-gray-300 hover:bg-white/10 px-4 py-3 rounded-xl transition">
          Dashboard
        </a>

        <a href="/admin/books" class="flex items-center gap-3 bg-white text-black px-4 py-3 rounded-xl font-medium">
          Kelola Buku
        </a>

      </nav>
    </div>

    <a href="/admin/logout" class="flex items-center gap-3 text-red-300 hover:text-red-400 px-4 py-3 rounded-xl">
      Logout
    </a>

  </aside>

  <!-- Main -->
    <main class="flex-1 ml-72 overflow-y-auto p-5 md:p-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-8">

      <div>
        <p class="text-sm text-gray-500">Admin / Buku / Tambah</p>

        <h1 class="text-3xl md:text-4xl font-bold text-[#111] mt-1">
          Tambah Buku
        </h1>

        <p class="text-gray-500 mt-2">
          Tambahkan buku baru ke koleksi Pluto Books.
        </p>
      </div>

      <a href="/admin/books" class="bg-white border px-5 py-3 rounded-xl hover:shadow transition">
        ← Kembali
      </a>

    </div>

    <!-- Form -->
    <div class="grid lg:grid-cols-[1fr_350px] gap-6">

      <!-- Form Card -->
      <section class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8">

        <form 
          action="/admin/books/store" 
          method="POST" 
          enctype="multipart/form-data"
          class="space-y-6"
        >

          <!-- Judul -->
          <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">
              Judul Buku
            </label>

            <input 
              type="text"
              name="title"
              required
              placeholder="Contoh: Atomic Habits"
              class="w-full border border-gray-200 rounded-2xl px-5 py-4 outline-none focus:border-red-500"
            >
          </div>

          <!-- Penulis -->
          <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">
              Penulis
            </label>

            <input 
              type="text"
              name="author"
              placeholder="Nama penulis"
              class="w-full border border-gray-200 rounded-2xl px-5 py-4 outline-none focus:border-red-500"
            >
          </div>

          <!-- Grid -->
          <div class="grid md:grid-cols-2 gap-5">

            <!-- Kategori -->
            <div>
              <label class="block text-sm font-semibold mb-2 text-gray-700">
                Kategori
              </label>

              <input 
                type="text"
                name="category"
                placeholder="Filsafat, Sains, dll"
                class="w-full border border-gray-200 rounded-2xl px-5 py-4 outline-none focus:border-red-500"
              >
            </div>

            <!-- Bahasa -->
            <div>
              <label class="block text-sm font-semibold mb-2 text-gray-700">
                Bahasa
              </label>

              <input 
                type="text"
                name="language"
                placeholder="Indonesia / English"
                class="w-full border border-gray-200 rounded-2xl px-5 py-4 outline-none focus:border-red-500"
              >
            </div>

          </div>

          <!-- Link -->
          <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">
              Link PDF / Link Baca
            </label>

            <input 
              type="text"
              name="file_url"
              placeholder="https://..."
              class="w-full border border-gray-200 rounded-2xl px-5 py-4 outline-none focus:border-red-500"
            >
          </div>

          <!-- Upload -->
          <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">
              Cover Buku
            </label>

            <label class="border-2 border-dashed border-gray-300 rounded-3xl p-10 flex flex-col items-center justify-center text-center cursor-pointer hover:border-red-400 transition">

              <div class="text-5xl mb-4">
                📘
              </div>

              <h3 class="text-lg font-semibold">
                Upload Cover Buku
              </h3>

              <p class="text-gray-500 text-sm mt-2">
                JPG, PNG, WEBP • Maks 2MB
              </p>

              <input 
                type="file"
                name="cover"
                accept="image/*"
                class="hidden"
              >

            </label>
          </div>

          <!-- Buttons -->
          <div class="flex flex-wrap gap-4 pt-4">

            <button class="bg-red-600 hover:bg-red-700 text-white px-7 py-4 rounded-2xl font-semibold transition shadow">
              Simpan Buku
            </button>

            <a href="/admin/books" class="bg-gray-100 hover:bg-gray-200 px-7 py-4 rounded-2xl font-medium transition">
              Batal
            </a>

          </div>

        </form>

      </section>

      <!-- Side Card -->
      <aside class="space-y-5">

        <div class="bg-[#111] text-white rounded-3xl p-6 overflow-hidden relative">
          <div class="relative z-10">
            <span class="inline-block bg-red-600 text-xs font-bold px-3 py-2 rounded-full mb-4">
              TIPS
            </span>

            <h3 class="text-2xl font-bold leading-snug">
              Gunakan cover buku dengan kualitas bagus.
            </h3>

            <p class="text-gray-300 mt-4 leading-relaxed">
              Cover yang jelas bikin tampilan website lebih profesional dan menarik.
            </p>
          </div>

          <div class="absolute -right-6 -bottom-8 text-[120px] opacity-10">
            📚
          </div>
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 p-6">
          <h3 class="font-bold text-lg mb-4">
            Checklist
          </h3>

          <div class="space-y-3 text-sm text-gray-600">

            <div class="flex items-center gap-3">
              <span>✅</span>
              Judul buku diisi
            </div>

            <div class="flex items-center gap-3">
              <span>✅</span>
              Cover buku jelas
            </div>

            <div class="flex items-center gap-3">
              <span>✅</span>
              Link baca valid
            </div>

            <div class="flex items-center gap-3">
              <span>✅</span>
              Kategori sesuai
            </div>

          </div>
        </div>

      </aside>

    </div>

  </main>

</div>

</body>
</html>