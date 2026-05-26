<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($book['title']); ?></title>
  <link rel="stylesheet" href="/assets/css/style.css">

  <style>
    @media (max-width: 768px) {
      #readerPages {
        font-size: 18px;
        line-height: 1.85;
      }

      #readerToolbar {
        max-width: calc(100vw - 24px);
      }
    }
  </style>
</head>

<body id="readerBody" class="bg-white text-black h-screen overflow-hidden transition">

<header
  id="readerHeader"
  class="fixed top-0 left-0 right-0 z-30 bg-white/95 backdrop-blur px-3 py-3 md:px-8 md:py-5 flex flex-col md:flex-row md:justify-between md:items-center gap-3"
>
  <a href="/" class="text-2xl font-bold tracking-wide leading-none mx-auto md:mx-0">
    Pluto
  </a>

  <div
    id="readerToolbar"
    class="w-full md:w-auto flex items-center justify-between md:justify-center gap-2 md:gap-6 border rounded-full px-4 md:px-7 py-3 bg-white text-black shadow-sm text-sm md:text-base"
  >
    <button onclick="highlightText()">Highlight</button>
    <button onclick="decreaseFont()">A-</button>
    <button onclick="increaseFont()">A+</button>
    <button onclick="setFont('serif')">Serif</button>
    <button onclick="setFont('sans')">Sans</button>
    <button onclick="toggleTheme()">Mode</button>
  </div>
</header>

<main
  id="readerMain"
  class="h-screen pt-36 md:pt-28 pb-28 px-5 sm:px-8 md:px-16 overflow-y-auto md:overflow-hidden"
>
  <section
    id="readerPages"
    class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-24 md:h-full max-w-[1500px] mx-auto font-serif text-[20px] md:text-[22px] leading-relaxed"
  >
    <article id="leftPage" class="px-1 sm:px-6 md:px-8 md:overflow-hidden"></article>
    <article id="rightPage" class="hidden md:block overflow-hidden px-2 sm:px-6 md:px-8"></article>
  </section>
</main>

<footer
  id="readerFooter"
  class="fixed bottom-0 left-0 right-0 z-30 bg-white text-black border-t px-4 md:px-8 py-3 md:py-4"
>
  <div class="max-w-[1500px] mx-auto relative flex items-center justify-center">

    <div
      id="readerPagination"
      class="hidden md:flex items-center gap-4 border px-5 md:px-8 py-3 rounded-full bg-white text-black"
    >
      <button onclick="prevPage()" class="w-10 h-10 flex items-center justify-center rounded-full text-2xl hover:bg-gray-100 transition">
        ‹
      </button>

      <span id="pageInfo" class="text-sm md:text-base whitespace-nowrap min-w-[110px] text-center">
        Page 1 of 1
      </span>

      <button onclick="nextPage()" class="w-10 h-10 flex items-center justify-center rounded-full text-2xl hover:bg-gray-100 transition">
        ›
      </button>
    </div>

    <button
      id="finishButton"
      onclick="finishReading()"
      disabled
      class="w-full md:w-auto md:absolute md:right-0 border px-6 py-3 rounded-full text-gray-400 bg-white cursor-not-allowed"
    >
      Selesai Dibaca
    </button>

  </div>
</footer>

<!-- Custom Modal -->
<div
  id="readerModal"
  class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 px-5"
>
  <div
    id="readerModalBox"
    class="w-full max-w-sm rounded-3xl bg-white text-black p-7 shadow-xl border"
  >
    <h2 id="readerModalTitle" class="text-xl font-bold mb-3">
      Pemberitahuan
    </h2>

    <p id="readerModalMessage" class="text-gray-600 leading-relaxed">
      Pesan
    </p>

    <button id="readerModalButton"
      onclick="closeModal()"
      class="mt-6 w-full rounded-full bg-black text-white py-3 hover:bg-gray-800 transition"
    >
      Mengerti
    </button>
  </div>
</div>

<script>
const rawContent = `<?= addslashes($book['content']); ?>`;
const bookTitle = `<?= addslashes($book['title']); ?>`;

const leftPage = document.getElementById('leftPage');
const rightPage = document.getElementById('rightPage');
const readerPages = document.getElementById('readerPages');
const readerMain = document.getElementById('readerMain');
const body = document.getElementById('readerBody');
const header = document.getElementById('readerHeader');
const pageInfo = document.getElementById('pageInfo');

const toolbar = document.getElementById('readerToolbar');
const footer = document.getElementById('readerFooter');
const pagination = document.getElementById('readerPagination');
const finishButton = document.getElementById('finishButton');

const modal = document.getElementById('readerModal');
const modalBox = document.getElementById('readerModalBox');
const modalTitle = document.getElementById('readerModalTitle');
const modalMessage = document.getElementById('readerModalMessage');
const modalButton = document.getElementById('readerModalButton');

let fontSize = 22;
let currentPage = 0;
let pages = [];
let isDark = false;
let mobileFinished = false;

