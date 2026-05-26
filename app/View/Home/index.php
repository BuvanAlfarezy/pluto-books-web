<!-- Hero + Book Section Wrapper -->
<section class="bg-[#f8f7f2]">

  <!-- Hero -->
  <main class="flex flex-col items-center text-center pt-16 md:pt-20 px-5 relative pb-20">
    <span class="mb-6 md:mb-7 border border-gray-500 rounded-full px-4 md:px-6 py-2 text-xs md:text-base text-gray-700 tracking-wide">
      BACA • PAHAMI • TUMBUH
    </span>

    <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-[92px] leading-tight md:leading-[1.1] font-bold text-[#101010] max-w-250">
      Temukan Bacaan yang  
      <span class="relative inline-block">
        Membuka Pikiran
        <span class="absolute left-2 right-2 md:left-3 md:right-3 -bottom-1 md:-bottom-2 h-2 md:h-3 bg-red-500/25 -z-10 rounded-full"></span>
      </span>
    </h1>

    <p class="mt-7 md:mt-10 text-base sm:text-xl md:text-[27px] leading-relaxed text-gray-600 max-w-205">
      Ruang baca digital untuk menjelajahi pengetahuan, gagasan,
      dan buku-buku pilihan yang bikin isi kepala naik level.
    </p>

    <div class="mt-9 md:mt-11 flex flex-col sm:flex-row items-center gap-5">
      <a href="#" class="bg-[#e91722] text-white text-lg md:text-[25px] px-10 md:px-20 py-4 md:py-5 rounded-full shadow-[0_5px_0_#b3131b] hover:bg-red-700">
        Mulai Membaca
      </a>

      <a href="#" class="text-lg md:text-[22px] border-b-2 border-black pb-1 hover:text-red-600 hover:border-red-600">
        Lihat Koleksi
      </a>
    </div>

    <!-- Mini Stats -->
    <div class="mt-14 md:mt-16 grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6 w-full max-w-190">
      <div class="border border-gray-500 rounded-2xl px-8 py-4">
      <h3 class="text-2xl md:text-3xl font-bold">
        <?= count($books); ?>+
      </h3>
      <p class="text-gray-600">Buku Digital</p>
      </div>

      <div class="border border-gray-500 rounded-2xl px-8 py-4">
        <h3 class="text-2xl md:text-3xl font-bold">15+</h3>
        <p class="text-gray-600">Kategori</p>
      </div>

      <div class="border border-gray-500 rounded-2xl px-8 py-4">
        <h3 class="text-2xl md:text-3xl font-bold">Gratis</h3>
        <p class="text-gray-600">Mulai Baca</p>
      </div>
    </div>

  </main>

   <!-- Book Slider -->
  <section class="relative pt-16 pb-16 overflow-hidden bg-linear-to-b from-[#f8f7f2] to-white">

    <div class="book-marquee relative z-10 flex gap-6 w-max px-6">

      <div class="flex gap-6">

        <?php foreach ($books as $book): ?>

          <div class="
          relative
          w-36 md:w-48
          h-56 md:h-75
          rounded-r-2xl
          overflow-visible
          transform-gpu
          transition-all
          duration-300
          hover:[transform:perspective(1000px)_rotateY(-10deg)_translateY(-6px)]
          ">

            <!-- Tebal Buku -->
            <div class="absolute top-2 -right-3 w-5 md:w-6 h-[95%] bg-[#d8d2c7] rounded-r-2xl shadow-[8px_14px_18px_rgba(0,0,0,0.14)]"></div>

            <!-- Halaman -->
            <div class="absolute top-3 -right-2 w-3 md:w-4 h-[92%] rounded-r-xl bg-gradient-to-r from-white via-[#ebe6de] to-[#cbc3b7]"></div>

            <!-- Cover -->
            <div class="relative w-full h-full rounded-r-2xl overflow-hidden shadow-[14px_20px_30px_rgba(0,0,0,0.16)]">

              <!-- Spine -->
              <div class="absolute left-0 top-0 w-4 h-full bg-gradient-to-r from-black/45 via-black/15 to-transparent z-20"></div>

              <!-- Highlight -->
              <div class="absolute left-5 top-0 w-[1px] h-full bg-white/30 z-20"></div>

              <?php if (!empty($book['cover'])): ?>

                <img 
                  src="/uploads/<?= htmlspecialchars($book['cover']); ?>"
                  class="w-full h-full object-cover transition duration-500 hover:scale-105"
                  alt="<?= htmlspecialchars($book['title']); ?>"
                >

              <?php else: ?>

                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-5xl">
                  📘
                </div>

              <?php endif; ?>

            </div>

          </div>

        <?php endforeach; ?>

      </div>

    </div>

  <!-- Rak Buku -->
  <div class="relative z-20 mx-auto w-[92%] max-w-425 mt-3">
    <div class="h-10 rounded-md bg-linear-to-b from-[#e3dfd7] to-[#cfc9bf] shadow-[0_18px_35px_rgba(0,0,0,0.08)]"></div>
  </div>

</section>
</section>


<!-- Eksplorasi Buku -->
<section class="bg-white px-6 md:px-16 py-16 md:py-24">
  <div class="max-w-[1800px] mx-auto">

    <!-- Header -->
    <div class="mb-10 md:mb-14">

      <span class="text-red-600 text-sm md:text-base tracking-[0.25em] font-semibold">
        KOLEKSI PILIHAN
      </span>

      <h2 class="mt-3 text-4xl md:text-6xl font-bold text-[#111]">
        Eksplorasi Buku
      </h2>

      <p class="mt-5 max-w-3xl text-gray-600 text-base md:text-xl leading-relaxed">
        Temukan bacaan digital pilihan dari berbagai kategori.
        Dari logika, filsafat, sains, sampai pengembangan diri.
      </p>

    </div>

    <!-- Filter -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-14">

      <button class="flex justify-between items-center border-b border-gray-300 py-3 text-left text-lg">
        Kategori <span>+</span>
      </button>

      <button class="flex justify-between items-center border-b border-gray-300 py-3 text-left text-lg">
        Bahasa <span>+</span>
      </button>

      <button class="flex justify-between items-center border-b border-gray-300 py-3 text-left text-lg">
        Tipe Buku <span>+</span>
      </button>

      <div class="flex items-center gap-3 border-b border-gray-300 py-3 text-gray-500 text-lg">

        <span>⌕</span>

        <input 
          type="text" 
          placeholder="Cari buku atau penulis..."
          class="w-full bg-transparent outline-none placeholder:text-gray-400"
        >

      </div>

    </div>

    <!-- Grid Buku -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-x-12 gap-y-16">

      <?php foreach ($books as $book): ?>

        <div class="group">

          <!-- Top -->
          <div class="flex items-center justify-between mb-5">

            <span class="text-sm text-gray-700">
              <?= htmlspecialchars($book['category']); ?>
            </span>

            <span class="bg-green-200 text-green-800 text-xs font-bold px-3 py-1 rounded-full">
              GRATIS
            </span>

          </div>

          <!-- Cover -->
            <a 
    href="/read/<?= $book['id']; ?>"
    class="flex justify-center"
  >

              <div class="
              relative
              w-44 h-64
              rounded-r-2xl
              overflow-visible
              transform-gpu
              transition-all
              duration-300
              hover:[transform:perspective(1000px)_rotateY(-10deg)_translateY(-8px)]
              ">

                <!-- Tebal Buku -->
                <div class="absolute top-2 -right-3 w-6 h-[95%] bg-[#d7d2c8] rounded-r-2xl shadow-[8px_14px_20px_rgba(0,0,0,0.16)]"></div>

                <!-- Halaman -->
                <div class="absolute top-3 -right-2 w-4 h-[92%] bg-gradient-to-r from-white via-[#ebe7df] to-[#cfc7bb] rounded-r-xl"></div>

                <!-- Cover -->
                <div class="relative w-full h-full rounded-r-2xl overflow-hidden shadow-[14px_20px_28px_rgba(0,0,0,0.16)]">

                  <!-- Spine -->
                  <div class="absolute left-0 top-0 w-4 h-full bg-gradient-to-r from-black/45 via-black/15 to-transparent z-20"></div>

                  <!-- Highlight -->
                  <div class="absolute left-5 top-0 w-[1px] h-full bg-white/35 z-20"></div>

                  <?php if (!empty($book['cover'])): ?>

                    <img 
                      src="/uploads/<?= htmlspecialchars($book['cover']); ?>"
                      class="w-full h-full object-cover transition duration-500 hover:scale-105"
                      alt="<?= htmlspecialchars($book['title']); ?>"
                    >

                  <?php else: ?>

                    <div class="w-full h-full bg-gray-200 flex items-center justify-center text-5xl">
                      📘
                    </div>

                  <?php endif; ?>

                </div>

              </div>

            </a>

          <!-- Detail -->
          <h3 class="mt-7 text-2xl font-semibold line-clamp-1">
  <a 
    href="/read/<?= $book['id']; ?>"
    class="hover:text-red-600 transition"
  >
    <?= htmlspecialchars($book['title']); ?>
  </a>
</h3>

          <p class="mt-3 text-gray-500 text-xl">
            <?= htmlspecialchars($book['author']); ?>
          </p>

          <p class="mt-2 text-gray-600 text-lg">
            Tersedia: <?= htmlspecialchars($book['language']); ?>
          </p>


                </div>
      <?php endforeach; ?>

    </div>

  </div>
</section>
<!-- Tentang Pluto Books -->
<section class="relative bg-white px-6 md:px-16 py-20 md:py-28 overflow-hidden">
  <div class="max-w-[1800px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

    <!-- Visual Buku -->
    <div class="relative hidden lg:block">
      <div class="relative w-[430px] h-[560px] -ml-28">

        <!-- halaman belakang -->
        <div class="absolute top-4 left-8 w-full h-full rounded-r-[40px] bg-[#eef0ec] border border-gray-200"></div>
        <div class="absolute top-8 left-14 w-full h-full rounded-r-[40px] bg-[#f8f8f5] border border-gray-200"></div>

        <!-- cover utama -->
        <div class="absolute inset-0 rounded-r-[42px] overflow-hidden bg-gradient-to-br from-[#d8ded9] via-[#c8d0cc] to-[#f3efe6] shadow-[25px_35px_60px_rgba(0,0,0,0.12)]">
          <div class="absolute left-0 top-0 w-10 h-full bg-gradient-to-r from-black/20 to-transparent"></div>

          <div class="absolute inset-0 flex flex-col items-center justify-center text-white/90">
            <div class="text-8xl mb-8">📖</div>
            <h3 class="text-5xl font-bold">Pluto</h3>
            <p class="mt-3 text-xl tracking-[0.3em] uppercase">Books</p>
          </div>
        </div>

      </div>
    </div>

    <!-- Konten -->
    <div>
      <span class="text-red-600 text-sm md:text-base tracking-[0.25em] font-semibold">
        TENTANG PLUTO BOOKS
      </span>

      <h2 class="mt-4 text-4xl md:text-6xl font-bold text-[#111] leading-tight">
        Ruang Baca Digital untuk Kepala yang Penasaran
      </h2>

      <p class="mt-6 text-gray-600 text-lg md:text-2xl leading-relaxed max-w-4xl">
        Pluto Books hadir sebagai tempat membaca buku digital yang ringan,
        rapi, dan mudah diakses. Cocok buat kamu yang ingin nemu bacaan
        tentang ilmu, gagasan, filsafat, sains, dan pengembangan diri tanpa
        harus ribet nyari ke mana-mana.
      </p>
    </div>

  </div>
</section>
<!-- FAQ -->
<section class="bg-white py-20 px-6">

  <!-- Wrapper -->
  <div class="max-w-4xl mx-auto">

    <!-- Title -->
    <h2 class="
    text-center
    text-3xl md:text-5xl
    font-semibold
    text-black
    mb-16
    leading-tight
    ">
      Pertanyaan yang Sering Diajukan
    </h2>

    <!-- FAQ LIST -->
    <div class="divide-y divide-gray-200">

      <!-- Item -->
      <details class="group py-9">

        <summary class="
        flex
        items-center
        justify-between
        gap-10
        cursor-pointer
        list-none
        ">

          <span class="
          text-base md:text-[22px]
          text-black/75
          ">
            Apa itu Pluto Books?
          </span>

          <span class="
          text-3xl
          font-light
          transition
          duration-300
          group-open:rotate-45
          ">
            +
          </span>

        </summary>

        <p class="
        mt-5
        text-gray-600
        text-sm md:text-lg
        leading-relaxed
        max-w-3xl
        ">
          Pluto Books adalah platform baca buku digital yang menyediakan
          berbagai bacaan tentang pengetahuan, filsafat,
          pengembangan diri, dan ide menarik lainnya.
        </p>

      </details>

      <!-- Item -->
      <details class="group py-9">

        <summary class="flex items-center justify-between gap-10 cursor-pointer list-none">

          <span class="text-base md:text-[22px] text-black/75">
            Bagaimana cara mengakses buku di Pluto Books?
          </span>

          <span class="text-3xl font-light transition duration-300 group-open:rotate-45">
            +
          </span>

        </summary>

        <p class="mt-5 text-gray-600 text-sm md:text-lg leading-relaxed max-w-3xl">
          Kamu cukup membuka website Pluto Books lalu memilih
          buku yang tersedia untuk mulai membaca secara online.
        </p>

      </details>

      <!-- Item -->
      <details class="group py-9">

        <summary class="flex items-center justify-between gap-10 cursor-pointer list-none">

          <span class="text-base md:text-[22px] text-black/75">
            Apakah buku-buku di Pluto Books tersedia offline atau online?
          </span>

          <span class="text-3xl font-light transition duration-300 group-open:rotate-45">
            +
          </span>

        </summary>

        <p class="mt-5 text-gray-600 text-sm md:text-lg leading-relaxed max-w-3xl">
          Saat ini Pluto Books fokus pada akses online agar buku
          lebih mudah diakses kapan saja dan di mana saja.
        </p>

      </details>

      <!-- Item -->
      <details class="group py-9">

        <summary class="flex items-center justify-between gap-10 cursor-pointer list-none">

          <span class="text-base md:text-[22px] text-black/75">
            Apa keunggulan Pluto Books dibandingkan platform lain?
          </span>

          <span class="text-3xl font-light transition duration-300 group-open:rotate-45">
            +
          </span>

        </summary>

        <p class="mt-5 text-gray-600 text-sm md:text-lg leading-relaxed max-w-3xl">
          Pluto Books hadir dengan tampilan minimalis,
          fokus membaca tanpa distraksi, dan koleksi yang
          dikurasi dengan tema pengetahuan modern.
        </p>

      </details>

      <!-- Item -->
      <details class="group py-9">

        <summary class="flex items-center justify-between gap-10 cursor-pointer list-none">

          <span class="text-base md:text-[22px] text-black/75">
            Apakah data dan privasi pengguna dijamin aman?
          </span>

          <span class="text-3xl font-light transition duration-300 group-open:rotate-45">
            +
          </span>

        </summary>

        <p class="mt-5 text-gray-600 text-sm md:text-lg leading-relaxed max-w-3xl">
          Pluto Books menjaga privasi pengguna dan tidak
          membagikan data pribadi tanpa izin pengguna.
        </p>

      </details>

    </div>

  </div>

</section>