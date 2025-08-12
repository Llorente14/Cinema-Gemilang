document.addEventListener("DOMContentLoaded", () => {
    const checkbox = document.querySelector("#dark-toggle");
    const vignette = document.querySelector(".hero-vignette");

    if (!checkbox || !vignette) return;

    checkbox.addEventListener("change", () => {
        vignette.classList.add("fade-out");

        setTimeout(() => {
            vignette.classList.remove("fade-out");
        }, 300);
    });
});
document.addEventListener("DOMContentLoaded", () => {
    setTimeout(toggleVignette, 50);
});
const navbar = document.querySelector(".nav-vignette");
const navItem = document.querySelector(".nav-item");
let scrolled = false;

window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Trigger animasi saat scroll > 50px
    if (scrollTop > 50 && !scrolled) {
        navbar.classList.add("scrolled");
        navItem.classList.add("scrolled");
        scrolled = true;
    } else if (scrollTop <= 50 && scrolled) {
        navItem.classList.remove("scrolled");
        navbar.classList.remove("scrolled");
        scrolled = false;
    }
});

//List Movie
// Sort Button
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("btn-placeholder");
    if (!container) {
        return;
    }

    container.addEventListener("click", (e) => {
        const btn = e.target.closest("a");
        if (!btn) return;
        e.preventDefault();

        // Reset semua tombol ke light
        container.querySelectorAll("a").forEach((el) => {
            el.classList.remove("btn-sort-light");
            el.classList.add("btn-sort-dark");
        });

        // Aktifkan tombol yang diklik
        btn.classList.remove("btn-sort-dark");
        btn.classList.add("btn-sort-light");
    });
});

function toggleVignette() {
    const vignette = document.querySelector(".hero-vignette");
    if (vignette) {
        vignette.classList.remove("fade-out");
    }
}
