// ========================
// HERO SLIDER
// ========================
const slider = document.querySelector(".hero-slider");
const slides = document.querySelectorAll(".slide");
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");
const dotsContainer = document.querySelector(".dots");

if (slider && slides.length > 0 && prevBtn && nextBtn && dotsContainer) {
    let index = 0;
    let interval = setInterval(autoSlide, 4000);

    // Buat dot
    slides.forEach((_, i) => {
        const dot = document.createElement("div");
        dot.classList.add("dot");
        if (i === 0) dot.classList.add("active");
        dot.addEventListener("click", () => goToSlide(i));
        dotsContainer.appendChild(dot);
    });

    const dots = document.querySelectorAll(".dot");

    function updateSlide() {
        slider.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach((dot) => dot.classList.remove("active"));
        dots[index].classList.add("active");
    }

    function nextSlide() {
        index = (index + 1) % slides.length;
        updateSlide();
    }

    function prevSlide() {
        index = (index - 1 + slides.length) % slides.length;
        updateSlide();
    }

    function goToSlide(i) {
        index = i;
        updateSlide();
        resetInterval();
    }

    function autoSlide() {
        nextSlide();
    }

    function resetInterval() {
        clearInterval(interval);
        interval = setInterval(autoSlide, 4000);
    }

    nextBtn.addEventListener("click", () => {
        nextSlide();
        resetInterval();
    });

    prevBtn.addEventListener("click", () => {
        prevSlide();
        resetInterval();
    });
}

// ========================
// PROMO, RECOMMENDATION & LATEST SLIDER
// ========================
function initScroll(
    wrapperSelector,
    scrollSelector,
    btnLeftSelector,
    btnRightSelector,
) {
    const wrapper = document.querySelector(wrapperSelector);
    if (!wrapper) return; // kalau wrapper tidak ada, stop

    const scroll = wrapper.querySelector(scrollSelector);
    const btnLeft = wrapper.querySelector(btnLeftSelector);
    const btnRight = wrapper.querySelector(btnRightSelector);

    if (!scroll || !btnLeft || !btnRight) return; // cegah error kalau elemen tidak ada

    const scrollAmount = 250;

    btnLeft.addEventListener("click", () => {
        scroll.scrollBy({ left: -scrollAmount, behavior: "smooth" });
    });

    btnRight.addEventListener("click", () => {
        scroll.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });
}

// Jalankan hanya kalau sectionnya ada
initScroll(
    ".promo-wrapper",
    ".promo-scroll",
    ".scroll-btn.left",
    ".scroll-btn.right",
);
initScroll(
    ".recommendation-wrapper",
    ".recommendation-scroll",
    ".scroll-btn.left",
    ".scroll-btn.right",
);
initScroll(
    ".latest-wrapper",
    ".latest-scroll",
    ".scroll-btn.left",
    ".scroll-btn.right",
);

// ========================
// FILTER, SORT, PAGINATION
// ========================
const products = Array.from(document.querySelectorAll(".product-card"));
const grid = document.querySelector(".product-grid");
//const itemsPerPage = 15;
//let currentPage = 1;
let filteredProducts = [...products];

// Filter elements
const categoryCheckboxes = document.querySelectorAll(
    'input[data-type="category"]',
);
const brandCheckboxes = document.querySelectorAll('input[data-type="brand"]');
const levelCheckboxes = document.querySelectorAll('input[data-type="level"]');
const stockCheckboxes = document.querySelectorAll('input[data-type="stock"]');
const minPriceInput = document.getElementById("minPrice");
const maxPriceInput = document.getElementById("maxPrice");
const sortRadios = document.querySelectorAll('input[name="sort"]');

// Brand card filter
const brandCards = document.querySelectorAll(".brand-card");
let selectedBrand = null;

/* Pagination elements
const paginationContainer = document.querySelector(".pagination");
const prevPageBtn = document.getElementById("prevPage");
const nextPageBtn = document.getElementById("nextPage");
*/

