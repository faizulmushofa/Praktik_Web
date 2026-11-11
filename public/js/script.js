// Helper: Render Lucide icons
function refreshIcons() {
    if (window.lucide) {
        window.lucide.createIcons();
    }
}

// Helper: Escape HTML
function escapeHtml(text) {
    if (!text) return "";
    return String(text)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

// Format Rupiah
function formatRupiah(number) {
    return "Rp " + Number(number).toLocaleString("id-ID");
}

// Slug generator for accordion IDs
function slugify(text) {
    return String(text || "")
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9]+/g, "-")
        .replace(/^-+|-+$/g, "");
}

// Fetch & render products from REST API
async function loadProducts() {
    const container = document.getElementById("product-container");
    if (!container) return;

    try {
        const response = await fetch("/api/products", {
            headers: {
                Accept: "application/json",
            },
        });

        if (!response.ok) {
            throw new Error(`HTTP error ${response.status}`);
        }

        const products = await response.json();

        if (!Array.isArray(products) || products.length === 0) {
            container.innerHTML = `
                <div class="col-span-3 flex flex-col items-center justify-center gap-3 rounded border border-line bg-[#fbf8f2] p-8 text-center">
                    <i data-lucide="alert-triangle" class="size-8 text-[#936a49]"></i>
                    <div class="space-y-1">
                        <h4 class="font-serif text-lg font-medium text-ink">Produk Kosong</h4>
                        <p class="text-xs text-muted">Belum ada daftar kopi yang tersedia.</p>
                    </div>
                </div>
            `;
            refreshIcons();
            return;
        }

        container.innerHTML = products
            .map((p) => {
                const detailId = "detail-" + slugify(p.name);
                const bg = p.bg || "bg-[#f7f5ed]";
                const image = p.image || "image/kopi-nusantara.jpg";
                const category = p.category || "Nusantara";
                const origin = p.origin
                    ? `<p class="mb-2 text-[10px] font-medium uppercase tracking-[0.08em] text-[#8c6848]">${escapeHtml(p.origin)}</p>`
                    : "";

                return `
                <article class="flex min-h-[280px] flex-col items-start border border-line ${escapeHtml(bg)} p-6 max-[760px]:min-h-[230px]">
                    <div class="mb-5 flex w-full items-center justify-between">
                        <img src="${escapeHtml(image)}" alt="Foto kopi ${escapeHtml(p.name)}"
                            class="size-12 rounded-full object-cover">
                        <div class="text-right">
                            <span class="block text-[9px] uppercase tracking-[0.12em] text-[#827568]">${escapeHtml(category)}</span>
                            <span class="text-[12px] font-semibold text-coffee">${formatRupiah(p.price)}</span>
                        </div>
                    </div>
                    <h3 class="mb-1 font-serif text-[24px] font-medium">${escapeHtml(p.name)}</h3>
                    ${origin}
                    <p class="mb-[19px] max-w-[260px] text-[11px] leading-[1.75] text-muted">
                        ${escapeHtml(p.description || "")}
                    </p>
                    <p id="${detailId}" class="mb-4 hidden text-[11px] leading-[1.75] text-muted">
                        ${escapeHtml(p.detail || "")}
                    </p>
                    <button type="button" aria-expanded="false" aria-controls="${detailId}" data-toggle
                        class="mt-auto flex w-full cursor-pointer items-center justify-between border-t border-[rgba(92,72,52,0.18)] bg-transparent pt-3 text-left text-[10px] font-semibold text-coffee">
                        <span>Pelajari lebih lanjut</span>
                        <i data-lucide="arrow-up-right" class="size-3.5 transition-transform duration-200"></i>
                    </button>
                </article>
            `;
            })
            .join("");

        refreshIcons();
    } catch (error) {
        console.error("Gagal memuat produk dari API:", error);
        container.innerHTML = `
            <div class="col-span-3 flex flex-col items-center justify-center gap-3 rounded border border-line bg-[#fbf8f2] p-8 text-center">
                <i data-lucide="alert-triangle" class="size-8 text-[#936a49]"></i>
                <div class="space-y-1">
                    <h4 class="font-serif text-lg font-medium text-ink">Gagal Memuat Produk</h4>
                    <p class="text-xs text-muted">Terjadi kesalahan saat memanggil API backend.</p>
                </div>
            </div>
        `;
        refreshIcons();
    }
}

// Global Event Delegation for Product Accordion
document.addEventListener("click", (e) => {
    const btn = e.target.closest("[data-toggle]");
    if (!btn) return;

    const detailId = btn.getAttribute("aria-controls");
    const detail = document.getElementById(detailId);
    if (!detail) return;

    const isOpening = detail.classList.contains("hidden");
    detail.classList.toggle("hidden", !isOpening);
    btn.setAttribute("aria-expanded", String(isOpening));

    const icon = btn.querySelector("svg, i");
    if (icon) {
        icon.classList.toggle("rotate-90", isOpening);
    }
});

// Hamburger Menu Toggle
const menuToggle = document.getElementById("menu-toggle");
const mainNav = document.getElementById("main-nav");

if (menuToggle && mainNav) {
    menuToggle.addEventListener("click", () => {
        const isHidden = mainNav.classList.toggle("max-[760px]:hidden");
        const isOpen = !isHidden;
        menuToggle.setAttribute("aria-expanded", String(isOpen));
        menuToggle.innerHTML = `<i data-lucide="${isOpen ? "x" : "menu"}" class="size-5"></i>`;
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

document.addEventListener("DOMContentLoaded", () => {
    refreshIcons();
    loadProducts();
});
