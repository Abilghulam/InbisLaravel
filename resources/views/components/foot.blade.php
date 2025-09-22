<!-- Scroll to Top Button -->
<button class="scroll-top" id="scrollTop">
    <svg class="w-[32px] h-[32px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
    </svg>
</button>

<script src="{{ asset('js/script.js') }}"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 3.3,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
            },
            768: {
                slidesPerView: 2.3,
            },
            1024: {
                slidesPerView: 3.3,
            },
        },
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get("scroll") === "products") {
            const target = document.getElementById("products");
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth"
                });
            }
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    });
</script>
