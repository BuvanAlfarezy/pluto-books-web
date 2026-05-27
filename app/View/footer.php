<!-- Footer -->
<footer class="relative bg-white border-t border-gray-200 overflow-hidden">

    <div class="max-w-7xl mx-auto px-6 md:px-12 py-12 relative z-10">

        <!-- Brand -->
        <div class="flex flex-col">

            <img src="/assets/img/logo.png" alt="Pluto Books" class="w-14 md:w-16">

            <p class="mt-5 text-sm leading-relaxed text-gray-500 max-w-md">
                Platform baca buku digital untuk eksplorasi ilmu,
                gagasan, dan pengembangan diri.
            </p>

        </div>

        <!-- Bottom -->
        <div class="mt-10 pt-6 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-4">

            <p class="text-sm text-gray-500">
                © 2026 Pluto Books. All rights reserved.
            </p>

            <p class="text-sm text-gray-400">
                Built for curious minds
            </p>

        </div>

    </div>

    <!-- Background -->
    <h1 class="
    hidden lg:block
    absolute
    -bottom-16
    right-10
    text-[180px]
    font-bold
    text-gray-100
    select-none
    pointer-events-none
  ">
        Pluto
    </h1>

</footer>

<script>
const filterCategory = document.getElementById('filterCategory');
const filterLanguage = document.getElementById('filterLanguage');
const searchBook = document.getElementById('searchBook');
const bookCards = Array.from(document.querySelectorAll('.book-card'));
const emptyState = document.getElementById('emptyState');
const loadMoreBtn = document.getElementById('loadMoreBtn');

let visibleLimit = 5;
const increment = 5;

function resetFilter() {
    filterCategory.value = '';
    filterLanguage.value = '';
    searchBook.value = '';
    visibleLimit = 5;
}

function getMatchedBooks() {
    const selectedCategory = filterCategory.value;
    const selectedLanguage = filterLanguage.value;
    const searchKeyword = searchBook.value.toLowerCase();

    return bookCards.filter(card => {
        const category = card.dataset.category;
        const language = card.dataset.language;
        const title = card.dataset.title;
        const author = card.dataset.author;

        const matchCategory = selectedCategory === '' || category === selectedCategory;
        const matchLanguage = selectedLanguage === '' || language === selectedLanguage;
        const matchSearch = title.includes(searchKeyword) || author.includes(searchKeyword);

        return matchCategory && matchLanguage && matchSearch;
    });
}

function filterBooks() {
    const matchedBooks = getMatchedBooks();

    bookCards.forEach(card => {
        card.classList.add('hidden');
    });

    matchedBooks.slice(0, visibleLimit).forEach(card => {
        card.classList.remove('hidden');
    });

    emptyState.classList.toggle('hidden', matchedBooks.length !== 0);

    if (matchedBooks.length > visibleLimit) {
        loadMoreBtn.classList.remove('hidden');
    } else {
        loadMoreBtn.classList.add('hidden');
    }
}

function applyFilterChange() {
    visibleLimit = 5;
    filterBooks();
}

window.addEventListener('pageshow', () => {
    resetFilter();
    filterBooks();
});

filterCategory.addEventListener('change', applyFilterChange);
filterLanguage.addEventListener('change', applyFilterChange);
searchBook.addEventListener('input', applyFilterChange);

loadMoreBtn.addEventListener('click', () => {
    visibleLimit += increment;
    filterBooks();
});
</script>

<!-- FAQ SCRIPT -->
<script>
document.querySelectorAll('.faq-item').forEach((item) => {

    const btn = item.querySelector('.faq-btn');
    const content = item.querySelector('.faq-content');
    const text = content.querySelector('p');
    const icon = item.querySelector('.faq-icon');

    btn.addEventListener('click', () => {

        const isOpen = content.classList.contains('open');

        if (isOpen) {

            content.style.maxHeight = '0px';

            content.classList.remove(
                'open',
                'opacity-100'
            );

            content.classList.add(
                'opacity-0'
            );

            text.classList.add('translate-y-3');
            text.classList.remove('translate-y-0');

            icon.classList.remove('rotate-45');

        } else {

            content.style.maxHeight =
                content.scrollHeight + 'px';

            content.classList.add(
                'open',
                'opacity-100'
            );

            content.classList.remove(
                'opacity-0'
            );

            text.classList.remove('translate-y-3');
            text.classList.add('translate-y-0');

            icon.classList.add('rotate-45');

        }

    });

});
</script>

</body>

</html>