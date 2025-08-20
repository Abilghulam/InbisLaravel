document.addEventListener("DOMContentLoaded", () => {
    const catalogCards = document.querySelectorAll(".catalog-card");

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        },
        { threshold: 0.2 },
    );

    catalogCards.forEach((card) => {
        card.classList.add("hidden");
        observer.observe(card);
    });
});
