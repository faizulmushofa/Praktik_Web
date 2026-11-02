<?php
$productsFile = __DIR__ . '/data/products.json';
$products = [];
if (file_exists($productsFile)) {
    $products = json_decode(file_get_contents($productsFile), true) ?: [];
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Kopi Nusantara menghadirkan biji kopi pilihan dari berbagai daerah Indonesia, diproses dengan penuh perhatian.">
    <title>Kopi Nusantara — Cerita Baik dari Setiap Seduhan</title>
    <link rel="stylesheet" href="dist/output.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-paper font-sans leading-[1.65] text-ink">

    <!-- HEADER -->
    <header
        class="flex min-h-[82px] items-center justify-between gap-7 border-b border-line bg-paper px-[clamp(22px,7vw,108px)] max-[760px]:flex-wrap max-[760px]:gap-3 max-[760px]:py-[14px]">

        <!-- Brand -->
        <a href="#beranda" aria-label="Kopi Nusantara, beranda"
            class="inline-flex items-center gap-2.5 whitespace-nowrap text-[16px] tracking-[-0.04em] text-ink no-underline">
            <span aria-hidden="true" class="grid size-[37px] place-items-center rounded-full bg-[#ede4d7]">
                <i data-lucide="coffee" class="size-4.5 text-coffee"></i>
            </span>
            <span>
                Kopi <strong class="font-bold">Nusantara</strong>
            </span>
        </a>

        <!-- Hamburger Button -->
        <button id="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Menu navigasi"
            class="hidden max-[760px]:flex justify-center items-center size-9 rounded border border-line bg-[#fcfaf6] cursor-pointer text-ink">
            <i data-lucide="menu" class="size-5"></i>
        </button>

        <!-- Navigation -->
        <nav id="main-nav" aria-label="Navigasi utama" class="max-[760px]:hidden max-[760px]:order-3 max-[760px]:w-full max-[760px]:border-t max-[760px]:border-line max-[760px]:pt-3">
            <ul class="flex list-none gap-[clamp(18px,3vw,42px)] max-[760px]:flex-col max-[760px]:gap-3">
                <li>
                    <a href="#beranda"
                        class="text-[13px] text-[#5f574e] no-underline transition-colors duration-200 hover:text-[#a1663c] max-[760px]:block max-[760px]:py-1">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="#tentang"
                        class="text-[13px] text-[#5f574e] no-underline transition-colors duration-200 hover:text-[#a1663c] max-[760px]:block max-[760px]:py-1">
                        Tentang Kami
                    </a>
                </li>
                <li>
                    <a href="#produk"
                        class="text-[13px] text-[#5f574e] no-underline transition-colors duration-200 hover:text-[#a1663c] max-[760px]:block max-[760px]:py-1">
                        Produk
                    </a>
                </li>
                <li>
                    <a href="#kontak"
                        class="text-[13px] text-[#5f574e] no-underline transition-colors duration-200 hover:text-[#a1663c] max-[760px]:block max-[760px]:py-1">
                        Kontak
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Header Button -->
        <a href="#produk"
            class="inline-flex items-center justify-center gap-2 rounded-[3px] border border-coffee bg-coffee px-[19px] py-[13px] text-[12px] font-semibold tracking-[0.02em] text-white no-underline transition duration-200 hover:-translate-y-0.5 hover:bg-coffee-dark max-[760px]:hidden">
            Jelajahi Produk
            <i data-lucide="arrow-up-right" class="size-3.5"></i>
        </a>
    </header>

    <main>
        <!-- HERO -->
        <section id="beranda"
            class="grid min-h-[570px] grid-cols-2 items-center gap-[8%] bg-cream px-[clamp(22px,10vw,150px)] pb-[76px] pt-[65px] max-[760px]:grid-cols-1 max-[760px]:gap-[38px] max-[760px]:pb-[55px] max-[760px]:pt-[58px]">

            <div class="max-w-[490px]">
                <p class="mb-5 flex items-center gap-[9px] text-[10px] font-bold uppercase tracking-[0.16em] text-[#8c6848]">
                    <span class="h-px w-[19px] bg-[#a77950]"></span>
                    Dari kebun lokal, untuk semua
                </p>

                <h1
                    class="mb-5 max-w-[500px] font-serif text-[clamp(42px,5.2vw,69px)] font-medium leading-[1.12] tracking-[-0.045em] max-[390px]:text-[40px]">
                    Merayakan cerita
                    <em class="font-medium not-italic text-[#936a49]">di setiap</em>
                    seduhan.
                </h1>

                <p class="mb-[26px] max-w-[440px] text-[14px] leading-[1.85] text-muted">
                    Kami membawa kekayaan rasa kopi Indonesia ke dalam cangkir Anda—dengan biji pilihan, proses yang
                    bertanggung jawab, dan penghormatan pada para petani.
                </p>

                <div
                    class="flex flex-wrap items-center gap-6 max-[390px]:flex-col max-[390px]:items-start max-[390px]:gap-[15px]">
                    <a href="#produk"
                        class="inline-flex items-center justify-center gap-2 rounded-[3px] border border-coffee bg-coffee px-[19px] py-[13px] text-[12px] font-semibold tracking-[0.02em] text-white no-underline transition duration-200 hover:-translate-y-0.5 hover:bg-coffee-dark">
                        Temukan Kopi Kami
                        <i data-lucide="arrow-right" class="size-3.5"></i>
                    </a>

                    <a href="#tentang"
                        class="border-b border-[#c5b5a4] pb-[3px] text-[12px] font-semibold text-coffee no-underline transition-colors duration-200 hover:text-[#a1663c]">
                        Kenali perjalanan kami
                    </a>
                </div>

                <div class="mt-11 flex items-center gap-2.5 text-[10px] uppercase tracking-[0.08em] text-[#81786e]">
                    <i data-lucide="sparkle" class="size-3.5 text-[#a87b52]"></i>
                    <span>100% biji kopi pilihan Indonesia</span>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="relative min-h-[390px] overflow-hidden bg-[#e6d6c1] max-[760px]:min-h-[340px]">
                <img src="../image/kopi-nusantara.jpg" alt="Foto secangkir kopi Nusantara"
                    class="block h-[390px] w-full object-cover max-[760px]:h-[340px]">
                <span class="absolute bottom-[19px] text-[8px] font-bold tracking-[0.17em] text-[#795f49]">
                    DIRACIK DENGAN HATI · SEJAK 2018
                </span>
            </div>
        </section>

        <!-- ABOUT -->
        <section id="tentang"
            class="grid grid-cols-2 gap-[10%] px-[clamp(22px,10vw,150px)] pb-24 pt-[100px] max-[760px]:grid-cols-1 max-[760px]:gap-[23px] max-[760px]:pb-[65px] max-[760px]:pt-[68px]">
            <div>
                <p class="mb-5 flex items-center gap-[9px] text-[10px] font-bold uppercase tracking-[0.16em] text-[#8c6848]">
                    Tentang Kopi Nusantara
                </p>
                <h2 class="font-serif text-[clamp(34px,4vw,48px)] font-medium leading-[1.2] tracking-[-0.045em]">
                    Lebih dari sekadar kopi.
                    <br>
                    <em class="font-medium not-italic text-[#936a49]">Sebuah hubungan.</em>
                </h2>
            </div>

            <div class="max-w-[490px] self-end">
                <p class="mb-[22px] text-[13px] leading-[1.9] text-muted">
                    Kopi Nusantara lahir dari kecintaan pada kopi Indonesia dan orang-orang di baliknya. Kami bekerja
                    bersama petani lokal untuk memilih biji terbaik, menjaga kualitas dari kebun hingga cangkir, dan
                    membagikan karakter unik setiap daerah.
                </p>
                <a href="#kontak"
                    class="inline-flex items-center gap-1.5 border-b border-[#c5b5a4] pb-[3px] text-[12px] font-semibold text-coffee no-underline transition-colors duration-200 hover:text-[#a1663c]">
                    Mari berkenalan <i data-lucide="arrow-right" class="size-3"></i>
                </a>
            </div>
        </section>

        <!-- VALUES -->
        <section aria-label="Keunggulan Kopi Nusantara"
            class="grid grid-cols-3 gap-[38px] border-y border-line bg-[#fcfaf6] px-[clamp(22px,10vw,150px)] py-[38px] max-[760px]:grid-cols-1 max-[760px]:gap-[25px]">
            <div class="relative pl-[39px]">
                <span class="absolute left-0 top-0.5 font-serif text-[14px] text-[#a37b59]">01</span>
                <h3 class="mb-1.5 font-serif text-[18px] font-medium">Asal yang jelas</h3>
                <p class="mb-0 max-w-[270px] text-[11px] leading-[1.7] text-muted">
                    Setiap biji punya cerita dan daerah asal yang kami kenal.
                </p>
            </div>

            <div class="relative pl-[39px]">
                <span class="absolute left-0 top-0.5 font-serif text-[14px] text-[#a37b59]">02</span>
                <h3 class="mb-1.5 font-serif text-[18px] font-medium">Dipilih dengan teliti</h3>
                <p class="mb-0 max-w-[270px] text-[11px] leading-[1.7] text-muted">
                    Kualitas rasa dijaga mulai dari panen hingga proses sangrai.
                </p>
            </div>

            <div class="relative pl-[39px]">
                <span class="absolute left-0 top-0.5 font-serif text-[14px] text-[#a37b59]">03</span>
                <h3 class="mb-1.5 font-serif text-[18px] font-medium">Bertumbuh bersama</h3>
                <p class="mb-0 max-w-[270px] text-[11px] leading-[1.7] text-muted">
                    Kemitraan yang saling mendukung dengan petani Indonesia.
                </p>
            </div>
        </section>

        <!-- PRODUCTS -->
        <section id="produk"
            class="px-[clamp(22px,10vw,150px)] pb-[105px] pt-[100px] max-[760px]:pb-[70px] max-[760px]:pt-[70px]">
            <div class="mb-9 flex items-end justify-between gap-[35px] max-[760px]:block">
                <div>
                    <p class="mb-[13px] flex items-center gap-[9px] text-[10px] font-bold uppercase tracking-[0.16em] text-[#8c6848]">
                        Kenali karakter rasanya
                    </p>
                    <h2 class="m-0 font-serif text-[clamp(34px,4vw,48px)] font-medium leading-[1.2] tracking-[-0.045em]">
                        Biji pilihan,
                        <em class="font-medium not-italic text-[#936a49]">cerita berbeda.</em>
                    </h2>
                </div>
                <p class="mb-1 max-w-[320px] text-[12px] leading-[1.8] text-muted max-[760px]:mt-4">
                    Dari rasa yang berani hingga seduhan yang lembut, temukan karakter kopi yang paling dekat dengan Anda.
                </p>
            </div>

            <!-- Product Grid -->
            <div id="product-container" class="grid grid-cols-3 gap-4 max-[760px]:grid-cols-1">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $item): 
                        $detailId = 'detail-' . strtolower(preg_replace('/\s+/', '-', $item['name']));
                        $bgClass = !empty($item['bg']) ? $item['bg'] : 'bg-[#f7f5ed]';
                    ?>
                    <article class="flex min-h-[260px] flex-col items-start border border-line <?= htmlspecialchars($bgClass) ?> p-6 max-[760px]:min-h-[230px]">
                        <div class="mb-[27px] flex w-full items-center justify-between">
                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="Foto kopi <?= htmlspecialchars($item['name']) ?>"
                                class="size-12 rounded-full object-cover">
                            <span class="text-[9px] uppercase tracking-[0.12em] text-[#827568]"><?= htmlspecialchars($item['class']) ?></span>
                        </div>
                        <h3 class="mb-2 font-serif text-[24px] font-medium"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="mb-[19px] max-w-[260px] text-[11px] leading-[1.75] text-muted">
                            <?= htmlspecialchars($item['description']) ?>
                        </p>
                        <p id="<?= $detailId ?>" class="mb-4 hidden text-[11px] leading-[1.75] text-muted">
                            <?= htmlspecialchars($item['detail']) ?>
                        </p>
                        <button type="button" aria-expanded="false" aria-controls="<?= $detailId ?>" data-toggle
                            class="mt-auto flex w-full cursor-pointer items-center justify-between border-t border-[rgba(92,72,52,0.18)] bg-transparent pt-3 text-left text-[10px] font-semibold text-coffee">
                            <span>Pelajari lebih lanjut</span>
                            <i data-lucide="arrow-up-right" class="size-3.5 transition-transform duration-200"></i>
                        </button>
                    </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 flex flex-col items-center justify-center gap-3 rounded border border-line bg-[#fbf8f2] p-8 text-center">
                        <i data-lucide="alert-triangle" class="size-8 text-[#936a49]"></i>
                        <div class="space-y-1">
                            <h4 class="font-serif text-lg font-medium text-ink">Gagal Memuat Produk</h4>
                            <p class="text-xs text-muted">Data produk tidak ditemukan atau kosong.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- CONTACT -->
        <section id="kontak"
            class="flex items-center justify-between gap-6 bg-coffee-dark px-[clamp(22px,10vw,150px)] py-14 text-white max-[760px]:flex-col max-[760px]:items-start max-[760px]:py-[45px]">
            <div>
                <p class="mb-3 flex items-center gap-[9px] text-[10px] font-bold uppercase tracking-[0.16em] text-[#d7b694]">
                    Ada cerita yang ingin dibagi?
                </p>
                <h2 class="font-serif text-[clamp(30px,4vw,43px)] font-medium leading-[1.2] tracking-[-0.045em]">
                    Secangkir kopi selalu
                    <br>
                    punya awal yang baik.
                </h2>
            </div>
            <a href="mailto:halo@kopinusantara.id"
                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-[3px] border border-[#e3d2be] bg-transparent px-[19px] py-[13px] text-[12px] font-semibold tracking-[0.02em] text-[#fffaf3] no-underline transition duration-200 hover:bg-white/10">
                Hubungi kami <i data-lucide="arrow-up-right" class="size-3.5"></i>
            </a>
        </section>
    </main>

    <!-- FOOTER -->
    <footer
        class="flex items-center justify-between gap-5 px-[clamp(22px,7vw,108px)] py-6 text-[#83796e] max-[760px]:flex-wrap">
        <a href="#beranda"
            class="inline-flex items-center gap-2.5 whitespace-nowrap text-[16px] tracking-[-0.04em] text-ink no-underline">
            <span class="grid size-[37px] place-items-center rounded-full bg-[#ede4d7]" aria-hidden="true">
                <i data-lucide="coffee" class="size-4.5 text-coffee"></i>
            </span>
            <span>
                Kopi <strong class="font-bold">Nusantara</strong>
            </span>
        </a>
        <p class="text-[10px] max-[760px]:order-3 max-[760px]:w-full">
            Merayakan kopi Indonesia, satu cangkir pada satu waktu.
        </p>
        <span class="text-[10px]">© 2026 Kopi Nusantara</span>
    </footer>

    <script src="js/script.js" defer></script>
</body>

</html>
