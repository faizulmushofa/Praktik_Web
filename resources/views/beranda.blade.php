<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Anom — Dari Kebun Desa. Langsung ke Cangkirmu.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    <style>
        body {
            background-color: #FBF9F5;
            color: #181512;
            font-family: "Plus Jakarta Sans", ui-sans-serif, system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        input[type="range"].anom-range {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 7px;
            border-radius: 9999px;
            background: linear-gradient(to right, #10B981 0%, #10B981 75%, #D97706 75%, #D97706 100%);
            outline: none;
            cursor: pointer;
            transition: background 0.15s ease;
        }
        input[type="range"].anom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 9999px;
            background: #FFFFFF;
            border: 2px solid #141413;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.2s ease;
        }
        input[type="range"].anom-range::-webkit-slider-thumb:hover {
            transform: scale(1.15);
            box-shadow: 0 0 14px rgba(255, 255, 255, 0.85);
        }
        input[type="range"].anom-range::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 9999px;
            background: #FFFFFF;
            border: 2px solid #141413;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.2s ease;
        }

        html.anom-anim-ready [data-reveal] {
            opacity: 0;
            transform: translate3d(0, 10px, 0);
            transition: opacity 680ms cubic-bezier(0.16, 1, 0.3, 1), transform 680ms cubic-bezier(0.16, 1, 0.3, 1);
            transition-delay: var(--reveal-delay, 0ms);
            will-change: opacity, transform;
        }
        html.anom-anim-ready [data-reveal].is-visible {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }

        html.anom-anim-ready [data-reveal-photo] {
            transform: scale(1.035);
            transform-origin: center center;
            transition: transform 900ms cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform;
        }
        html.anom-anim-ready .is-visible [data-reveal-photo],
        html.anom-anim-ready [data-reveal-photo].is-visible {
            transform: scale(1);
        }

        html.anom-anim-ready [data-reveal-line] {
            transform: scaleX(0);
            transform-origin: left center;
            transition: transform 760ms cubic-bezier(0.16, 1, 0.3, 1);
            transition-delay: var(--reveal-delay, 0ms);
            will-change: transform;
        }
        html.anom-anim-ready .is-visible [data-reveal-line],
        html.anom-anim-ready [data-reveal-line].is-visible {
            transform: scaleX(1);
        }

        @media (max-width: 767px) {
            html.anom-anim-ready [data-reveal] {
                transform: translate3d(0, 8px, 0);
                transition-duration: 460ms;
                transition-delay: 0ms !important;
            }
            html.anom-anim-ready [data-reveal-photo] {
                transform: scale(1.025);
                transition-duration: 640ms;
                transition-delay: 0ms !important;
            }
            html.anom-anim-ready [data-reveal-line] {
                transition-duration: 520ms;
                transition-delay: 0ms !important;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html.anom-anim-ready [data-reveal],
            html.anom-anim-ready [data-reveal-photo],
            html.anom-anim-ready [data-reveal-line] {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }
    </style>
    <script>
        if (!window.matchMedia || !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            document.documentElement.classList.add('anom-anim-ready');
        }
    </script>
</head>
<body class="min-h-screen bg-[#FBF9F5] text-[#181512]">

        <header class="sticky top-0 z-50 bg-[#F2F2F0]/95 backdrop-blur-sm border-b border-[#E5E5E3]">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between gap-4">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 group shrink-0 whitespace-nowrap">
                <span
                    class="w-8 h-8 rounded-full bg-[#1E1A17] flex items-center justify-center overflow-hidden transition-transform duration-200 group-hover:scale-105">
                    <svg class="w-full h-full p-0.5" viewBox="0 0 400 400" fill="none" role="img"
                        aria-label="Logo Nemu Kopi">
                        <g fill="none" stroke="#F7F5EC" stroke-width="10" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M229.5 32.6 A170 170 0 1 1 170.5 32.6" />
                            <path d="M217.9 143.2 A74 74 0 0 1 268.6 187.3" />
                            <path d="M182.1 143.2 A74 74 0 0 0 131.4 187.3" />
                            <path d="M226.1 110.2 A108 108 0 0 1 300.1 174.5" />
                            <path d="M173.9 110.2 A108 108 0 0 0 99.9 174.5" />
                            <path d="M232.9 83.0 A136 136 0 0 1 326.1 164.1" />
                            <path d="M167.1 83.0 A136 136 0 0 0 73.9 164.1" />
                            <path d="M200 140 C184 122 216 106 200 88 C184 70 216 56 200 40" />
                            <ellipse cx="200" cy="232" rx="42" ry="52" fill="#C8324F" stroke="none" />
                            <circle cx="200" cy="194" r="4.5" fill="#F7F5EC" stroke="none" />
                            <path d="M177 218 Q179 202 190 195" stroke="#1E1A17" stroke-width="4.2" />
                            <g>
                                <path d="M200 328 C205 280 260 228 330 222 C322 285 265 330 200 328 Z" fill="#1E1A17" />
                                <path d="M212 302 C235 275 265 255 298 245" />
                            </g>
                            <g transform="translate(400,0) scale(-1,1)">
                                <path d="M200 328 C205 280 260 228 330 222 C322 285 265 330 200 328 Z" fill="#1E1A17" />
                                <path d="M212 302 C235 275 265 255 298 245" />
                            </g>
                        </g>
                    </svg>
                </span>
                <span class="text-sm font-extrabold tracking-tight uppercase text-[#111111] whitespace-nowrap">
                    KOPI ANOM
                </span>
            </a>

            <nav class="hidden md:flex items-center gap-7" aria-label="Navigasi Utama">
                @foreach ($navLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="text-xs whitespace-nowrap shrink-0 pb-1 transition-colors {{ !empty($link['active']) ? 'font-bold text-[#111111] border-b-2 border-[#111111]' : 'font-medium text-[#5E5E5A] hover:text-[#111111] border-b-2 border-transparent' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="flex items-center gap-2.5 shrink-0">
                <a
                    href="#katalog"
                    class="inline-flex items-center gap-1.5 bg-[#111111] text-white text-xs font-semibold px-4 sm:px-5 py-2.5 rounded-full hover:bg-[#2A2A28] transition whitespace-nowrap shrink-0"
                >
                    <span>Pesan Sekarang</span>
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>

                <button
                    type="button"
                    id="mobile-menu-toggle"
                    aria-expanded="false"
                    aria-label="Buka menu navigasi"
                    class="md:hidden inline-flex items-center justify-center w-9 h-9 rounded-lg border border-[#E5E5E3] bg-white text-[#111111] hover:bg-[#F7F7F5] transition cursor-pointer"
                >
                    <svg id="mobile-icon-open" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>
                    </svg>
                    <svg id="mobile-icon-close" class="w-4 h-4 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu-panel" class="hidden md:hidden border-t border-[#E5E5E3] bg-[#F2F2F0] px-6 py-3 space-y-1">
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['href'] }}"
                    data-mobile-nav-link
                    class="block px-3 py-2 rounded-lg text-xs {{ !empty($link['active']) ? 'font-bold bg-white text-[#111111]' : 'font-medium text-[#5E5E5A] hover:bg-white hover:text-[#111111]' }} transition"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </header>

    <main>
                <section id="beranda" class="pt-10 pb-16 sm:pt-14 sm:pb-20 lg:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
                    <div class="lg:col-span-6">
                        <h1 class="text-[36px] sm:text-[48px] lg:text-[52px] font-extrabold leading-[1.05] tracking-tight text-[#181512] uppercase" data-reveal style="--reveal-delay: 0ms;">
                            DARI KEBUN DESA.<br>
                            LANGSUNG KE<br>
                            CANGKIRMU.
                        </h1>

                        <p class="mt-5 text-sm sm:text-[15px] text-[#5C534A] leading-relaxed max-w-lg" data-reveal style="--reveal-delay: 80ms;">
                            Kami tidak menjual kopi massal. Kami menghadirkan kopi dari satu desa di Malang,
                            dipanen 100% petik merah dan dijemur teliti, lalu disangrai segar per batch. Scan
                            kodenya, lihat perjalanannya sampai ke cangkirmu.
                        </p>

                        <div class="mt-7 flex flex-wrap items-center gap-3" data-reveal style="--reveal-delay: 150ms;">
                            <a
                                href="#katalog"
                                class="inline-flex items-center gap-2 bg-[#181512] text-white text-xs sm:text-sm font-semibold px-5 sm:px-6 py-3 rounded-lg hover:bg-[#2E2824] transition"
                            >
                                <span>Pilih Kopi &amp; Racik Sendiri</span>
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 5v14"/><path d="m19 12-7 7-7-7"/>
                                </svg>
                            </a>

                            <a
                                href="#standar-3-tahap"
                                class="inline-flex items-center justify-center bg-white border border-[#E5DFD5] text-[#181512] text-xs sm:text-sm font-semibold px-5 sm:px-6 py-3 rounded-lg hover:bg-[#F3EFE8] transition"
                            >
                                Lihat Bukti 3 Tahap
                            </a>
                        </div>

                        <div class="mt-7 flex flex-wrap items-center gap-x-5 gap-y-2.5 text-xs font-medium text-[#5C534A]" data-reveal style="--reveal-delay: 210ms;">
                            @foreach ($heroTrustItems as $item)
                                <span class="inline-flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-[#5C534A] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M20 6 9 17l-5-5"/>
                                    </svg>
                                    <span>{{ $item }}</span>
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="lg:col-span-6">
                        <div class="relative rounded-2xl overflow-hidden shadow-md bg-[#E8E2D8] aspect-[4/3]" data-reveal style="--reveal-delay: 140ms;">
                            <img
                                src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1200&q=85"
                                alt="Biji kopi sangrai segar Kopi Anom dengan latar pegunungan Malang"
                                referrerpolicy="no-referrer"
                                onerror="this.onerror=null;this.src='data:image/svg+xml;utf8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22800%22 height=%22600%22 viewBox=%220 0 800 600%22%3E%3Crect width=%22800%22 height=%22600%22 fill=%22%23E8E2D8%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-weight=%22bold%22 font-size=%2228%22 fill=%22%23181512%22%3EKOPI ANOM - LERENG MALANG%3C/text%3E%3C/svg%3E';"
                                class="w-full h-full object-cover"
                                data-reveal-photo
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-transparent pointer-events-none"></div>
                            <div class="absolute bottom-4 left-4 right-4 sm:right-auto sm:max-w-xs bg-[#181512]/85 backdrop-blur-md text-white rounded-xl p-3.5 border border-white/15">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-[#F2C94C]">
                                    BATCH #04 &bull; LERENG MALANG
                                </p>
                                <p class="mt-1 text-xs font-semibold leading-snug">
                                    Dipetik Merah 1.200 MDPL &bull; Sangrai Segar Mingguan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                <section id="standar-3-tahap" class="py-16 lg:py-24 relative">
            <div data-reveal-line class="absolute top-0 inset-x-0 h-px bg-[#EDE7DC]/80 pointer-events-none" aria-hidden="true"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl sm:text-3xl lg:text-[32px] font-extrabold text-[#181512] tracking-tight mb-12 lg:mb-16" data-reveal>
                    Tiga Tahap yang Membedakan Rasa di Cangkirmu
                </h2>

                <div class="space-y-14 lg:space-y-20">
                    @foreach ($threeStages as $stage)
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                            <div class="lg:col-span-6 {{ $stage['reverse'] ? 'lg:order-2' : 'lg:order-1' }}" data-reveal>
                                <div class="relative rounded-2xl overflow-hidden shadow-sm bg-[#E8E2D8] aspect-[16/10]">
                                    <img
                                        src="{{ $stage['image'] }}"
                                        alt="{{ $stage['image_alt'] }}"
                                        referrerpolicy="no-referrer"
                                        loading="lazy"
                                        onerror="this.onerror=null;this.src='data:image/svg+xml;utf8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22800%22 height=%22500%22 viewBox=%220 0 800 500%22%3E%3Crect width=%22800%22 height=%22500%22 fill=%22%23E8E2D8%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-weight=%22bold%22 font-size=%2222%22 fill=%22%23181512%22%3EKOPI ANOM TAHAP {{ $stage['number'] }}%3C/text%3E%3C/svg%3E';"
                                        class="w-full h-full object-cover"
                                        data-reveal-photo
                                    >
                                    @if ($stage['has_qr'])
                                        <a href="{{ url('/batch?kode=ANOM-04-ARG') }}" class="absolute bottom-4 right-4 bg-white rounded-xl p-2.5 shadow-lg border border-[#E5DFD5] flex flex-col items-center hover:scale-105 transition-transform">
                                            <svg class="w-11 h-11 text-[#181512]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path d="M3 3h7v7H3V3zm2 2v3h3V5H5zm9-2h7v7h-7V3zm2 2v3h3V5h-3zM3 14h7v7H3v-7zm2 2v3h3v-3H5zm10-2h2v2h-2v-2zm-3 0h2v3h-2v-3zm5 2h4v2h-4v-2zm-5 3h3v2h-3v-2zm4 0h2v2h-2v-2zm3-5h2v2h-2v-2zm0 5h2v2h-2v-2z"/>
                                            </svg>
                                            <span class="mt-1 text-[8px] font-extrabold uppercase tracking-wider text-[#181512] text-center leading-tight">
                                                SCAN FOR<br>BATCH DETAIL
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="lg:col-span-6 {{ $stage['reverse'] ? 'lg:order-1' : 'lg:order-2' }}" data-reveal style="--reveal-delay: 90ms;">
                                <div class="inline-block pb-2 relative">
                                    <span class="text-[11px] font-bold uppercase tracking-widest text-[#7A7067]">
                                        {{ $stage['overline'] }}
                                    </span>
                                    <span data-reveal-line style="--reveal-delay: 140ms;" class="absolute left-0 right-0 bottom-0 h-px bg-[#E5DFD5]" aria-hidden="true"></span>
                                </div>

                                <p class="mt-4 text-sm sm:text-[15px] text-[#4A433C] leading-relaxed">
                                    {{ $stage['description'] }}
                                </p>

                                <div class="mt-5 inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-[#F3EFE8] border border-[#E8E2D8] text-xs font-medium text-[#5C534A]">
                                    <svg class="w-3.5 h-3.5 text-[#1E6B52] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M20 6 9 17l-5-5"/>
                                    </svg>
                                    <span>{{ $stage['badge'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="katalog" class="py-16 lg:py-24 relative bg-[#F7F6F2]">
            <div data-reveal-line class="absolute top-0 inset-x-0 h-px bg-[#EDE7DC]/80 pointer-events-none" aria-hidden="true"></div>
            <div id="katalog-racik" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-8 sm:mb-10" data-reveal>
                    <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-[#141413]">
                        KATALOG &amp; NOTA PESANAN LANGSUNG
                    </p>
                    <h2 class="mt-2 text-2xl sm:text-[32px] font-extrabold tracking-tight text-[#141413] leading-tight">
                        Pilih Varian Murni atau Racik Sendiri
                    </h2>
                    <p class="mt-2 text-xs sm:text-sm text-[#6B6A65] leading-relaxed">
                        Klik tambah pada kopi pilihanmu. Kamu bisa memesan lebih dari satu jenis kopi sekaligus dalam satu pengiriman dari Malang.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <div class="lg:col-span-8 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            @foreach ($products as $index => $product)
                                <article
                                    class="bg-white rounded-2xl p-5 sm:p-6 border border-[#ECEAE4] shadow-[0_2px_12px_rgba(20,20,19,0.03)] flex flex-col justify-between transition-shadow duration-300 hover:shadow-[0_6px_24px_rgba(20,20,19,0.06)]"
                                    data-product-card="{{ $product['id'] }}"
                                    data-reveal
                                    style="--reveal-delay: {{ $index * 45 }}ms;"
                                >
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="min-w-0 flex-1">
                                            <span class="inline-block px-2.5 py-1 rounded-full bg-[#F1F0EC] text-[#5C5B57] text-[10px] font-bold uppercase tracking-wider">
                                                {{ $product['badge'] }}
                                            </span>
                                            <h3 class="mt-2.5 text-base sm:text-[17px] font-bold text-[#141413] tracking-tight leading-snug">
                                                {{ $product['name'] }}
                                            </h3>
                                            <p class="mt-1.5 text-xs text-[#6B6A65] leading-relaxed">
                                                {{ $product['description'] }}
                                            </p>
                                        </div>

                                        <img
                                            src="{{ $product['image'] }}"
                                            alt="{{ $product['name'] }}"
                                            referrerpolicy="no-referrer"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='data:image/svg+xml;utf8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22240%22 height=%22240%22 viewBox=%220 0 240 240%22%3E%3Crect width=%22240%22 height=%22240%22 fill=%22%23F1F0EC%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-weight=%22bold%22 font-size=%2216%22 fill=%22%23141413%22%3EKOPI ANOM%3C/text%3E%3C/svg%3E';"
                                            class="w-24 h-24 sm:w-28 sm:h-28 rounded-xl object-cover shrink-0 bg-[#F1F0EC] border border-[#ECEAE4]"
                                            data-reveal-photo
                                        >
                                    </div>

                                    <div class="mt-4 flex flex-wrap gap-1.5">
                                        @foreach ($product['notes'] as $note)
                                            <span class="px-2.5 py-1 rounded-full bg-[#F4F3EF] text-[#5C5B57] text-[11px] font-medium">
                                                {{ $note }}
                                            </span>
                                        @endforeach
                                    </div>

                                    <div class="mt-5">
                                        <p class="text-[10px] font-bold uppercase tracking-wider text-[#8E8C86]">
                                            PILIHAN GILINGAN
                                        </p>
                                        <div class="mt-2 grid grid-cols-3 gap-2">
                                            @foreach ($grindOptions as $grind)
                                                <button
                                                    type="button"
                                                    data-grind-btn
                                                    data-product-id="{{ $product['id'] }}"
                                                    data-grind="{{ $grind }}"
                                                    class="py-2 px-2 rounded-lg border text-xs font-semibold text-center whitespace-nowrap transition-colors duration-200 cursor-pointer {{ $grind === $product['default_grind'] ? 'bg-[#141413] text-white border-[#141413]' : 'bg-white text-[#5C5B57] border-[#E5E4DF] hover:border-[#141413]/40 hover:text-[#141413]' }}"
                                                >
                                                    {{ $grind }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mt-5 pt-2 flex items-center justify-between gap-3">
                                        <div class="text-sm font-extrabold text-[#141413]">
                                            Rp {{ number_format($product['price'], 0, ',', '.') }}
                                            <span class="font-bold text-[#141413]">/ {{ $product['weight'] }}</span>
                                        </div>

                                        <button
                                            type="button"
                                            data-add-product="{{ $product['id'] }}"
                                            class="inline-flex items-center justify-center px-4 py-2.5 rounded-lg bg-[#141413] text-white text-xs font-semibold whitespace-nowrap hover:bg-[#2B2B29] active:scale-[0.98] transition-all duration-200 cursor-pointer shrink-0"
                                        >
                                            + Tambah ke Nota
                                        </button>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="rounded-2xl bg-[#141413] text-white p-6 sm:p-8 shadow-sm" data-reveal style="--reveal-delay: 90ms;">
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8 items-center">
                                <div class="md:col-span-6">
                                    <span class="inline-block px-2.5 py-1 rounded-full bg-[#242422] text-[#A8E6CF] text-[10px] font-bold uppercase tracking-wider border border-white/10">
                                        CUSTOM HOUSE BLEND
                                    </span>
                                    <h3 class="mt-3 text-xl sm:text-2xl font-extrabold tracking-tight text-white">
                                        Racik Sendiri
                                    </h3>
                                    <p class="mt-1.5 text-xs text-[#B8B6B0] leading-relaxed">
                                        Atur keseimbangan wangi Arabica dan kekentalan Fine Robusta Malang sesuai seleramu.
                                    </p>

                                    <div class="mt-5">
                                        <div class="flex items-center justify-between text-[11px] font-bold uppercase tracking-wider mb-2.5">
                                            <span class="inline-flex items-center gap-1.5 text-[#A8E6CF]">
                                                <span class="w-2 h-2 rounded-full bg-[#10B981] animate-pulse"></span>
                                                <span>ARABICA <span id="blend-arabica-label" class="text-white font-extrabold">70</span>%</span>
                                            </span>
                                            <span class="inline-flex items-center gap-1.5 text-[#F59E0B]">
                                                <span>ROBUSTA <span id="blend-robusta-label" class="text-white font-extrabold">30</span>%</span>
                                                <span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
                                            </span>
                                        </div>

                                        <input
                                            id="blend-slider"
                                            type="range"
                                            min="10"
                                            max="90"
                                            step="10"
                                            value="70"
                                            aria-label="Persentase Arabica berbanding Robusta"
                                            class="anom-range w-full cursor-pointer"
                                        >
                                    </div>

                                    <div class="mt-4 flex flex-wrap gap-2">
                                        @foreach ($blendPresets as $preset)
                                            <button
                                                type="button"
                                                data-blend-preset="{{ $preset['arabica'] }}"
                                                class="px-3.5 py-2 rounded-lg border text-xs font-semibold whitespace-nowrap transition-colors duration-200 cursor-pointer bg-[#20201E] text-[#D4D3CE] border-white/15 hover:border-white/40 hover:text-white"
                                            >
                                                {{ $preset['label'] }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="md:col-span-6">
                                    <div class="rounded-xl bg-[#1F1F1D] border border-white/10 p-5">
                                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#8E8C86]">
                                            KARAKTER RASA RACIKAN
                                        </p>
                                        <p id="blend-flavor-title" class="mt-1.5 text-sm font-bold text-[#6EE7B7] transition-opacity duration-200">
                                            Aroma Karamel &amp; Citrus dengan Body Creamy
                                        </p>
                                        <p id="blend-flavor-desc" class="mt-1 text-xs text-[#B8B6B0] transition-opacity duration-200">
                                            Pas untuk Americano, V60 manis, maupun Es Kopi Susu.
                                        </p>

                                        <p class="mt-4 text-[10px] font-bold uppercase tracking-widest text-[#8E8C86]">
                                            PILIHAN GILINGAN
                                        </p>
                                        <div class="mt-2 grid grid-cols-3 gap-2">
                                            @foreach ($grindOptions as $grind)
                                                <button
                                                    type="button"
                                                    data-blend-grind="{{ $grind }}"
                                                    class="py-2 px-2 rounded-lg border text-xs font-semibold text-center whitespace-nowrap transition-colors duration-200 cursor-pointer {{ $grind === 'Halus - Tubruk' ? 'bg-white text-[#141413] border-white' : 'bg-[#282825] text-[#D4D3CE] border-white/15 hover:border-white/40' }}"
                                                >
                                                    {{ $grind }}
                                                </button>
                                            @endforeach
                                        </div>

                                        <div class="mt-5 pt-4 border-t border-white/10 flex items-center justify-between gap-3">
                                            <div>
                                                <span id="blend-price-label" class="text-base font-extrabold text-white">Rp 79.000</span>
                                                <span class="text-xs text-[#8E8C86]"> / 200g</span>
                                            </div>

                                            <button
                                                type="button"
                                                id="add-custom-blend-btn"
                                                class="px-4 py-2.5 rounded-lg bg-white text-[#141413] text-xs font-bold whitespace-nowrap hover:bg-[#F1F0EC] active:scale-[0.98] transition-all duration-200 cursor-pointer"
                                            >
                                                + Tambah Racikan ke Nota
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                                        <aside aria-label="Nota Pesanan dan Pengiriman" class="lg:col-span-4 lg:sticky lg:top-24 space-y-5">
                        <div class="bg-white rounded-2xl p-6 border border-[#ECEAE4] shadow-[0_2px_12px_rgba(20,20,19,0.03)]" data-reveal style="--reveal-delay: 60ms;">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="text-base font-extrabold text-[#141413] leading-snug">
                                    Nota Pesanan<br>Kopi Anom
                                </h3>
                                <span
                                    id="nota-item-badge"
                                    class="px-2.5 py-1 rounded-full bg-[#F4F3EF] text-[#141413] text-[11px] font-bold shrink-0"
                                >
                                    0 Item
                                </span>
                            </div>

                            <div class="mt-4 p-3 rounded-xl bg-[#F7F6F2] border border-[#ECEAE4]">
                                <div class="flex items-center justify-between text-[11px] font-semibold text-[#141413]">
                                    <span id="shipping-slot-label">Slot Ongkir 1 Kg Malang: 0/4 Bungkus</span>
                                    <span id="shipping-slot-pct" class="text-[#6B6A65]">0%</span>
                                </div>
                                <div class="mt-2 w-full h-2 rounded-full bg-[#E5E4DF] overflow-hidden">
                                    <div
                                        id="shipping-slot-bar"
                                        class="h-full rounded-full bg-[#141413] transition-all duration-300 ease-out"
                                        style="width: 0%;"
                                    ></div>
                                </div>
                            </div>

                            <div id="nota-empty-state" class="mt-5 py-6 px-4 rounded-xl border border-dashed border-[#DEDCD5] bg-[#FAF9F6] text-center">
                                <div class="w-10 h-10 mx-auto rounded-full bg-[#F1F0EC] text-[#5C5B57] flex items-center justify-center">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/>
                                    </svg>
                                </div>
                                <p class="mt-3 text-xs font-bold text-[#141413]">Nota Pesanan Masih Kosong</p>
                                <p class="mt-1 text-[11px] text-[#6B6A65] leading-relaxed">
                                    Pilih varian kopi murni atau atur racikan sendirimu di kolom sebelah kiri untuk mengisi slot pengiriman.
                                </p>
                            </div>

                            <div id="nota-active-content" class="hidden">
                                <div id="nota-items-list" class="mt-4 max-h-52 overflow-y-auto pr-1 space-y-3 divide-y divide-[#F1F0EC]"></div>

                                <div class="mt-4 pt-4 border-t border-[#ECEAE4] space-y-2 text-xs">
                                    <div class="flex items-center justify-between text-[#6B6A65]">
                                        <span>Subtotal</span>
                                        <span id="nota-subtotal" class="font-semibold text-[#141413]">Rp 0</span>
                                    </div>
                                    <div class="flex items-center justify-between text-[#6B6A65]">
                                        <span>Ongkir (Malang)</span>
                                        <span id="nota-shipping" class="font-semibold text-[#141413]">Rp 10.000</span>
                                    </div>
                                </div>

                                <div class="mt-4 pt-4 border-t border-[#ECEAE4] flex items-center justify-between">
                                    <span class="text-sm font-extrabold text-[#141413]">Total</span>
                                    <span id="nota-total" class="text-base font-extrabold text-[#141413]">Rp 0</span>
                                </div>

                                <div class="mt-4 py-2.5 px-3.5 rounded-xl bg-[#F4F3EF] text-center text-[11px] font-medium text-[#5C5B57]">
                                    Estimasi pengiriman 2-3 hari kerja
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 border border-[#ECEAE4] shadow-[0_2px_12px_rgba(20,20,19,0.03)]" data-reveal style="--reveal-delay: 120ms;">
                            <h3 class="text-base font-extrabold text-[#141413]">
                                Pengiriman Langsung
                            </h3>

                            <form id="shipping-form" class="mt-4 space-y-3.5" novalidate>
                                <div>
                                    <label for="nama-penerima" class="block text-[11px] font-semibold text-[#5C5B57] mb-1.5">
                                        Nama Penerima
                                    </label>
                                    <input
                                        id="nama-penerima"
                                        type="text"
                                        value="Budi Santoso"
                                        required
                                        class="w-full px-3.5 py-2.5 rounded-lg border border-[#E5E4DF] bg-white text-xs text-[#141413] placeholder:text-[#A3A19B] focus:outline-none focus:border-[#141413] transition-colors"
                                        placeholder="Nama lengkap penerima"
                                    >
                                </div>

                                <div>
                                    <label for="alamat-lengkap" class="block text-[11px] font-semibold text-[#5C5B57] mb-1.5">
                                        Alamat Lengkap
                                    </label>
                                    <input
                                        id="alamat-lengkap"
                                        type="text"
                                        value="Jl. Merdeka No. 12, Malang, Jawa Timur"
                                        required
                                        class="w-full px-3.5 py-2.5 rounded-lg border border-[#E5E4DF] bg-white text-xs text-[#141413] placeholder:text-[#A3A19B] focus:outline-none focus:border-[#141413] transition-colors"
                                        placeholder="Jalan, Kecamatan, Kota"
                                    >
                                </div>

                                <div>
                                    <label for="kode-pos" class="block text-[11px] font-semibold text-[#5C5B57] mb-1.5">
                                        Kode Pos
                                    </label>
                                    <input
                                        id="kode-pos"
                                        type="text"
                                        value="65111"
                                        required
                                        class="w-full px-3.5 py-2.5 rounded-lg border border-[#E5E4DF] bg-white text-xs text-[#141413] placeholder:text-[#A3A19B] focus:outline-none focus:border-[#141413] transition-colors"
                                        placeholder="Contoh: 65111"
                                    >
                                </div>

                                <div>
                                    <label for="nomor-telepon" class="block text-[11px] font-semibold text-[#5C5B57] mb-1.5">
                                        Nomor Telepon
                                    </label>
                                    <input
                                        id="nomor-telepon"
                                        type="tel"
                                        value="0812 3456 7890"
                                        required
                                        class="w-full px-3.5 py-2.5 rounded-lg border border-[#E5E4DF] bg-white text-xs text-[#141413] placeholder:text-[#A3A19B] focus:outline-none focus:border-[#141413] transition-colors"
                                        placeholder="0812 xxxx xxxx"
                                    >
                                </div>

                                <p id="form-error-msg" class="hidden text-[11px] font-semibold text-red-600 bg-red-50 border border-red-200 rounded-lg px-3 py-2"></p>

                                <button
                                    type="submit"
                                    id="checkout-btn"
                                    class="mt-2 w-full py-3 px-4 rounded-lg bg-[#141413] text-white text-xs font-bold hover:bg-[#2B2B29] active:scale-[0.99] transition-all duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    Lanjutkan Pembayaran
                                </button>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

                <section id="seduh" class="py-16 lg:py-24 relative">
            <div data-reveal-line class="absolute top-0 inset-x-0 h-px bg-[#EDE7DC]/80 pointer-events-none" aria-hidden="true"></div>
            <div id="cara-seduh" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div data-reveal>
                    <span class="inline-block px-3 py-1 rounded-full bg-[#EFEBE3] text-[#7A7067] text-[10px] font-bold uppercase tracking-wider">
                        DARI ROASTERY KE CANGKIRMU
                    </span>
                    <h2 class="mt-3 text-2xl sm:text-3xl lg:text-[32px] font-extrabold text-[#181512] tracking-tight">
                        Tiga Ritual Seduh di Rumah: Tanpa Alat Mahal pun Tetap Nikmat
                    </h2>
                    <p class="mt-2 text-xs sm:text-sm text-[#625A52]">
                        Biji petik merah yang disangrai segar selalu jujur di cangkir. Pilih gaya ngopi harianmu dan lihat panduan gilingan yang paling pas.
                    </p>
                </div>

                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($brewingRituals as $index => $ritual)
                        <article class="flex flex-col rounded-2xl p-6 {{ $ritual['dark'] ? 'bg-[#191E22] text-white shadow-lg' : 'bg-white border border-[#E8E2D8] text-[#181512] shadow-sm' }}" data-reveal style="--reveal-delay: {{ $index * 70 }}ms;">
                            @if (!empty($ritual['badge_top']))
                                <span class="inline-block self-start px-2.5 py-0.5 rounded-full bg-[#F2C94C] text-[#181512] text-[9px] font-extrabold uppercase tracking-wider mb-2">
                                    {{ $ritual['badge_top'] }}
                                </span>
                            @endif

                            <span class="text-[10px] font-bold uppercase tracking-wider {{ $ritual['dark'] ? 'text-[#8B949E]' : 'text-[#8C8278]' }}">
                                {{ $ritual['saran'] }}
                            </span>

                            <div class="mt-3 rounded-xl overflow-hidden aspect-[16/10] {{ $ritual['dark'] ? 'bg-[#22292E]' : 'bg-[#EFEBE3]' }}">
                                <img
                                    src="{{ $ritual['image'] }}"
                                    alt="{{ $ritual['image_alt'] }}"
                                    referrerpolicy="no-referrer"
                                    loading="lazy"
                                    onerror="this.onerror=null;this.src='data:image/svg+xml;utf8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22600%22 height=%22380%22 viewBox=%220 0 600 380%22%3E%3Crect width=%22600%22 height=%22380%22 fill=%22%23EFEBE3%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-weight=%22bold%22 font-size=%2218%22 fill=%22%23181512%22%3EPANDUAN SEDUH KOPI ANOM%3C/text%3E%3C/svg%3E';"
                                    class="w-full h-full object-cover"
                                    data-reveal-photo
                                >
                            </div>

                            <h3 class="mt-4 text-lg font-extrabold tracking-tight {{ $ritual['dark'] ? 'text-white' : 'text-[#181512]' }}">
                                {{ $ritual['title'] }}
                            </h3>

                            <p class="mt-2 text-xs leading-relaxed {{ $ritual['dark'] ? 'text-[#A3ABB2]' : 'text-[#5C534A]' }}">
                                {{ $ritual['description'] }}
                            </p>

                            <div class="mt-5 p-3.5 rounded-xl text-[11px] {{ $ritual['dark'] ? 'bg-[#22292E] border border-[#303940]' : 'bg-[#FAF8F4] border border-[#ECE7DF]' }}">
                                <p class="font-bold {{ $ritual['dark'] ? 'text-white' : 'text-[#181512]' }}">
                                    Pasangan Terbaik:
                                </p>
                                <p class="mt-0.5 {{ $ritual['dark'] ? 'text-[#C9D1D9]' : 'text-[#5C534A]' }}">
                                    {{ $ritual['best_pair'] }}
                                </p>
                            </div>

                            <a
                                href="#katalog"
                                data-ritual-grind="{{ $ritual['cta_grind'] }}"
                                class="mt-auto pt-5 inline-flex items-center text-xs font-bold transition {{ $ritual['dark'] ? 'text-[#4ADE80] hover:text-[#6EE7B7]' : 'text-[#181512] hover:underline' }}"
                            >
                                {{ $ritual['cta'] }}
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

        <footer class="bg-[#111111] text-white">
        <div class="border-b border-[#242422]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <p class="text-xs text-[#C8C2BA]">
                    Punya kedai kopi atau butuh pasokan biji rutin dari Malang? Dapatkan harga khusus mitra kedai.
                </p>
                <a
                    href="https://wa.me/{{ $adminWhatsapp }}?text={{ urlencode('Halo Tim Roastery Kopi Anom, saya ingin menanyakan harga khusus mitra kedai / pasokan biji rutin dari Malang.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-1.5 bg-white text-[#111111] text-xs font-bold px-5 py-2.5 rounded-full hover:bg-[#F3EFE8] transition shrink-0"
                >
                    <span>Hubungi Tim Roastery via WhatsApp</span>
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-10">
                <div class="sm:col-span-2 lg:col-span-4">
                    <h4 class="text-sm font-extrabold uppercase tracking-wider text-white">
                        KOPI ANOM
                    </h4>
                    <p class="mt-3 text-xs text-[#8C857E] leading-relaxed max-w-xs">
                        Kopi satu desa dari lereng Malang. Dipetik merah, dijemur di atas para-para bersih, dan disangrai segar per batch kecil.
                    </p>
                </div>

                <div class="lg:col-span-3">
                    <h4 class="text-[11px] font-bold uppercase tracking-widest text-[#8C857E]">
                        Halaman Utama
                    </h4>
                    <ul class="mt-3.5 space-y-2.5 text-xs text-[#C8C2BA]">
                        <li>
                            <a href="{{ url('/') }}" class="hover:text-white transition-colors">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/batch') }}" class="hover:text-white transition-colors">
                                Lacak Batch
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/cerita') }}" class="hover:text-white transition-colors">
                                Cerita &amp; Pesan Petani
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="lg:col-span-2">
                    <h4 class="text-[11px] font-bold uppercase tracking-widest text-[#8C857E]">
                        Pintasan Cepat
                    </h4>
                    <ul class="mt-3.5 space-y-2.5 text-xs text-[#C8C2BA]">
                        <li>
                            <a href="{{ url('/#katalog') }}" class="hover:text-white transition-colors">
                                Katalog &amp; Custom Mix
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/#seduh') }}" class="hover:text-white transition-colors">
                                Panduan Seduh
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sm:col-span-2 lg:col-span-3">
                    <h4 class="text-[11px] font-bold uppercase tracking-widest text-[#8C857E]">
                        ASAL &amp; KONTAK
                    </h4>
                    <ul class="mt-3.5 space-y-2.5 text-xs text-[#C8C2BA]">
                        <li>Kebun &amp; Roastery: Kabupaten Malang, Jawa Timur</li>
                        <li>Setiap kemasan dilengkapi QR Code pelacak batch.</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

        <div id="quick-order-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm" role="dialog" aria-modal="true" aria-labelledby="quick-order-title">
        <div class="w-full max-w-md rounded-2xl bg-[#FBF9F5] border border-[#E5DFD5] p-6 shadow-2xl">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#8C8278]">
                        BATCH #04 &bull; SIAP SANGRAI
                    </span>
                    <h3 id="quick-order-title" class="mt-1 text-lg font-extrabold text-[#181512]">
                        Fine Robusta Malang
                    </h3>
                </div>
                <button
                    type="button"
                    id="close-quick-order-modal"
                    aria-label="Tutup modal"
                    class="w-8 h-8 rounded-lg border border-[#E5DFD5] bg-white text-[#5C534A] hover:text-[#181512] hover:bg-[#F3EFE8] flex items-center justify-center transition cursor-pointer"
                >
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <div class="mt-5">
                <p class="block text-[11px] font-bold uppercase tracking-wider text-[#5C534A] mb-2">
                    Pilih Jenis Gilingan
                </p>
                <div class="grid grid-cols-3 gap-2">
                    @foreach ($grindOptions as $grindOption)
                        <button
                            type="button"
                            data-quick-grind="{{ $grindOption }}"
                            class="py-2.5 px-2 rounded-lg text-xs font-semibold border transition cursor-pointer {{ $grindOption === 'Halus - Tubruk' ? 'bg-[#181512] text-white border-[#181512]' : 'bg-white text-[#181512] border-[#E5DFD5] hover:bg-[#F3EFE8]' }}"
                        >
                            {{ $grindOption }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="mt-5 flex items-center justify-between">
                <span class="text-xs font-bold text-[#5C534A]">Jumlah Kemasan (200g)</span>
                <div class="inline-flex items-center rounded-lg border border-[#E5DFD5] bg-white">
                    <button type="button" id="quick-qty-dec" class="w-8 h-8 flex items-center justify-center text-sm font-bold text-[#181512] hover:bg-[#F3EFE8] rounded-l-lg cursor-pointer">-</button>
                    <span id="quick-qty-val" class="w-9 text-center text-xs font-extrabold text-[#181512]">1</span>
                    <button type="button" id="quick-qty-inc" class="w-8 h-8 flex items-center justify-center text-sm font-bold text-[#181512] hover:bg-[#F3EFE8] rounded-r-lg cursor-pointer">+</button>
                </div>
            </div>

            <div class="mt-5 p-3.5 rounded-xl bg-white border border-[#E8E2D8] flex items-center justify-between">
                <span class="text-xs text-[#5C534A] font-medium">Estimasi Total</span>
                <span id="quick-order-total" class="text-base font-extrabold text-[#181512]">Rp 65.000</span>
            </div>

            <div class="mt-5">
                <button
                    type="button"
                    id="confirm-quick-order-btn"
                    class="w-full py-3 px-4 rounded-lg bg-[#181512] text-white text-xs font-bold hover:bg-[#2E2824] transition cursor-pointer"
                >
                    Masukkan ke Nota Pesanan &rarr;
                </button>
            </div>
        </div>
    </div>

        <div id="invoice-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm" role="dialog" aria-modal="true" aria-labelledby="invoice-modal-title">
        <div class="w-full max-w-lg rounded-2xl bg-white border border-[#ECEAE4] p-6 sm:p-7 shadow-2xl max-h-[90vh] overflow-y-auto">
            <div class="flex items-start justify-between gap-4 pb-4 border-b border-[#ECEAE4]">
                <div>
                    <span id="invoice-number-badge" class="inline-block px-2.5 py-0.5 rounded-full bg-[#F1F0EC] text-[#141413] text-[10px] font-extrabold uppercase tracking-wider">
                        INVOICE #ANM-0401
                    </span>
                    <h3 id="invoice-modal-title" class="mt-1.5 text-lg font-extrabold text-[#141413]">
                        Ringkasan Nota &amp; Pembayaran QRIS
                    </h3>
                </div>
                <button
                    type="button"
                    id="close-invoice-modal"
                    aria-label="Tutup modal pembayaran"
                    class="w-8 h-8 rounded-lg border border-[#E5E4DF] bg-[#F7F6F2] text-[#5C5B57] hover:text-[#141413] flex items-center justify-center transition cursor-pointer"
                >
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <div class="mt-4 p-3.5 rounded-xl bg-[#F7F6F2] border border-[#ECEAE4] text-xs space-y-1">
                <p class="font-bold text-[#141413]" id="invoice-customer-name">Budi Santoso</p>
                <p class="text-[#6B6A65]"><span id="invoice-customer-address">Jl. Merdeka No. 12, Malang</span> (Kode Pos: <span id="invoice-customer-postal">65111</span>)</p>
                <p class="text-[#6B6A65]" id="invoice-customer-phone">0812 3456 7890</p>
            </div>

            <div id="invoice-items-summary" class="mt-4 space-y-2 text-xs max-h-40 overflow-y-auto pr-1"></div>

            <div class="mt-4 pt-3 border-t border-[#ECEAE4] space-y-1.5 text-xs">
                <div class="flex justify-between text-[#6B6A65]">
                    <span>Subtotal</span>
                    <span id="invoice-subtotal" class="font-semibold text-[#141413]">Rp 0</span>
                </div>
                <div class="flex justify-between text-[#6B6A65]">
                    <span>Ongkir (Malang)</span>
                    <span class="font-semibold text-[#141413]">Rp 10.000</span>
                </div>
                <div class="flex justify-between pt-2 border-t border-[#ECEAE4] text-sm font-extrabold text-[#141413]">
                    <span>Total Pembayaran</span>
                    <span id="invoice-grand-total">Rp 0</span>
                </div>
            </div>

            <div class="mt-5 p-4 rounded-xl border border-[#ECEAE4] bg-[#FAF9F6] flex flex-col sm:flex-row items-center gap-4">
                <div class="p-2.5 bg-white rounded-xl border border-[#E5E4DF] shrink-0">
                    <svg class="w-24 h-24 text-[#141413]" viewBox="0 0 24 24" fill="currentColor" aria-label="QRIS Kopi Anom">
                        <path d="M3 3h7v7H3V3zm2 2v3h3V5H5zm9-2h7v7h-7V3zm2 2v3h3V5h-3zM3 14h7v7H3v-7zm2 2v3h3v-3H5zm10-2h2v2h-2v-2zm-3 0h2v3h-2v-3zm5 2h4v2h-4v-2zm-5 3h3v2h-3v-2zm4 0h2v2h-2v-2zm3-5h2v2h-2v-2zm0 5h2v2h-2v-2z"/>
                    </svg>
                </div>
                <div class="text-center sm:text-left">
                    <span class="inline-block px-2 py-0.5 rounded bg-[#141413] text-white text-[10px] font-extrabold tracking-wider">QRIS KOPI ANOM</span>
                    <p class="mt-1.5 text-xs font-bold text-[#141413]">Scan untuk bayar via GoPay, OVO, Dana, atau M-Banking</p>
                    <p class="mt-1 text-[11px] text-[#6B6A65]">Setelah transfer, klik tombol di bawah agar tim roastery langsung memproses sangrai &amp; pengiriman.</p>
                </div>
            </div>

            <div class="mt-5 flex flex-col sm:flex-row gap-2.5">
                <a
                    id="whatsapp-confirm-link"
                    href="#"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex-1 inline-flex items-center justify-center gap-2 py-3 px-4 rounded-lg bg-[#141413] text-white text-xs font-bold hover:bg-[#2B2B29] transition"
                >
                    <span>Kirim Pesanan ke WhatsApp Admin</span>
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <script>
        window.productsData = @json($products);

        document.addEventListener('DOMContentLoaded', () => {
            const productsData = window.productsData || [];
            const shippingCost = {{ $shippingCost }};
            const maxSlotPacks = {{ $maxSlotPacks }};
            const adminWhatsapp = '{{ $adminWhatsapp }}';
            const CART_STORAGE_KEY = 'kopi_anom_cart_v1';
            const CUSTOMER_STORAGE_KEY = 'kopi_anom_customer_v1';

            const escapeHtml = (str) => String(str)
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');

            const selectedGrinds = {};
            productsData.forEach((p) => {
                selectedGrinds[p.id] = p.default_grind;
            });

            const loadSavedCart = () => {
                try {
                    const raw = localStorage.getItem(CART_STORAGE_KEY);
                    if (!raw) return [];
                    const parsed = JSON.parse(raw);
                    return Array.isArray(parsed)
                        ? parsed.filter((item) => item && item.key && item.name && Number(item.qty) > 0 && Number(item.price) >= 0)
                        : [];
                } catch (err) {
                    return [];
                }
            };

            const saveCart = (items) => {
                try {
                    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(items));
                } catch (err) {}
            };

            let cart = loadSavedCart();
            let blendArabica = 70;
            let blendGrind = 'Halus - Tubruk';

            const formatRupiah = (amount) => 'Rp ' + Number(amount).toLocaleString('id-ID');

            const mobileToggleBtn = document.getElementById('mobile-menu-toggle');
            const mobileMenuPanel = document.getElementById('mobile-menu-panel');
            const mobileIconOpen = document.getElementById('mobile-icon-open');
            const mobileIconClose = document.getElementById('mobile-icon-close');

            const setMobileMenu = (open) => {
                if (!mobileMenuPanel) return;
                mobileMenuPanel.classList.toggle('hidden', !open);
                mobileIconOpen?.classList.toggle('hidden', open);
                mobileIconClose?.classList.toggle('hidden', !open);
                mobileToggleBtn?.setAttribute('aria-expanded', String(open));
            };

            mobileToggleBtn?.addEventListener('click', () => {
                const isHidden = mobileMenuPanel.classList.contains('hidden');
                setMobileMenu(isHidden);
            });

            document.querySelectorAll('[data-mobile-nav-link]').forEach((link) => {
                link.addEventListener('click', () => setMobileMenu(false));
            });

            const syncProductGrindUI = (productId, grind) => {
                selectedGrinds[productId] = grind;
                document.querySelectorAll(`[data-grind-btn][data-product-id="${productId}"]`).forEach((sibling) => {
                    const isActive = sibling.dataset.grind === grind;
                    sibling.className = isActive
                        ? 'py-2 px-2 rounded-lg border text-xs font-semibold text-center whitespace-nowrap transition-colors duration-200 cursor-pointer bg-[#141413] text-white border-[#141413]'
                        : 'py-2 px-2 rounded-lg border text-xs font-semibold text-center whitespace-nowrap transition-colors duration-200 cursor-pointer bg-white text-[#5C5B57] border-[#E5E4DF] hover:border-[#141413]/40 hover:text-[#141413]';
                });
            };

            document.querySelectorAll('[data-grind-btn]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    syncProductGrindUI(btn.dataset.productId, btn.dataset.grind);
                });
            });

            document.querySelectorAll('[data-ritual-grind]').forEach((link) => {
                link.addEventListener('click', () => {
                    const targetGrind = link.dataset.ritualGrind;
                    productsData.forEach((p) => syncProductGrindUI(p.id, targetGrind));
                });
            });

            const blendSlider = document.getElementById('blend-slider');
            const blendArabicaLabel = document.getElementById('blend-arabica-label');
            const blendRobustaLabel = document.getElementById('blend-robusta-label');
            const blendFlavorTitle = document.getElementById('blend-flavor-title');
            const blendFlavorDesc = document.getElementById('blend-flavor-desc');
            const blendPriceLabel = document.getElementById('blend-price-label');
            const blendPresetBtns = document.querySelectorAll('[data-blend-preset]');
            const blendGrindBtns = document.querySelectorAll('[data-blend-grind]');
            const addCustomBlendBtn = document.getElementById('add-custom-blend-btn');

            const getBlendPrice = (arabica) => Math.round((65000 * (100 - arabica) + 85000 * arabica) / 100);

            const getBlendFlavor = (arabica) => {
                if (arabica >= 80) {
                    return {
                        title: 'Wangi Floral & Sweet Citrus yang Cerah',
                        desc: 'Cocok untuk V60, French Press, atau Kopi Hitam tanpa gula.'
                    };
                }
                if (arabica >= 60) {
                    return {
                        title: 'Aroma Karamel & Citrus dengan Body Creamy',
                        desc: 'Pas untuk Americano, V60 manis, maupun Es Kopi Susu.'
                    };
                }
                if (arabica >= 40) {
                    return {
                        title: 'Seimbang: Manis Gula Aren & Cokelat Susu',
                        desc: 'Andalan untuk Kopi Tubruk harian dan Es Kopi Susu Gula Aren.'
                    };
                }
                return {
                    title: 'Dark Cocoa Pekat dengan Body Tebal & Nendang',
                    desc: 'Juara untuk Kopi Susu kekinian & seduhan Tubruk kental.'
                };
            };

            const syncBlendUI = (arabica) => {
                blendArabica = Number(arabica);
                const robusta = 100 - blendArabica;
                const price = getBlendPrice(blendArabica);
                const flavor = getBlendFlavor(blendArabica);

                blendSlider.value = blendArabica;
                blendArabicaLabel.textContent = blendArabica;
                blendRobustaLabel.textContent = robusta;

                const sliderPct = ((blendArabica - 10) / (90 - 10)) * 100;
                blendSlider.style.background = `linear-gradient(to right, #10B981 0%, #10B981 ${sliderPct}%, #D97706 ${sliderPct}%, #D97706 100%)`;

                if (blendFlavorTitle.textContent.trim() !== flavor.title) {
                    blendFlavorTitle.style.opacity = '0';
                    blendFlavorDesc.style.opacity = '0';
                    setTimeout(() => {
                        blendFlavorTitle.textContent = flavor.title;
                        blendFlavorDesc.textContent = flavor.desc;
                        blendFlavorTitle.style.opacity = '1';
                        blendFlavorDesc.style.opacity = '1';
                    }, 150);
                }
                blendPriceLabel.textContent = formatRupiah(price);

                blendPresetBtns.forEach((btn) => {
                    const active = Number(btn.dataset.blendPreset) === blendArabica;
                    btn.className = active
                        ? 'px-3.5 py-2 rounded-lg border text-xs font-semibold whitespace-nowrap transition-colors duration-200 cursor-pointer bg-white text-[#141413] border-white'
                        : 'px-3.5 py-2 rounded-lg border text-xs font-semibold whitespace-nowrap transition-colors duration-200 cursor-pointer bg-[#20201E] text-[#D4D3CE] border-white/15 hover:border-white/40 hover:text-white';
                });
            };

            const animateBlendSlider = (targetValue) => {
                const startValue = Number(blendSlider.value);
                const endValue = Number(targetValue);
                if (startValue === endValue) return;

                const duration = 250;
                const startTime = performance.now();

                const step = (now) => {
                    const elapsed = now - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const ease = progress < 0.5
                        ? 2 * progress * progress
                        : -1 + (4 - 2 * progress) * progress;
                    const current = Math.round(startValue + (endValue - startValue) * ease);
                    syncBlendUI(current);

                    if (progress < 1) {
                        requestAnimationFrame(step);
                    } else {
                        syncBlendUI(endValue);
                    }
                };
                requestAnimationFrame(step);
            };

            blendSlider?.addEventListener('input', (e) => syncBlendUI(e.target.value));

            blendPresetBtns.forEach((btn) => {
                btn.addEventListener('click', () => animateBlendSlider(btn.dataset.blendPreset));
            });

            blendGrindBtns.forEach((btn) => {
                btn.addEventListener('click', () => {
                    blendGrind = btn.dataset.blendGrind;
                    blendGrindBtns.forEach((b) => {
                        const active = b.dataset.blendGrind === blendGrind;
                        b.className = active
                            ? 'py-2 px-2 rounded-lg border text-xs font-semibold text-center whitespace-nowrap transition-colors duration-200 cursor-pointer bg-white text-[#141413] border-white'
                            : 'py-2 px-2 rounded-lg border text-xs font-semibold text-center whitespace-nowrap transition-colors duration-200 cursor-pointer bg-[#282825] text-[#D4D3CE] border-white/15 hover:border-white/40';
                    });
                });
            });

            const notaBadge = document.getElementById('nota-item-badge');
            const slotLabel = document.getElementById('shipping-slot-label');
            const slotPct = document.getElementById('shipping-slot-pct');
            const slotBar = document.getElementById('shipping-slot-bar');
            const notaEmptyState = document.getElementById('nota-empty-state');
            const notaActiveContent = document.getElementById('nota-active-content');
            const notaItemsList = document.getElementById('nota-items-list');
            const notaSubtotalEl = document.getElementById('nota-subtotal');
            const notaTotalEl = document.getElementById('nota-total');
            const formErrorMsg = document.getElementById('form-error-msg');

            const addItemToCart = (itemObj, qtyToAdd = 1) => {
                const existing = cart.find((i) => i.key === itemObj.key);
                if (existing) {
                    existing.qty += qtyToAdd;
                } else {
                    cart.push({ ...itemObj, qty: qtyToAdd });
                }
                saveCart(cart);
                formErrorMsg.classList.add('hidden');
                renderNota();
            };

            document.querySelectorAll('[data-add-product]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    const productId = btn.dataset.addProduct;
                    const product = productsData.find((p) => p.id === productId);
                    if (!product) return;

                    const grind = selectedGrinds[productId] || product.default_grind;
                    addItemToCart({
                        key: `${product.id}__${grind}`,
                        name: product.name,
                        grind,
                        weight: product.weight,
                        price: product.price,
                    });
                });
            });

            addCustomBlendBtn?.addEventListener('click', () => {
                const robusta = 100 - blendArabica;
                const price = getBlendPrice(blendArabica);
                addItemToCart({
                    key: `custom-blend-${blendArabica}-${robusta}__${blendGrind}`,
                    name: `Racik Sendiri (${blendArabica}:${robusta})`,
                    grind: blendGrind,
                    weight: '200g',
                    price,
                });
            });

            const renderNota = () => {
                const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
                const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
                const grandTotal = totalQty > 0 ? subtotal + shippingCost : 0;

                notaBadge.textContent = `${totalQty} Item`;

                const pct = Math.min(100, Math.round((totalQty / maxSlotPacks) * 100));
                slotLabel.textContent = totalQty >= maxSlotPacks
                    ? `Slot Ongkir 1 Kg Malang: ${totalQty}/4 Bungkus (Penuh!)`
                    : `Slot Ongkir 1 Kg Malang: ${totalQty}/4 Bungkus`;
                slotPct.textContent = `${pct}%`;
                slotBar.style.width = `${pct}%`;
                slotBar.classList.toggle('bg-emerald-600', totalQty >= maxSlotPacks);
                slotBar.classList.toggle('bg-[#141413]', totalQty < maxSlotPacks);

                if (totalQty === 0) {
                    notaEmptyState.classList.remove('hidden');
                    notaActiveContent.classList.add('hidden');
                    notaItemsList.innerHTML = '';
                    return;
                }

                notaEmptyState.classList.add('hidden');
                notaActiveContent.classList.remove('hidden');

                notaItemsList.innerHTML = cart.map((item, idx) => `
                    <div class="pt-3 first:pt-0 flex items-start justify-between gap-2.5">
                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-bold text-[#141413] truncate">${escapeHtml(item.name)}</p>
                            <p class="text-[11px] text-[#7A7872] mt-0.5">${escapeHtml(item.grind)} &bull; ${escapeHtml(item.weight)}</p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <div class="inline-flex items-center rounded-md border border-[#E5E4DF] bg-[#F7F6F2]">
                                <button type="button" data-qty-dec="${idx}" aria-label="Kurangi jumlah" class="w-5 h-5 flex items-center justify-center text-xs font-bold text-[#141413] hover:bg-[#ECEAE4] rounded-l-md cursor-pointer">-</button>
                                <span class="px-1.5 text-[11px] font-bold text-[#141413]">${item.qty}</span>
                                <button type="button" data-qty-inc="${idx}" aria-label="Tambah jumlah" class="w-5 h-5 flex items-center justify-center text-xs font-bold text-[#141413] hover:bg-[#ECEAE4] rounded-r-md cursor-pointer">+</button>
                            </div>
                            <span class="text-xs font-bold text-[#141413] min-w-[68px] text-right">${formatRupiah(item.price * item.qty)}</span>
                            <button type="button" data-remove-idx="${idx}" aria-label="Hapus item" class="w-5 h-5 rounded flex items-center justify-center text-[#9E9C96] hover:text-red-600 hover:bg-red-50 transition-colors cursor-pointer">&times;</button>
                        </div>
                    </div>
                `).join('');

                notaItemsList.querySelectorAll('[data-qty-dec]').forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const i = Number(btn.dataset.qtyDec);
                        if (cart[i].qty > 1) {
                            cart[i].qty -= 1;
                        } else {
                            cart.splice(i, 1);
                        }
                        saveCart(cart);
                        renderNota();
                    });
                });

                notaItemsList.querySelectorAll('[data-qty-inc]').forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const i = Number(btn.dataset.qtyInc);
                        cart[i].qty += 1;
                        saveCart(cart);
                        renderNota();
                    });
                });

                notaItemsList.querySelectorAll('[data-remove-idx]').forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const i = Number(btn.dataset.removeIdx);
                        cart.splice(i, 1);
                        saveCart(cart);
                        renderNota();
                    });
                });

                notaSubtotalEl.textContent = formatRupiah(subtotal);
                notaTotalEl.textContent = formatRupiah(grandTotal);
            };

            const inputName = document.getElementById('nama-penerima');
            const inputAddress = document.getElementById('alamat-lengkap');
            const inputPostalCode = document.getElementById('kode-pos');
            const inputPhone = document.getElementById('nomor-telepon');

            const loadSavedCustomer = () => {
                try {
                    const raw = localStorage.getItem(CUSTOMER_STORAGE_KEY);
                    if (!raw) return;
                    const parsed = JSON.parse(raw);
                    if (parsed && typeof parsed === 'object') {
                        if (typeof parsed.name === 'string' && parsed.name.trim()) inputName.value = parsed.name;
                        if (typeof parsed.address === 'string' && parsed.address.trim()) inputAddress.value = parsed.address;
                        if (typeof parsed.postalCode === 'string' && parsed.postalCode.trim()) inputPostalCode.value = parsed.postalCode;
                        if (typeof parsed.phone === 'string' && parsed.phone.trim()) inputPhone.value = parsed.phone;
                    }
                } catch (err) {}
            };

            const saveCustomer = () => {
                try {
                    localStorage.setItem(CUSTOMER_STORAGE_KEY, JSON.stringify({
                        name: inputName?.value || '',
                        address: inputAddress?.value || '',
                        postalCode: inputPostalCode?.value || '',
                        phone: inputPhone?.value || '',
                    }));
                } catch (err) {}
            };

            [inputName, inputAddress, inputPostalCode, inputPhone].forEach((el) => {
                el?.addEventListener('input', saveCustomer);
            });
            loadSavedCustomer();

            const quickOrderModal = document.getElementById('quick-order-modal');
            const quickOrderTitle = document.getElementById('quick-order-title');
            const closeQuickOrderBtn = document.getElementById('close-quick-order-modal');
            const quickQtyVal = document.getElementById('quick-qty-val');
            const quickOrderTotal = document.getElementById('quick-order-total');
            let quickOrderProduct = 'Fine Robusta Malang';
            let quickOrderPrice = 65000;
            let quickOrderGrind = 'Halus - Tubruk';
            let quickOrderQty = 1;

            const syncQuickOrderUI = () => {
                quickOrderTitle.textContent = quickOrderProduct;
                quickQtyVal.textContent = quickOrderQty;
                quickOrderTotal.textContent = formatRupiah(quickOrderPrice * quickOrderQty);
                document.querySelectorAll('[data-quick-grind]').forEach((btn) => {
                    const active = btn.dataset.quickGrind === quickOrderGrind;
                    btn.className = active
                        ? 'py-2.5 px-2 rounded-lg text-xs font-semibold border transition cursor-pointer bg-[#181512] text-white border-[#181512]'
                        : 'py-2.5 px-2 rounded-lg text-xs font-semibold border transition cursor-pointer bg-white text-[#181512] border-[#E5DFD5] hover:bg-[#F3EFE8]';
                });
            };

            document.querySelectorAll('[data-open-quick-order]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    quickOrderProduct = btn.dataset.productName || 'Fine Robusta Malang';
                    quickOrderPrice = Number(btn.dataset.productPrice || 65000);
                    quickOrderQty = 1;
                    syncQuickOrderUI();
                    quickOrderModal.classList.remove('hidden');
                    quickOrderModal.classList.add('flex');
                });
            });

            document.querySelectorAll('[data-quick-grind]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    quickOrderGrind = btn.dataset.quickGrind;
                    syncQuickOrderUI();
                });
            });

            document.getElementById('quick-qty-dec')?.addEventListener('click', () => {
                quickOrderQty = Math.max(1, quickOrderQty - 1);
                syncQuickOrderUI();
            });
            document.getElementById('quick-qty-inc')?.addEventListener('click', () => {
                quickOrderQty += 1;
                syncQuickOrderUI();
            });

            document.getElementById('confirm-quick-order-btn')?.addEventListener('click', () => {
                addItemToCart({
                    key: `fine-robusta-malang__${quickOrderGrind}`,
                    name: quickOrderProduct,
                    grind: quickOrderGrind,
                    weight: '200g',
                    price: quickOrderPrice,
                }, quickOrderQty);
                quickOrderModal.classList.add('hidden');
                quickOrderModal.classList.remove('flex');
                document.getElementById('katalog')?.scrollIntoView({ behavior: 'smooth' });
            });

            closeQuickOrderBtn?.addEventListener('click', () => {
                quickOrderModal.classList.add('hidden');
                quickOrderModal.classList.remove('flex');
            });
            quickOrderModal?.addEventListener('click', (e) => {
                if (e.target === quickOrderModal) {
                    quickOrderModal.classList.add('hidden');
                    quickOrderModal.classList.remove('flex');
                }
            });

            const shippingForm = document.getElementById('shipping-form');
            const invoiceModal = document.getElementById('invoice-modal');
            const closeInvoiceBtn = document.getElementById('close-invoice-modal');
            const invoiceNumberBadge = document.getElementById('invoice-number-badge');
            const invoiceCustName = document.getElementById('invoice-customer-name');
            const invoiceCustAddr = document.getElementById('invoice-customer-address');
            const invoiceCustPostal = document.getElementById('invoice-customer-postal');
            const invoiceCustPhone = document.getElementById('invoice-customer-phone');
            const invoiceItemsSummary = document.getElementById('invoice-items-summary');
            const invoiceSubtotal = document.getElementById('invoice-subtotal');
            const invoiceGrandTotal = document.getElementById('invoice-grand-total');
            const whatsappLink = document.getElementById('whatsapp-confirm-link');

            shippingForm?.addEventListener('submit', async (e) => {
                e.preventDefault();
                if (cart.length === 0) {
                    formErrorMsg.textContent = 'Tambahkan minimal 1 varian kopi ke Nota Pesanan terlebih dahulu.';
                    formErrorMsg.classList.remove('hidden');
                    return;
                }

                const name = (inputName?.value || '').trim();
                const address = (inputAddress?.value || '').trim();
                const postalCode = (inputPostalCode?.value || '').trim();
                const phone = (inputPhone?.value || '').trim();

                if (!name || !address || !postalCode || !phone) {
                    formErrorMsg.textContent = 'Mohon lengkapi Nama Penerima, Alamat Lengkap, Kode Pos, dan Nomor Telepon.';
                    formErrorMsg.classList.remove('hidden');
                    return;
                }

                saveCustomer();
                formErrorMsg.classList.add('hidden');

                const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
                const grandTotal = subtotal + shippingCost;
                let invoiceCode = 'ANM-' + String(Math.floor(1000 + Math.random() * 9000));

                try {
                    const response = await fetch('/api/orders', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            customer_name: name,
                            customer_phone: phone,
                            customer_address: address,
                            customer_postal_code: postalCode,
                            source: 'beranda',
                            items: cart.map((item) => ({
                                name: item.name,
                                grind: item.grind || null,
                                weight: item.weight || '200g',
                                price: Number(item.price),
                                qty: Number(item.qty),
                                batch_code: item.batch_code || null,
                            })),
                        }),
                    });

                    if (response.status === 422) {
                        const errData = await response.json();
                        const firstError = errData?.errors ? Object.values(errData.errors).flat()[0] : null;
                        formErrorMsg.textContent = firstError || errData?.message || 'Data pesanan tidak valid.';
                        formErrorMsg.classList.remove('hidden');
                        return;
                    }

                    if (response.ok) {
                        const result = await response.json();
                        if (result?.data?.invoice_number) {
                            invoiceCode = String(result.data.invoice_number).replace(/^#/, '');
                        }
                    }
                } catch (err) {
                }

                invoiceNumberBadge.textContent = `INVOICE #${invoiceCode}`;
                invoiceCustName.textContent = name;
                invoiceCustAddr.textContent = address;
                if (invoiceCustPostal) invoiceCustPostal.textContent = postalCode;
                invoiceCustPhone.textContent = phone;
                invoiceSubtotal.textContent = formatRupiah(subtotal);
                invoiceGrandTotal.textContent = formatRupiah(grandTotal);

                invoiceItemsSummary.innerHTML = cart.map((item) => `
                    <div class="flex items-start justify-between gap-3 py-1.5 border-b border-[#F1F0EC] last:border-0">
                        <div>
                            <p class="font-bold text-[#141413]">${item.qty}&times; ${escapeHtml(item.name)}</p>
                            <p class="text-[11px] text-[#6B6A65]">${escapeHtml(item.grind)} &bull; ${escapeHtml(item.weight)}</p>
                        </div>
                        <span class="font-bold text-[#141413]">${formatRupiah(item.price * item.qty)}</span>
                    </div>
                `).join('');

                const waLines = [
                    `Halo Tim Roastery *Kopi Anom*, saya ingin konfirmasi pesanan:`,
                    `No. Invoice: *#${invoiceCode}*`,
                    ``,
                    `*Rincian Pesanan:*`,
                    ...cart.map((item) => `- ${item.qty}x ${item.name} (${item.grind}, ${item.weight}) = ${formatRupiah(item.price * item.qty)}`),
                    ``,
                    `Subtotal: ${formatRupiah(subtotal)}`,
                    `Ongkir (Malang): ${formatRupiah(shippingCost)}`,
                    `*Total Bayar: ${formatRupiah(grandTotal)}*`,
                    ``,
                    `*Data Pengiriman:*`,
                    `Nama: ${name}`,
                    `Alamat: ${address}`,
                    `Kode Pos: ${postalCode}`,
                    `Telepon: ${phone}`,
                ];

                whatsappLink.href = `https://wa.me/${adminWhatsapp}?text=${encodeURIComponent(waLines.join('\n'))}`;

                invoiceModal.classList.remove('hidden');
                invoiceModal.classList.add('flex');
            });

            const closeInvoiceModal = () => {
                invoiceModal.classList.add('hidden');
                invoiceModal.classList.remove('flex');
            };

            closeInvoiceBtn?.addEventListener('click', closeInvoiceModal);
            invoiceModal?.addEventListener('click', (e) => {
                if (e.target === invoiceModal) closeInvoiceModal();
            });
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    if (!invoiceModal.classList.contains('hidden')) closeInvoiceModal();
                    if (!quickOrderModal.classList.contains('hidden')) {
                        quickOrderModal.classList.add('hidden');
                        quickOrderModal.classList.remove('flex');
                    }
                }
            });

            syncBlendUI(70);
            renderNota();

            const initScrollReveal = () => {
                const revealTargets = document.querySelectorAll('[data-reveal], [data-reveal-line]');
                if (!revealTargets.length) return;

                const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                if (prefersReducedMotion || !('IntersectionObserver' in window)) {
                    revealTargets.forEach((el) => el.classList.add('is-visible'));
                    return;
                }

                const isMobile = window.innerWidth < 768;
                const observerOptions = {
                    threshold: isMobile ? 0.05 : 0.1,
                    rootMargin: isMobile ? '0px 0px -20px 0px' : '0px 0px -36px 0px'
                };

                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            obs.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                requestAnimationFrame(() => {
                    revealTargets.forEach((el) => {
                        const rect = el.getBoundingClientRect();
                        if (rect.top < window.innerHeight * 0.95) {
                            el.classList.add('is-visible');
                        } else {
                            observer.observe(el);
                        }
                    });
                });
            };

            initScrollReveal();
        });
    </script>
</body>
</html>
