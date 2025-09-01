// Hero Section
const slider = document.querySelector(".hero-slider");
const slides = document.querySelectorAll(".slide");
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");
const dotsContainer = document.querySelector(".dots");

let index = 0;
let interval = setInterval(autoSlide, 4000);

// Buat dot sesuai jumlah slide
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

// Promo & Recommendation Scroll
document.addEventListener("DOMContentLoaded", () => {
    // Promo Section Scroll
    const promoWrapper = document.querySelector(".promo-wrapper");
    const promoScroll = promoWrapper.querySelector(".promo-scroll");
    const promoBtnLeft = promoWrapper.querySelector(".scroll-btn.left");
    const promoBtnRight = promoWrapper.querySelector(".scroll-btn.right");

    // Recommendation Section Scroll
    const recWrapper = document.querySelector(".recommendation-wrapper");
    const recScroll = recWrapper.querySelector(".recommendation-scroll");
    const recBtnLeft = recWrapper.querySelector(".scroll-btn.left");
    const recBtnRight = recWrapper.querySelector(".scroll-btn.right");

    // Latest Product Section Scroll
    const latestWrapper = document.querySelector(".latest-wrapper");
    const latestScroll = latestWrapper.querySelector(".latest-scroll");
    const latestBtnLeft = latestWrapper.querySelector(".scroll-btn.left");
    const latestBtnRight = latestWrapper.querySelector(".scroll-btn.right");

    const scrollAmount = 250;

    // Promo scroll buttons
    promoBtnLeft.addEventListener("click", () => {
        promoScroll.scrollBy({ left: -scrollAmount, behavior: "smooth" });
    });
    promoBtnRight.addEventListener("click", () => {
        promoScroll.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });

    // Recommendation scroll buttons
    recBtnLeft.addEventListener("click", () => {
        recScroll.scrollBy({ left: -scrollAmount, behavior: "smooth" });
    });
    recBtnRight.addEventListener("click", () => {
        recScroll.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });

    // Latest Product scroll buttons
    latestBtnLeft.addEventListener("click", () => {
        latestScroll.scrollBy({ left: -scrollAmount, behavior: "smooth" });
    });
    latestBtnRight.addEventListener("click", () => {
        latestScroll.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });
});