// Clear All Filters
const clearAllBtn = document.getElementById("clearAllFilters");
if (clearAllBtn) {
    clearAllBtn.addEventListener("click", (e) => {
        e.preventDefault();
        categoryCheckboxes.forEach((cb) => (cb.checked = false));
        brandCheckboxes.forEach((cb) => (cb.checked = false));
        levelCheckboxes.forEach((cb) => (cb.checked = false));
        stockCheckboxes.forEach((cb) => (cb.checked = false));
        if (minPriceInput) minPriceInput.value = "";
        if (maxPriceInput) maxPriceInput.value = "";
        const defaultSort = document.querySelector(
            'input[name="sort"][value="default"]',
        );
        if (defaultSort) defaultSort.checked = true;
        selectedBrand = null;
        brandCards.forEach((c) => c.classList.remove("active"));
        applyFilters();
    });
}

function renderGrid(items = filteredProducts) {
    if (!grid) return;
    grid.innerHTML = "";
    items.forEach((p) => grid.appendChild(p));
}

function applyFilters() {
    const selectedCategories = Array.from(categoryCheckboxes)
        .filter((cb) => cb.checked)
        .map((cb) => cb.value.toLowerCase());
    const selectedBrands = Array.from(brandCheckboxes)
        .filter((cb) => cb.checked)
        .map((cb) => cb.value.toLowerCase());
    const selectedLevels = Array.from(levelCheckboxes)
        .filter((cb) => cb.checked)
        .map((cb) => cb.value.toLowerCase());
    const selectedStocks = Array.from(stockCheckboxes)
        .filter((cb) => cb.checked)
        .map((cb) => cb.value.toLowerCase());

    const minPrice = minPriceInput?.value ? parseInt(minPriceInput.value) : 0;
    const maxPrice = maxPriceInput?.value
        ? parseInt(maxPriceInput.value)
        : Infinity;
    const sortValue =
        document.querySelector('input[name="sort"]:checked')?.value ||
        "default";

    filteredProducts = products.filter((p) => {
        const category = p.dataset.category?.toLowerCase() || "";
        const brand = p.dataset.brand?.toLowerCase() || "";
        const level = p.dataset.level?.toLowerCase() || "";
        const price =
            parseInt(
                p
                    .querySelector(".price, .new-price")
                    ?.textContent.replace(/[^\d]/g, ""),
            ) || 0;
        const stock = p.dataset.stock?.toLowerCase() || "";

        const matchCategory =
            selectedCategories.length === 0 ||
            selectedCategories.includes(category);
        const matchBrand =
            (selectedBrands.length === 0 || selectedBrands.includes(brand)) &&
            (!selectedBrand || brand === selectedBrand);
        const matchLevel =
            selectedLevels.length === 0 || selectedLevels.includes(level);
        const matchPrice = price >= minPrice && price <= maxPrice;
        const matchStock =
            selectedStocks.length === 0 || selectedStocks.includes(stock);

        return (
            matchCategory &&
            matchBrand &&
            matchLevel &&
            matchPrice &&
            matchStock
        );
    });

    // Sorting
    if (sortValue === "price-asc") {
        filteredProducts.sort((a, b) => {
            const pa =
                parseInt(
                    a
                        .querySelector(".price, .new-price")
                        ?.textContent.replace(/[^\d]/g, ""),
                ) || 0;
            const pb =
                parseInt(
                    b
                        .querySelector(".price, .new-price")
                        ?.textContent.replace(/[^\d]/g, ""),
                ) || 0;
            return pa - pb;
        });
    } else if (sortValue === "price-desc") {
        filteredProducts.sort((a, b) => {
            const pa =
                parseInt(
                    a
                        .querySelector(".price, .new-price")
                        ?.textContent.replace(/[^\d]/g, ""),
                ) || 0;
            const pb =
                parseInt(
                    b
                        .querySelector(".price, .new-price")
                        ?.textContent.replace(/[^\d]/g, ""),
                ) || 0;
            return pb - pa;
        });
    } else if (sortValue === "newest") {
        filteredProducts.sort((a, b) => {
            const da = new Date(a.dataset.date || 0);
            const db = new Date(b.dataset.date || 0);
            return db - da;
        });
    }

    renderGrid(filteredProducts);
}

