// Render Lucide icons helper
function refreshIcons() {
    if (window.lucide) {
        window.lucide.createIcons();
    }
}

// Hamburger Menu Toggle
const menuToggle = document.getElementById("menu-toggle");
const mainNav = document.getElementById("main-nav");

if (menuToggle && mainNav) {
    menuToggle.addEventListener("click", () => {
        const isHidden = mainNav.classList.toggle("max-[760px]:hidden");
        const isOpen = !isHidden;
        menuToggle.setAttribute("aria-expanded", String(isOpen));
        menuToggle.innerHTML = `<i data-lucide="${isOpen ? 'x' : 'menu'}" class="size-5"></i>`;
        refreshIcons();
    });

    mainNav.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", () => {
            mainNav.classList.add("max-[760px]:hidden");
            menuToggle.setAttribute("aria-expanded", "false");
            menuToggle.innerHTML = '<i data-lucide="menu" class="size-5"></i>';
            refreshIcons();
        });
    });
}

// Product Accordion Toggle
document.querySelectorAll("[data-toggle]").forEach((btn) => {
    btn.addEventListener("click", () => {
        const detail = document.getElementById(btn.getAttribute("aria-controls"));
        if (!detail) return;

        const isOpening = detail.classList.contains("hidden");
        detail.classList.toggle("hidden", !isOpening);
        btn.setAttribute("aria-expanded", String(isOpening));

        const icon = btn.querySelector("svg, i");
        if (icon) {
            icon.classList.toggle("rotate-90", isOpening);
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    refreshIcons();
});
