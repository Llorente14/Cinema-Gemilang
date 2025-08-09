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

function toggleVignette() {
    const vignette = document.querySelector(".hero-vignette");
    if (vignette) {
        vignette.classList.remove("fade-out");
    }
}