// Sidebar Filter, Sorting, Pagination, Modal Details + Brand Section Filter
document.addEventListener("DOMContentLoaded", () => {
    const products = Array.from(document.querySelectorAll(".product-card"));
    const grid = document.querySelector(".product-grid");
    const itemsPerPage = 15;
    let currentPage = 1;
    let filteredProducts = [...products];

    const paginationContainer = document.querySelector(".page-numbers");
    const prevBtn = document.querySelector(".prev-page");
    const nextBtn = document.querySelector(".next-page");

    // Sidebar filter elements
    const categoryCheckboxes = document.querySelectorAll(
        'input[data-type="category"]',
    );
    const brandCheckboxes = document.querySelectorAll(
        'input[data-type="brand"]',
    );
    const stockCheckboxes = document.querySelectorAll(
        'input[data-type="stock"]',
    );
    const minPriceInput = document.getElementById("minPrice");
    const maxPriceInput = document.getElementById("maxPrice");
    const sortRadios = document.querySelectorAll('input[name="sort"]');

    // Brand section filter
    const brandCards = document.querySelectorAll(".brand-card");
    let selectedBrand = null;

    // Clear All Filters Button
    const clearAllBtn = document.getElementById("clearAllFilters");
    if (clearAllBtn) {
        clearAllBtn.addEventListener("click", (e) => {
            e.preventDefault();

            // Reset kategori
            categoryCheckboxes.forEach((cb) => (cb.checked = false));

            // Reset brand (sidebar checkbox)
            brandCheckboxes.forEach((cb) => (cb.checked = false));

            // Reset stok
            stockCheckboxes.forEach((cb) => (cb.checked = false));

            // Reset harga
            minPriceInput.value = "";
            maxPriceInput.value = "";

            // Reset sorting ke default
            document.querySelector(
                'input[name="sort"][value="default"]',
            ).checked = true;

            // Reset brand-card section
            selectedBrand = null;
            brandCards.forEach((c) => c.classList.remove("active"));

            // Terapkan ulang filter
            applyFilters();
        });
    }

    // ===== RENDER GRID ULANG =====
    function renderGrid() {
        grid.innerHTML = "";
        filteredProducts.forEach((p) => grid.appendChild(p));
    }

    // ===== FILTER & SORT =====
    function applyFilters() {
        const selectedCategories = Array.from(categoryCheckboxes)
            .filter((cb) => cb.checked)
            .map((cb) => cb.value);

        const selectedBrands = Array.from(brandCheckboxes)
            .filter((cb) => cb.checked)
            .map((cb) => cb.value.toLowerCase());

        const selectedStocks = Array.from(stockCheckboxes)
            .filter((cb) => cb.checked)
            .map((cb) => cb.value.toLowerCase());

        const minPrice = minPriceInput.value
            ? parseInt(minPriceInput.value)
            : 0;
        const maxPrice = maxPriceInput.value
            ? parseInt(maxPriceInput.value)
            : Infinity;
        const sortValue =
            document.querySelector('input[name="sort"]:checked')?.value ||
            "default";

        // filter
        filteredProducts = products.filter((p) => {
            const category = p.dataset.category;
            const brand = p.dataset.brand ? p.dataset.brand.toLowerCase() : "";
            const price = parseInt(
                p.querySelector(".price").textContent.replace(/[^\d]/g, ""),
            );
            const stock = p.dataset.stock ? p.dataset.stock.toLowerCase() : "";

            const matchCategory =
                selectedCategories.length === 0 ||
                selectedCategories.includes(category);
            const matchBrand =
                (selectedBrands.length === 0 ||
                    selectedBrands.includes(brand)) &&
                (!selectedBrand || brand === selectedBrand); // tambahan untuk brand-card
            const matchPrice = price >= minPrice && price <= maxPrice;
            const matchStock =
                selectedStocks.length === 0 || selectedStocks.includes(stock);

            return matchCategory && matchBrand && matchPrice && matchStock;
        });

        // sort
        if (sortValue === "price-asc") {
            filteredProducts.sort((a, b) => {
                const pa = parseInt(
                    a.querySelector(".price").textContent.replace(/[^\d]/g, ""),
                );
                const pb = parseInt(
                    b.querySelector(".price").textContent.replace(/[^\d]/g, ""),
                );
                return pa - pb;
            });
        } else if (sortValue === "price-desc") {
            filteredProducts.sort((a, b) => {
                const pa = parseInt(
                    a.querySelector(".price").textContent.replace(/[^\d]/g, ""),
                );
                const pb = parseInt(
                    b.querySelector(".price").textContent.replace(/[^\d]/g, ""),
                );
                return pb - pa;
            });
        } else if (sortValue === "newest") {
            filteredProducts.sort((a, b) => {
                const da = new Date(a.dataset.date || 0);
                const db = new Date(b.dataset.date || 0);
                return db - da;
            });
        }
        // default = urutan HTML

        renderGrid();
        currentPage = 1;
        showPage();
    }

    // ===== PAGINATION =====
    function renderPagination(totalItems) {
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

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages || totalPages === 0;
    }

    function showPage() {
        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        filteredProducts.forEach((p, i) => {
            p.style.display = i >= start && i < end ? "block" : "none";
        });

        renderPagination(filteredProducts.length);
    }

    // ===== MODAL VIEW DETAILS =====
    const modal = document.getElementById("productModal");
    const closeBtn = document.querySelector(".close-btn");

    const modalImage = document.getElementById("modalProductImage");
    const modalTitle = document.getElementById("modalProductTitle");
    const modalPrice = document.getElementById("modalProductPrice");
    const modalSpecs = document.getElementById("modalProductSpecs");
    const modalStock = document.getElementById("modalProductStock");

    document.querySelectorAll(".btn-detail").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const card = e.target.closest(".product-card");
            const imgSrc = card.querySelector("img").src;
            const title = card.querySelector("h3").textContent;
            const price = card.querySelector(".price").textContent;
            const specs =
                card.dataset.specs || "Spesifikasi produk belum tersedia.";
            const stock = card.dataset.stock || "tersedia";

            modalImage.src = imgSrc;
            modalTitle.textContent = title;
            modalPrice.textContent = price;
            modalSpecs.innerHTML = `<p>${specs}</p>`;
            modalStock.textContent =
                stock.toLowerCase() === "habis"
                    ? "Stok Habis"
                    : "Stok Tersedia";

            modal.style.display = "block";
        });
    });

    closeBtn.addEventListener("click", () => (modal.style.display = "none"));
    window.addEventListener("click", (e) => {
        if (e.target === modal) modal.style.display = "none";
    });

    // ===== EVENT LISTENERS =====
    categoryCheckboxes.forEach((cb) =>
        cb.addEventListener("change", applyFilters),
    );
    brandCheckboxes.forEach((cb) =>
        cb.addEventListener("change", applyFilters),
    );
    stockCheckboxes.forEach((cb) =>
        cb.addEventListener("change", applyFilters),
    );
    minPriceInput.addEventListener("input", applyFilters);
    maxPriceInput.addEventListener("input", applyFilters);
    sortRadios.forEach((radio) =>
        radio.addEventListener("change", applyFilters),
    );

    prevBtn.addEventListener("click", () => {
        if (currentPage > 1) {
            currentPage--;
            showPage();
        }
    });

    nextBtn.addEventListener("click", () => {
        const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            showPage();
        }
    });

    // ===== BRAND CARD FILTER EVENT =====
    brandCards.forEach((card) => {
        card.addEventListener("click", (e) => {
            e.preventDefault();
            const brand = card.getAttribute("data-brand").toLowerCase();

            selectedBrand = selectedBrand === brand ? null : brand;

            // highlight UI
            brandCards.forEach((c) => c.classList.remove("active"));
            if (selectedBrand) card.classList.add("active");

            applyFilters();
        });
    });

    // ===== INIT =====
    applyFilters(); // jalankan pertama kali
});

// Close modal
closeBtn.addEventListener("click", () => (modal.style.display = "none"));
window.addEventListener("click", (e) => {
    if (e.target === modal) modal.style.display = "none";
});

// Sidebar Toggle
function toggleFilter(header) {
    const group = header.parentElement;
    group.classList.toggle("collapsed");
}
