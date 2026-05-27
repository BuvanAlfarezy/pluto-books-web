<!-- Hero + Book Section Wrapper -->
<section class="bg-[#f8f7f2]">

    <!-- Hero -->
    <main class="flex flex-col items-center text-center pt-16 md:pt-20 px-5 relative pb-20">
        <span
            class="mb-6 md:mb-7 border border-gray-500 rounded-full px-4 md:px-6 py-2 text-xs md:text-base text-gray-700 tracking-wide">
            BACA • PAHAMI • TUMBUH
        </span>

        <h1
            class="text-4xl sm:text-6xl md:text-7xl lg:text-[92px] leading-tight md:leading-[1.1] font-bold text-[#101010] max-w-250">
            Temukan Bacaan yang
            <span class="relative inline-block">
                Membuka Pikiran
                <span
                    class="absolute left-2 right-2 md:left-3 md:right-3 -bottom-1 md:-bottom-2 h-2 md:h-3 bg-red-500/25 -z-10 rounded-full"></span>
            </span>
        </h1>

        <p class="mt-7 md:mt-10 text-base sm:text-xl md:text-[27px] leading-relaxed text-gray-600 max-w-205">
            Ruang baca digital untuk menjelajahi pengetahuan, gagasan,
            dan buku-buku pilihan yang bikin isi kepala naik level.
        </p>

        <div class="mt-9 md:mt-11 flex flex-col sm:flex-row items-center gap-5">
            <a href="#koleksi"
                class="bg-[#e91722] text-white text-lg md:text-[25px] px-10 md:px-20 py-4 md:py-5 rounded-full shadow-[0_5px_0_#b3131b] hover:bg-red-700">
                Mulai Membaca
            </a>
        </div>

    </main>

    <?php
if (count($books) > 6) {
    $sliderBooks = array_slice($books, 0, 6);
} else {
    $sliderBooks = $books;
}