/*function renderPagination(totalItems) {
    if (!paginationContainer) return;
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    paginationContainer.innerHTML = "";

    for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement("button");
        btn.textContent = i;
        btn.classList.toggle("active", i === currentPage);
        btn.addEventListener("click", () => {
            currentPage = i;
            showPage();
        });
        paginationContainer.appendChild(btn);
    }

    if (prevPageBtn) prevPageBtn.disabled = currentPage === 1;
    if (nextPageBtn)
        nextPageBtn.disabled = currentPage === totalPages || totalPages === 0;
}

function showPage() {
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;

    filteredProducts.forEach((p, i) => {
        p.style.display = i >= start && i < end ? "block" : "none";
    });

    renderPagination(filteredProducts.length);
}*/

// Event listeners filter
categoryCheckboxes.forEach((cb) => cb.addEventListener("change", applyFilters));
brandCheckboxes.forEach((cb) => cb.addEventListener("change", applyFilters));
levelCheckboxes.forEach((cb) => cb.addEventListener("change", applyFilters));
stockCheckboxes.forEach((cb) => cb.addEventListener("change", applyFilters));
if (minPriceInput) minPriceInput.addEventListener("input", applyFilters);
if (maxPriceInput) maxPriceInput.addEventListener("input", applyFilters);
sortRadios.forEach((radio) => radio.addEventListener("change", applyFilters));

// Brand card filter
brandCards.forEach((card) => {
    card.addEventListener("click", (e) => {
        e.preventDefault();
        const brand = card.getAttribute("data-brand").toLowerCase();
        selectedBrand = selectedBrand === brand ? null : brand;
        brandCards.forEach((c) => c.classList.remove("active"));
        if (selectedBrand) card.classList.add("active");
        applyFilters();
    });
});

console.log("✅ catalog.js loaded");

// ========================
// MODAL VIEW DETAILS
// ========================

// Pastikan untuk mengganti ini dengan nomor WhatsApp Anda yang sebenarnya
const WHATSAPP_NUMBER = "085102860099"; // Contoh: Gunakan format internasional tanpa tanda (+) atau spasi.

const modal = document.getElementById("productModal");