function isMobile() {
  return window.innerWidth < 768;
}

function openModal(title, message) {
  modalTitle.innerText = title;
  modalMessage.innerText = message;

  if (isDark) {
    modalBox.className = 'w-full max-w-sm rounded-3xl bg-[#1c1c1c] text-white p-7 shadow-xl border border-gray-700';
    modalMessage.className = 'text-gray-300 leading-relaxed';
    modalButton.className ='mt-6 w-full rounded-full bg-white text-black py-3 hover:bg-gray-200 transition';
  } else {
    modalBox.className = 'w-full max-w-sm rounded-3xl bg-white text-black p-7 shadow-xl border';
    modalMessage.className = 'text-gray-600 leading-relaxed';
    modalButton.className =
      'mt-6 w-full rounded-full bg-black text-white py-3 hover:bg-gray-800 transition';
  }

  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeModal() {
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

function buildPages() {
  const paragraphs = rawContent
    .split(/\n+/)
    .map(p => p.trim())
    .filter(p => p.length > 0);

  pages = [];

  const firstPage = isMobile()
    ? `
      <div class="pb-8 text-center">
        <p class="text-base mb-5">CHAPTER</p>
        <h1 class="text-3xl leading-tight border-b pb-6">${bookTitle}</h1>
      </div>
    `
    : `
      <div class="flex flex-col justify-center h-full text-center">
        <p class="text-xl mb-8">CHAPTER</p>
        <h1 class="text-5xl leading-snug border-b pb-6">${bookTitle}</h1>
      </div>
    `;

  pages.push(firstPage);

  let chunk = '';
  const charLimit = getCharLimit();

  paragraphs.forEach(paragraph => {
    if ((chunk + paragraph).length > charLimit) {
      pages.push(chunk);
      chunk = '';
    }

    chunk += `
      <p class="mb-8 text-justify">
        ${paragraph}
      </p>
    `;
  });

  if (chunk.trim() !== '') {
    pages.push(chunk);
  }

  if (currentPage > pages.length - 1) {
    currentPage = pages.length - 1;
  }

  if (currentPage < 0) {
    currentPage = 0;
  }

  showPage();
}

function getCharLimit() {
  if (fontSize <= 18) return 1200;
  if (fontSize <= 22) return 900;
  if (fontSize <= 26) return 700;
  return 500;
}

function showPage() {
  if (isMobile()) {
    leftPage.innerHTML = pages.join('');
    rightPage.innerHTML = '';
    pageInfo.innerText = '';
  } else {
    const leftIndex = currentPage;
    const rightIndex = currentPage + 1;

    leftPage.innerHTML = pages[leftIndex] || '';
    rightPage.innerHTML = pages[rightIndex] || '';

    pageInfo.innerText = `Page ${currentPage + 1} of ${pages.length}`;
  }

  localStorage.setItem('readerCurrentPage', currentPage);
  checkFinishButton();
}

function nextPage() {
  if (currentPage < pages.length - 1) {
    currentPage++;
    showPage();
  }
}

function prevPage() {
  if (currentPage > 0) {
    currentPage--;
    showPage();
  }
}

function increaseFont() {
  fontSize += 2;

  if (fontSize > 36) {
    fontSize = 36;
  }

  readerPages.style.fontSize = fontSize + 'px';
  localStorage.setItem('readerFontSize', fontSize);

  buildPages();
}

function decreaseFont() {
  fontSize -= 2;

  if (fontSize < 16) {
    fontSize = 16;
  }

  readerPages.style.fontSize = fontSize + 'px';
  localStorage.setItem('readerFontSize', fontSize);

  buildPages();
}

function setFont(type) {
  readerPages.classList.remove('font-serif', 'font-sans');

  if (type === 'sans') {
    readerPages.classList.add('font-sans');
  } else {
    readerPages.classList.add('font-serif');
  }

  localStorage.setItem('readerFont', type);
}

function applyTheme() {
  if (isDark) {
    body.className = 'bg-[#111] text-white h-screen overflow-hidden transition';

    header.className = 'fixed top-0 left-0 right-0 z-30 bg-[#111]/95 backdrop-blur px-3 py-3 md:px-8 md:py-5 flex flex-col md:flex-row md:justify-between md:items-center gap-3';

    toolbar.className = 'w-full md:w-auto flex items-center justify-between md:justify-center gap-2 md:gap-6 border border-gray-700 rounded-full px-4 md:px-7 py-3 bg-[#1c1c1c] text-white shadow-sm text-sm md:text-base';

    footer.className = 'fixed bottom-0 left-0 right-0 z-30 bg-[#111] text-white border-t border-gray-700 px-4 md:px-8 py-3 md:py-4';

    pagination.className = 'hidden md:flex items-center gap-4 border border-gray-700 px-5 md:px-8 py-3 rounded-full bg-[#1c1c1c] text-white';
  } else {
    body.className = 'bg-white text-black h-screen overflow-hidden transition';

    header.className = 'fixed top-0 left-0 right-0 z-30 bg-white/95 backdrop-blur px-3 py-3 md:px-8 md:py-5 flex flex-col md:flex-row md:justify-between md:items-center gap-3';

    toolbar.className = 'w-full md:w-auto flex items-center justify-between md:justify-center gap-2 md:gap-6 border rounded-full px-4 md:px-7 py-3 bg-white text-black shadow-sm text-sm md:text-base';

    footer.className = 'fixed bottom-0 left-0 right-0 z-30 bg-white text-black border-t px-4 md:px-8 py-3 md:py-4';

    pagination.className = 'hidden md:flex items-center gap-4 border px-5 md:px-8 py-3 rounded-full bg-white text-black';
  }

  const logo = header.querySelector('a');
  logo.className = 'text-2xl font-bold tracking-wide leading-none mx-auto md:mx-0';

  checkFinishButton();
}

function toggleTheme() {
  isDark = !isDark;

  localStorage.setItem(
    'readerTheme',
    isDark ? 'dark' : 'light'
  );

  applyTheme();
}

function highlightText() {
  const selection = window.getSelection();

  if (!selection.rangeCount || selection.toString().trim() === '') {
    openModal('Teks belum dipilih', 'Blok bagian teks yang ingin diberi highlight terlebih dahulu.');
    return;
  }

  const range = selection.getRangeAt(0);
  const mark = document.createElement('mark');

  mark.className = 'bg-yellow-300 text-black px-1 rounded';

  mark.appendChild(range.extractContents());
  range.insertNode(mark);

  selection.removeAllRanges();
}

function checkFinishButton() {
  if (isMobile()) {
    if (mobileFinished) {
      finishButton.disabled = false;

      finishButton.className = isDark
        ? 'w-full md:w-auto md:absolute md:right-0 border border-gray-700 px-6 py-3 rounded-full text-white bg-[#1c1c1c] hover:bg-[#2a2a2a] transition'
        : 'w-full md:w-auto md:absolute md:right-0 border px-6 py-3 rounded-full text-black bg-white hover:bg-gray-100 transition';
    } else {
      finishButton.disabled = true;

      finishButton.className = isDark
        ? 'w-full md:w-auto md:absolute md:right-0 border border-gray-700 px-6 py-3 rounded-full text-gray-500 bg-[#1c1c1c] cursor-not-allowed'
        : 'w-full md:w-auto md:absolute md:right-0 border px-6 py-3 rounded-full text-gray-400 bg-white cursor-not-allowed';
    }

    return;
  }

  if (currentPage >= pages.length - 2) {
    finishButton.disabled = false;

    finishButton.className = isDark
      ? 'hidden md:block md:absolute md:right-0 border border-gray-700 px-6 py-3 rounded-full text-white bg-[#1c1c1c] hover:bg-[#2a2a2a] transition'
      : 'hidden md:block md:absolute md:right-0 border px-6 py-3 rounded-full text-black bg-white hover:bg-gray-100 transition';
  } else {
    finishButton.disabled = true;

    finishButton.className = isDark
      ? 'hidden md:block md:absolute md:right-0 border border-gray-700 px-6 py-3 rounded-full text-gray-500 bg-[#1c1c1c] cursor-not-allowed'
      : 'hidden md:block md:absolute md:right-0 border px-6 py-3 rounded-full text-gray-400 bg-white cursor-not-allowed';
  }
}
let redirectAfterModal = false;

function finishReading() {
  if (finishButton.disabled) return;

  redirectAfterModal = true;

  openModal(
    'Selesai Dibaca',
    'Buku ini sudah ditandai sebagai selesai dibaca.'
  );
}

function closeModal() {
  modal.classList.add('hidden');
  modal.classList.remove('flex');

  if (redirectAfterModal) {
    window.location.href = '/';
  }
}

readerMain.addEventListener('scroll', () => {
  if (!isMobile()) return;

  const scrollBottom =
    readerMain.scrollTop + readerMain.clientHeight >= readerMain.scrollHeight - 80;

  if (scrollBottom) {
    mobileFinished = true;
    checkFinishButton();
  }
});

window.addEventListener('resize', () => {
  buildPages();
});

window.onload = () => {
  const savedSize = localStorage.getItem('readerFontSize');
  const savedFont = localStorage.getItem('readerFont');
  const savedPage = localStorage.getItem('readerCurrentPage');
  const savedTheme = localStorage.getItem('readerTheme');

  if (savedSize) {
    fontSize = parseInt(savedSize);
    readerPages.style.fontSize = fontSize + 'px';
  }

  if (savedFont) {
    setFont(savedFont);
  }

  if (savedPage) {
    currentPage = parseInt(savedPage);
  }

  if (savedTheme === 'dark') {
    isDark = true;
  }

  buildPages();
  applyTheme();
};
</script>

</body>
</html>