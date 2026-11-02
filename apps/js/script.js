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

// Fetch & Render Products from JSON
async function loadProducts() {
    const container = document.getElementById("product-container");
    if (!container) return;

    // Loading State
    container.innerHTML = `
        <div class="col-span-3 flex items-center justify-center gap-2.5 py-12 text-sm text-muted">
            <i data-lucide="loader-2" class="size-5 animate-spin text-coffee"></i>
            <span>Memuat pilihan kopi...</span>
        </div>
    `;
    refreshIcons();

    try {
        const response = await fetch("data/products.json");
        if (!response.ok) throw new Error(`HTTP ${response.status}`);
        const products = await response.json();

        container.innerHTML = products.map((item) => {
            const detailId = `detail-${item.name.toLowerCase().replace(/\s+/g, "-")}`;
            const bgClass = item.bg || "bg-[#f7f5ed]";

            return `
                <article class="flex min-h-[260px] flex-col items-start border border-line ${bgClass} p-6 max-[760px]:min-h-[230px]">
                    <div class="mb-[27px] flex w-full items-center justify-between">
                        <img src="${item.image}" alt="Foto kopi ${item.name}"
                            class="size-12 rounded-full object-cover">
                        <span class="text-[9px] uppercase tracking-[0.12em] text-[#827568]">${item.class}</span>
                    </div>
                    <h3 class="mb-2 font-serif text-[24px] font-medium">${item.name}</h3>
                    <p class="mb-[19px] max-w-[260px] text-[11px] leading-[1.75] text-muted">
                        ${item.description}
                    </p>
                    <p id="${detailId}" class="mb-4 hidden text-[11px] leading-[1.75] text-muted">
                        ${item.detail}
                    </p>
                    <button type="button" aria-expanded="false" aria-controls="${detailId}" data-toggle
                        class="mt-auto flex w-full cursor-pointer items-center justify-between border-t border-[rgba(92,72,52,0.18)] bg-transparent pt-3 text-left text-[10px] font-semibold text-coffee">
                        <span>Pelajari lebih lanjut</span>
                        <i data-lucide="arrow-up-right" class="size-3.5 transition-transform duration-200"></i>
                    </button>
                </article>
            `;
        }).join("");

        // Attach Accordion Toggle Listeners
        container.querySelectorAll("[data-toggle]").forEach((btn) => {
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

        refreshIcons();
    } catch (error) {
        console.error("Gagal memuat produk:", error);
        container.innerHTML = `
            <div class="col-span-3 flex flex-col items-center justify-center gap-3 rounded border border-line bg-[#fbf8f2] p-8 text-center">
                <i data-lucide="alert-triangle" class="size-8 text-[#936a49]"></i>
                <div class="space-y-1">
                    <h4 class="font-serif text-lg font-medium text-ink">Gagal Memuat Produk</h4>
                    <p class="text-xs text-muted">Terjadi kesalahan saat mengambil data produk. Silakan coba lagi.</p>
                </div>
                <button type="button" id="retry-btn"
                    class="inline-flex cursor-pointer items-center gap-2 rounded-[3px] border border-coffee bg-coffee px-4 py-2 text-xs font-semibold text-white transition duration-200 hover:bg-coffee-dark">
                    <i data-lucide="refresh-cw" class="size-3.5"></i>
                    <span>Coba Lagi</span>
                </button>
            </div>
        `;
        refreshIcons();

        document.getElementById("retry-btn")?.addEventListener("click", loadProducts);
    }
}

// Inisialisasi awal
document.addEventListener("DOMContentLoaded", () => {
    refreshIcons();
    loadProducts();
});
