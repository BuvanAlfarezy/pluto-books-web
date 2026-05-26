<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Buku</title>
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
        <p class="text-sm text-gray-500">Admin / Buku / Edit</p>

        <h1 class="text-3xl md:text-4xl font-bold text-[#111] mt-1">
          Edit Buku
        </h1>

        <p class="text-gray-500 mt-2">
          Perbarui data buku yang sudah ada.
        </p>
      </div>

      <a href="/admin/books" class="bg-white border px-5 py-3 rounded-xl hover:shadow transition">
        ← Kembali
      </a>

    </div>

    <!-- Layout -->
    <div class="grid lg:grid-cols-[1fr_350px] gap-6">

      <!-- Form -->
      <section class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8">

        <form 
          action="/admin/books/update/<?= $book['id']; ?>" 
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
              value="<?= htmlspecialchars($book['title']); ?>"
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
              value="<?= htmlspecialchars($book['author']); ?>"
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
                value="<?= htmlspecialchars($book['category']); ?>"
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
                value="<?= htmlspecialchars($book['language']); ?>"
                class="w-full border border-gray-200 rounded-2xl px-5 py-4 outline-none focus:border-red-500"
              >
            </div>

          </div>

          <!-- Isi Buku -->
<div>
  <label class="block text-sm font-semibold mb-2 text-gray-700">
    Isi Buku
  </label>

  <textarea
    name="content"
    rows="18"
    class="w-full border border-gray-200 rounded-3xl px-5 py-5 outline-none focus:border-red-500 resize-none leading-relaxed"
  ><?= htmlspecialchars($book['content']); ?></textarea>

  <p class="text-sm text-gray-500 mt-3">
    Isi buku dapat diatur tampilannya saat dibaca seperti ukuran teks, font, dan mode gelap.
  </p>
</div>

          <!-- Cover Lama -->
          <?php if (!empty($book['cover'])): ?>
            <div>
              <label class="block text-sm font-semibold mb-3 text-gray-700">
                Cover Saat Ini
              </label>

              <div class="flex items-center gap-5 bg-gray-50 border border-gray-100 rounded-3xl p-5">

                <img 
                  src="/uploads/<?= htmlspecialchars($book['cover']); ?>"
                  class="w-full h-full object-cover rounded-2xl shadow"
                  alt="<?= htmlspecialchars($book['title']); ?>"
                >

               

              </div>
            </div>
          <?php endif; ?>

          <!-- Upload Baru -->
<div>
  <label class="block text-sm font-semibold mb-2 text-gray-700">
    Ganti Cover Buku
  </label>

  <label class="border-2 border-dashed border-gray-300 rounded-3xl p-10 flex flex-col items-center justify-center text-center cursor-pointer hover:border-red-400 transition">

    <img
      id="coverPreview"
      class="hidden w-full h-full object-cover rounded-2xl shadow mb-5"
    >

    <div id="uploadPlaceholder">
      <div class="text-5xl mb-4">
        🖼️
      </div>

      <h3 class="text-lg font-semibold">
        Upload Cover Baru
      </h3>

      <p class="text-gray-500 text-sm mt-2">
        JPG, PNG, WEBP • Maks 2MB
      </p>
    </div>

    <input 
      type="file"
      name="cover"
      accept="image/*"
      class="hidden"
      onchange="previewCover(event)"
    >

  </label>
</div>

          <!-- Button -->
          <div class="flex flex-wrap gap-4 pt-4">

            <button class="bg-red-600 hover:bg-red-700 text-white px-7 py-4 rounded-2xl font-semibold transition shadow">
              Update Buku
            </button>

            <a href="/admin/books" class="bg-gray-100 hover:bg-gray-200 px-7 py-4 rounded-2xl font-medium transition">
              Batal
            </a>

          </div>

        </form>

      </section>

      <!-- Side -->
      <aside class="space-y-5">

        <div class="bg-[#111] text-white rounded-3xl p-6 overflow-hidden relative">

          <div class="relative z-10">

            <span class="inline-block bg-yellow-500 text-black text-xs font-bold px-3 py-2 rounded-full mb-4">
              EDIT MODE
            </span>

            <h3 class="text-2xl font-bold leading-snug">
              Pastikan data buku tetap konsisten.
            </h3>

            <p class="text-gray-300 mt-4 leading-relaxed">
              Hindari typo pada judul, penulis, dan link baca agar pengalaman pengguna tetap bagus.
            </p>

          </div>

          <div class="absolute -right-6 -bottom-8 text-[120px] opacity-10">
            ✏️
          </div>

        </div>

        <div class="bg-white rounded-3xl border border-gray-100 p-6">

          <h3 class="font-bold text-lg mb-4">
            Tips Update
          </h3>

          <div class="space-y-3 text-sm text-gray-600">

            <div class="flex items-center gap-3">
              <span>✅</span>
              Cek ulang judul buku
            </div>

            <div class="flex items-center gap-3">
              <span>✅</span>
              Pastikan link masih aktif
            </div>

            <div class="flex items-center gap-3">
              <span>✅</span>
              Gunakan cover resolusi bagus
            </div>

            <div class="flex items-center gap-3">
              <span>✅</span>
              Hindari data kosong
            </div>

          </div>

        </div>

      </aside>

    </div>

  </main>

</div>
<script>
function previewCover(event)
{
    const file = event.target.files[0];

    if (!file) return;

    const preview = document.getElementById('coverPreview');
    const placeholder = document.getElementById('uploadPlaceholder');

    preview.src = URL.createObjectURL(file);
    preview.classList.remove('hidden');
    placeholder.classList.add('hidden');
}
</script>
</body>
</html>