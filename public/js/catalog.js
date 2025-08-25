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
