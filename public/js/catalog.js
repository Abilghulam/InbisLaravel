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

// Product Section
// Filter & Sort
document.addEventListener("DOMContentLoaded", () => {
    const categorySelect = document.getElementById("category");
    const sortSelect = document.getElementById("sort");
    const products = document.querySelectorAll(".product-card");
    const grid = document.querySelector(".product-grid");

    // Filter
    categorySelect.addEventListener("change", () => {
        const category = categorySelect.value;
        products.forEach((product) => {
            if (category === "all" || product.dataset.category === category) {
                product.style.display = "block";
            } else {
                product.style.display = "none";
            }
        });
    });

    // Sort
    sortSelect.addEventListener("change", () => {
        const sortType = sortSelect.value;
        const productArray = Array.from(products);

        productArray.sort((a, b) => {
            const priceA = parseInt(
                a.querySelector(".price").textContent.replace(/[^\d]/g, ""),
            );
            const priceB = parseInt(
                b.querySelector(".price").textContent.replace(/[^\d]/g, ""),
            );

            if (sortType === "price-asc") return priceA - priceB;
            if (sortType === "price-desc") return priceB - priceA;
            return 0;
        });

        productArray.forEach((p) => grid.appendChild(p));
    });
});

// Pagination
document.addEventListener("DOMContentLoaded", () => {
    const categorySelect = document.getElementById("category");
    const sortSelect = document.getElementById("sort");
    const products = document.querySelectorAll(".product-card");
    const grid = document.querySelector(".product-grid");

    // Pagination setup
    const itemsPerPage = 15;
    let currentPage = 1;
    let filteredProducts = Array.from(products);

    const paginationContainer = document.querySelector(".page-numbers");
    const prevBtn = document.querySelector(".prev-page");
    const nextBtn = document.querySelector(".next-page");

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
        nextBtn.disabled = currentPage === totalPages;
    }

    function showPage() {
        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        filteredProducts.forEach((p, i) => {
            p.style.display = i >= start && i < end ? "block" : "none";
        });

        renderPagination(filteredProducts.length);
    }

    // Filter
    categorySelect.addEventListener("change", () => {
        const category = categorySelect.value;
        filteredProducts = Array.from(products).filter(
            (p) => category === "all" || p.dataset.category === category,
        );
        currentPage = 1;
        showPage();
    });

    // Sort
    sortSelect.addEventListener("change", () => {
        const sortType = sortSelect.value;
        filteredProducts.sort((a, b) => {
            const priceA = parseInt(
                a.querySelector(".price").textContent.replace(/[^\d]/g, ""),
            );
            const priceB = parseInt(
                b.querySelector(".price").textContent.replace(/[^\d]/g, ""),
            );
            if (sortType === "price-asc") return priceA - priceB;
            if (sortType === "price-desc") return priceB - priceA;
            return 0;
        });
        grid.innerHTML = "";
        filteredProducts.forEach((p) => grid.appendChild(p));
        currentPage = 1;
        showPage();
    });

    // Prev & Next button
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

    // Init
    showPage();
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

// Sidebar Toggle
function toggleFilter(header) {
    const group = header.parentElement;
    group.classList.toggle("collapsed");
}