$sliderBooks = array_merge($sliderBooks, $sliderBooks, $sliderBooks);
?>

    <!-- Book Slider -->
    <section class="relative pt-16 pb-16 overflow-hidden bg-linear-to-b from-[#f8f7f2] to-white">

        <div class="overflow-hidden w-full">
            <div class="book-track flex gap-6 w-max px-6">

                <?php foreach ($sliderBooks as $book): ?>

                <div class="
          relative
          shrink-0
          w-36 md:w-48
          h-56 md:h-75
          rounded-r-2xl
          overflow-visible
          transform-gpu
          transition-all
          duration-300
          hover:transform-[perspective(1000px)_rotateY(-10deg)_translateY(-6px)]
        ">

                    <div
                        class="absolute top-2 -right-3 w-5 md:w-6 h-[95%] bg-[#d8d2c7] rounded-r-2xl shadow-[8px_14px_18px_rgba(0,0,0,0.14)]">
                    </div>

                    <div
                        class="absolute top-3 -right-2 w-3 md:w-4 h-[92%] rounded-r-xl bg-linear-to-r from-white via-[#ebe6de] to-[#cbc3b7]">
                    </div>

                    <div
                        class="relative w-full h-full rounded-r-2xl overflow-hidden shadow-[14px_20px_30px_rgba(0,0,0,0.16)]">

                        <div
                            class="absolute left-0 top-0 w-4 h-full bg-linear-to-r from-black/45 via-black/15 to-transparent z-20">
                        </div>

                        <div class="absolute left-5 top-0 w-px h-full bg-white/30 z-20"></div>

                        <?php if (!empty($book['cover'])): ?>
                        <img loading="eager" decoding="async" src="/uploads/<?= htmlspecialchars($book['cover']); ?>"
                            class="w-full h-full object-cover transition duration-500 hover:scale-105"
                            alt="<?= htmlspecialchars($book['title']); ?>">
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

        <div class="relative z-20 mx-auto w-[92%] max-w-425 mt-3">
            <div
                class="h-10 rounded-md bg-linear-to-b from-[#e3dfd7] to-[#cfc9bf] shadow-[0_18px_35px_rgba(0,0,0,0.08)]">
            </div>
        </div>

    </section>

    <!-- Eksplorasi Buku -->
    <section class="bg-white px-6 md:px-16 py-16 md:py-24" id="koleksi">
        <div class="max-w-450 mx-auto">

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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-14">

                <select id="filterCategory" class="border-b border-gray-300 py-3 text-lg outline-none bg-transparent">
                    <option value="">Semua Kategori</option>

                    <?php
      $categories = array_unique(array_column($books, 'category'));
      foreach ($categories as $category):
        if (!empty($category)):
    ?>
                    <option value="<?= htmlspecialchars(strtolower($category)); ?>">
                        <?= htmlspecialchars($category); ?>
                    </option>
                    <?php endif; endforeach; ?>
                </select>

                <select id="filterLanguage" class="border-b border-gray-300 py-3 text-lg outline-none bg-transparent">
                    <option value="">Semua Bahasa</option>

                    <?php
      $languages = array_unique(array_column($books, 'language'));
      foreach ($languages as $language):
        if (!empty($language)):
    ?>
                    <option value="<?= htmlspecialchars(strtolower($language)); ?>">
                        <?= htmlspecialchars($language); ?>
                    </option>
                    <?php endif; endforeach; ?>
                </select>

                <div class="flex items-center gap-3 border-b border-gray-300 py-3 text-gray-500 text-lg">
                    <span>⌕</span>

                    <input id="searchBook" type="text" placeholder="Cari buku atau penulis..."
                        class="w-full bg-transparent outline-none placeholder:text-gray-400">
                </div>

            </div>

            <!-- Grid Buku -->
            <div id="booksGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-x-12 gap-y-16">

                <?php foreach ($books as $book): ?>

                <div class="group book-card" data-category="<?= htmlspecialchars(strtolower($book['category'])); ?>"
                    data-language="<?= htmlspecialchars(strtolower($book['language'])); ?>"
                    data-title="<?= htmlspecialchars(strtolower($book['title'])); ?>"
                    data-author="<?= htmlspecialchars(strtolower($book['author'])); ?>">

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
                    <a href="/read/<?= $book['id']; ?>" class="flex justify-center">

                        <div class="
              relative
              w-44 h-64
              rounded-r-2xl
              overflow-visible
              transform-gpu
              transition-all
              duration-300
              hover:transform-[perspective(1000px)_rotateY(-10deg)_translateY(-8px)]
              ">

                            <!-- Tebal Buku -->
                            <div
                                class="absolute top-2 -right-3 w-6 h-[95%] bg-[#d7d2c8] rounded-r-2xl shadow-[8px_14px_20px_rgba(0,0,0,0.16)]">
                            </div>

                            <!-- Halaman -->
                            <div
                                class="absolute top-3 -right-2 w-4 h-[92%] bg-linear-to-r from-white via-[#ebe7df] to-[#cfc7bb] rounded-r-xl">
                            </div>

                            <!-- Cover -->
                            <div
                                class="relative w-full h-full rounded-r-2xl overflow-hidden shadow-[14px_20px_28px_rgba(0,0,0,0.16)]">

                                <!-- Spine -->
                                <div
                                    class="absolute left-0 top-0 w-4 h-full bg-linear-to-r from-black/45 via-black/15 to-transparent z-20">
                                </div>

                                <!-- Highlight -->
                                <div class="absolute left-5 top-0 w-px h-full bg-white/35 z-20"></div>

                                <?php if (!empty($book['cover'])): ?>

                                <img loading="lazy" decoding="async"
                                    src="/uploads/<?= htmlspecialchars($book['cover']); ?>"
                                    class="w-full h-full object-cover transition duration-500 hover:scale-105"
                                    alt="<?= htmlspecialchars($book['title']); ?>">

                                <?php else: ?>

                                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-5xl">
                                    📘
                                </div>

                                <?php endif; ?>

                            </div>

                        </div>

                    </a>

                    <!-- Detail -->
                    <h3 class="mt-7 text-1xl font-semibold line-clamp-1">
                        <a href="/read/<?= $book['id']; ?>"
                            class="group relative inline-block overflow-hidden pb-1 transition">

                            <span class="transition duration-300 group-hover:text-red-600 md:line-clamp-2">
                                <?= htmlspecialchars($book['title']); ?>
                            </span>

                            <!-- Garis -->
                            <span class="
      absolute
      left-0
      bottom-0
      h-[2px]
      w-full
      bg-red-500

      -translate-x-full
      group-hover:translate-x-0

      transition-transform
      duration-500
      ease-out
    "></span>

                        </a>
                    </h3>

                    <p class="mt-3 text-gray-500 text-1xl">
                        <?= htmlspecialchars($book['author']); ?>
                    </p>

                    <p class="mt-2 text-gray-600 text-1xl">
                        Tersedia: <?= htmlspecialchars($book['language']); ?>
                    </p>


                </div>
                <?php endforeach; ?>

            </div>

            <div class="mt-16 flex justify-center">
                <button id="loadMoreBtn" class="bg-black text-white px-8 py-4 rounded-full hover:bg-red-600 transition">
                    Load More
                </button>
            </div>

            <!-- EMPTY STATE -->
            <div id="emptyState" class="hidden py-24 flex flex-col items-center justify-center text-center">
                <h3 class="text-3xl font-semibold text-black">
                    Buku tidak ditemukan
                </h3>

                <p class="mt-4 text-gray-500 text-lg max-w-md">
                    Coba gunakan kata kunci atau filter lain.
                </p>
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
                    <div
                        class="absolute top-4 left-8 w-full h-full rounded-r-[40px] bg-[#eef0ec] border border-gray-200">
                    </div>
                    <div
                        class="absolute top-8 left-14 w-full h-full rounded-r-[40px] bg-[#f8f8f5] border border-gray-200">
                    </div>

                    <!-- cover utama -->
                    <div
                        class="absolute inset-0 rounded-r-[42px] overflow-hidden bg-gradient-to-br from-[#d8ded9] via-[#c8d0cc] to-[#f3efe6] shadow-[25px_35px_60px_rgba(0,0,0,0.12)]">
                        <div class="absolute left-0 top-0 w-10 h-full bg-gradient-to-r from-black/20 to-transparent">
                        </div>

                        <div class="absolute inset-0 flex flex-col items-center justify-center text-black">
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
    <section class="bg-white py-20 px-6" id="faq">

        <div class="max-w-4xl mx-auto">

            <!-- Title -->
            <h2 class="text-center text-3xl md:text-5xl font-semibold text-black mb-16 leading-tight">
                Pertanyaan yang Sering Diajukan
            </h2>

            <!-- FAQ List -->
            <div class="divide-y divide-gray-200">

                <!-- ITEM -->
                <div class="faq-item py-9">

                    <button type="button" class="faq-btn w-full flex items-center justify-between gap-10 text-left">

                        <span class="text-base md:text-[22px] text-black/75">
                            Apa itu Pluto Books?
                        </span>

                        <span class="
                        faq-icon
                        text-3xl
                        font-light
                        transition-transform
                        duration-500
                    ">
                            +
                        </span>

                    </button>

                    <div class="
                    faq-content
                    max-h-0
                    overflow-hidden
                    opacity-0
                    transition-all
                    duration-700
                    ease-in-out
                ">

                        <p class="
                        pt-5
                        text-gray-600
                        text-sm
                        md:text-lg
                        leading-relaxed
                        max-w-3xl

                        translate-y-3
                        transition-all
                        duration-700
                        ease-out
                    ">
                            Pluto Books adalah platform baca buku digital
                            yang menyediakan berbagai bacaan tentang
                            pengetahuan, filsafat, pengembangan diri,
                            dan ide menarik lainnya.
                        </p>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="faq-item py-9">

                    <button type="button" class="faq-btn w-full flex items-center justify-between gap-10 text-left">

                        <span class="text-base md:text-[22px] text-black/75">
                            Bagaimana cara mengakses buku di Pluto Books?
                        </span>

                        <span class="
                        faq-icon
                        text-3xl
                        font-light
                        transition-transform
                        duration-500
                    ">
                            +
                        </span>

                    </button>

                    <div class="
                    faq-content
                    max-h-0
                    overflow-hidden
                    opacity-0
                    transition-all
                    duration-700
                    ease-in-out
                ">

                        <p class="
                        pt-5
                        text-gray-600
                        text-sm
                        md:text-lg
                        leading-relaxed
                        max-w-3xl

                        translate-y-3
                        transition-all
                        duration-700
                        ease-out
                    ">
                            Kamu cukup membuka website Pluto Books
                            lalu memilih buku yang tersedia untuk
                            mulai membaca secara online.
                        </p>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="faq-item py-9">

                    <button type="button" class="faq-btn w-full flex items-center justify-between gap-10 text-left">

                        <span class="text-base md:text-[22px] text-black/75">
                            Apakah buku-buku di Pluto Books tersedia offline atau online?
                        </span>

                        <span class="
                        faq-icon
                        text-3xl
                        font-light
                        transition-transform
                        duration-500
                    ">
                            +
                        </span>

                    </button>

                    <div class="
                    faq-content
                    max-h-0
                    overflow-hidden
                    opacity-0
                    transition-all
                    duration-700
                    ease-in-out
                ">

                        <p class="
                        pt-5
                        text-gray-600
                        text-sm
                        md:text-lg
                        leading-relaxed
                        max-w-3xl

                        translate-y-3
                        transition-all
                        duration-700
                        ease-out
                    ">
                            Saat ini Pluto Books fokus pada akses online
                            agar buku lebih mudah diakses kapan saja
                            dan di mana saja.
                        </p>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="faq-item py-9">

                    <button type="button" class="faq-btn w-full flex items-center justify-between gap-10 text-left">

                        <span class="text-base md:text-[22px] text-black/75">
                            Apa keunggulan Pluto Books dibandingkan platform lain?
                        </span>

                        <span class="
                        faq-icon
                        text-3xl
                        font-light
                        transition-transform
                        duration-500
                    ">
                            +
                        </span>

                    </button>

                    <div class="
                    faq-content
                    max-h-0
                    overflow-hidden
                    opacity-0
                    transition-all
                    duration-700
                    ease-in-out
                ">

                        <p class="
                        pt-5
                        text-gray-600
                        text-sm
                        md:text-lg
                        leading-relaxed
                        max-w-3xl

                        translate-y-3
                        transition-all
                        duration-700
                        ease-out
                    ">
                            Pluto Books hadir dengan tampilan minimalis,
                            fokus membaca tanpa distraksi,
                            dan koleksi yang dikurasi.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>