if (modal) {
    const modalImage = document.getElementById("modalProductImage");
    const modalTitle = document.getElementById("modalProductTitle");
    const modalOldPrice = document.getElementById("modalProductOldPrice");
    const modalPrice = document.getElementById("modalProductPrice");
    const modalLevel = document.getElementById("modalProductLevel");
    const modalStock = document.getElementById("modalProductStock");
    const modalSpecs = document.getElementById("modalProductSpecs");
    const modalDiscount = document.getElementById("modalProductDiscount"); // ✅ tambahkan badge diskon

    // ✅ Ambil elemen tombol WhatsApp
    const whatsappButton = document.getElementById("whatsappButton"); 

    // Event delegation → jalan di catalog & search
    document.addEventListener("click", (e) => {
        const btn = e.target.closest(".btn-detail");
        if (!btn) return;

        const card = btn.closest(
            ".product-card, .recommendation-card, .promo-card, .latest-card",
        );
        if (!card) return;

        // Isi modal
        const productName = card.dataset.name || "";
        modalImage.src = card.dataset.image || "";
        modalTitle.textContent = productName;

        // === Harga & Diskon ===
        let productPriceText = ""; // Untuk digunakan di pesan WA
        if (card.classList.contains("promo-card")) {
            // ... (Kode pengisian harga dan diskon Anda di sini)
            const oldVal = card.dataset.oldPrice?.trim();
            const price = Number(card.dataset.price) || 0;

            if (oldVal && Number(oldVal) > price) {
                modalOldPrice.textContent = `Rp ${Number(oldVal).toLocaleString("id-ID")}`;
                modalOldPrice.style.display = "block";

                modalPrice.textContent = `Rp ${price.toLocaleString("id-ID")}`;
                productPriceText = `(Harga Promosi: Rp ${price.toLocaleString("id-ID")})`;

                if (modalDiscount) {
                    const discount = Math.round(
                        ((Number(oldVal) - price) / Number(oldVal)) * 100,
                    );
                    modalDiscount.textContent = `-${discount}%`;
                    modalDiscount.style.display = "inline-block";
                }
            } else {
                modalOldPrice.textContent = "";
                modalOldPrice.style.display = "none";
                if (modalDiscount) modalDiscount.style.display = "none";
                productPriceText = "";
            }
        } else {
            // Produk biasa
            modalOldPrice.textContent = "";
            modalOldPrice.style.display = "none";
            if (modalDiscount) modalDiscount.style.display = "none";

            const label = card.dataset.priceLabel?.trim();
            const raw = card.dataset.price?.trim();
            
            // Simpan label harga atau harga numerik untuk pesan WA
            productPriceText = label || (raw ? `(Harga: Rp ${Number(raw).toLocaleString("id-ID")})` : "");

            modalPrice.textContent =
                label ||
                (raw ? `Rp ${Number(raw).toLocaleString("id-ID")}` : "");
        }

        // Level
        modalLevel.textContent = card.dataset.level
            ? card.dataset.level
                  .split(" ")
                  .map((w) => w.charAt(0).toUpperCase() + w.slice(1))
                  .join(" ")
            : "";

        // Stok
        modalStock.textContent = card.dataset.stock
            ? ` ${card.dataset.stock.charAt(0).toUpperCase()}${card.dataset.stock.slice(1)}`
            : "";

        // Spesifikasi
        const specsElement = card.querySelector(".product-specs");
        if (modalSpecs && specsElement) {
            const specsArray = specsElement.textContent.split(",");
            modalSpecs.innerHTML =
                "<ul>" +
                specsArray.map((s) => `<li>${s.trim()}</li>`).join("") +
                "</ul>";
        } else if (modalSpecs) {
            modalSpecs.innerHTML = "";
        }

        // ======================================
        // ✅ FUNGSI WHATSAPP BARU
        // ======================================
        if (whatsappButton) {
            // Pesan otomatis yang akan dikirim
            const message = `Halo, saya ingin bertanya lebih lanjut tentang produk:\n\n*Nama Produk:* ${productName}\n*Harga:* ${productPriceText || 'Silakan sebutkan harganya'}\n\nApakah produk ini masih tersedia?`;
            
            // Encode pesan dan buat tautan
            const encodedMessage = encodeURIComponent(message);
            const whatsappLink = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodedMessage}`;
            
            // Set href tombol WhatsApp
            whatsappButton.href = whatsappLink;
        }
        // ======================================

        // Tampilkan modal
        modal.style.display = "block";
        modal.classList.add("is-open");
    });

    // Close (X)
    document.addEventListener("click", (e) => {
        if (e.target.matches(".close-btn")) {
            modal.style.display = "none";
            modal.classList.remove("is-open");
        }
    });

    // Klik backdrop
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
            modal.classList.remove("is-open");
        }
    });

    // ESC key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            modal.style.display = "none";
            modal.classList.remove("is-open");
        }
    });
}

// ========================
// SEARCH BOX CLEAR BUTTON
// ========================
const searchInput = document.getElementById("searchInput");
const clearBtn = document.getElementById("clearSearch");

if (clearBtn && searchInput) {
    clearBtn.addEventListener("click", () => {
        searchInput.value = "";
        searchInput.focus();
    });
}

// ========================
// INIT
// ========================
applyFilters();

// Hamburger Toogle
document.getElementById("hamburger-btn").addEventListener("click", function () {
    document.getElementById("nav-menu").classList.toggle("show");
});

// Sidebar Toggle
function toggleFilter(header) {
    const group = header.parentElement;
    group.classList.toggle("collapsed");
}

// Filter Toogle for Mobile
document.addEventListener("DOMContentLoaded", function () {
    const filterBtn = document.getElementById("filterBtn");
    const sidebar = document.querySelector(".sidebar");
    const overlay = document.createElement("div");
    overlay.classList.add("filter-overlay");
    document.body.appendChild(overlay);

    filterBtn.addEventListener("click", () => {
        sidebar.classList.add("active");
        overlay.classList.add("active");
    });

    overlay.addEventListener("click", () => {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
    });
});

// Dropdown Navigation Bar
function toggleDropdown() {
    const menu = document.getElementById("dropdownMenu");
    const link = document.querySelector(".dropdown > .nav-link");

    menu.classList.toggle("show");
    // toggle atribut aria-expanded
    const expanded = link.getAttribute("aria-expanded") === "true";
    link.setAttribute("aria-expanded", !expanded);
}
