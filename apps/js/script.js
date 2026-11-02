// Hamburger Menu Toggle
const menuToggle = document.getElementById("menu-toggle");
const mainNav = document.getElementById("main-nav");

if (menuToggle && mainNav) {
    menuToggle.addEventListener("click", () => {
        const isHidden = mainNav.classList.toggle("max-[760px]:hidden");
        const isOpen = !isHidden;
        menuToggle.setAttribute("aria-expanded", String(isOpen));
    });

    mainNav.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", () => {
            mainNav.classList.add("max-[760px]:hidden");
            menuToggle.setAttribute("aria-expanded", "false");
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

        const icon = btn.querySelector("span");
        if (icon) {
            icon.textContent = isOpening ? "↙" : "↗";
        }
    });
});
