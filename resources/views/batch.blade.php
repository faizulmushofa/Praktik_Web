<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Anom — Sistem Lacak Batch</title>
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
            background-color: #F2F2F0;
            color: #111111;
            font-family: "Plus Jakarta Sans", ui-sans-serif, system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
    </style>
</head>
<body class="bg-[#F2F2F0] text-[#111111] min-h-screen flex flex-col">

    
    <header class="sticky top-0 z-50 bg-[#F2F2F0]/95 backdrop-blur-sm border-b border-[#E5E5E3]">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between gap-4">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 group shrink-0 whitespace-nowrap">
                <span class="w-7 h-7 rounded-full bg-[#111111] text-white flex items-center justify-center transition-transform duration-200 group-hover:scale-105">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9c0-4.97-4.03-9-9-9Z"/>
                        <path d="M12 3c-1.5 3.5-1.5 14.5 0 18"/>
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
                <button
                    type="button"
                    id="header-order-batch-btn"
                    class="inline-flex items-center gap-1.5 bg-[#111111] text-white text-xs font-semibold px-4 sm:px-5 py-2.5 rounded-full hover:bg-[#2A2A28] transition whitespace-nowrap shrink-0 cursor-pointer"
                >
                    <span id="header-order-batch-text">Pesan Batch Ini</span>
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </button>

                <button
                    type="button"
                    id="batch-mobile-menu-toggle"
                    aria-expanded="false"
                    aria-label="Buka menu navigasi"
                    class="md:hidden inline-flex items-center justify-center w-9 h-9 rounded-lg border border-[#E5E5E3] bg-white text-[#111111] hover:bg-[#F7F7F5] transition cursor-pointer"
                >
                    <svg id="batch-icon-open" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>
                    </svg>
                    <svg id="batch-icon-close" class="w-4 h-4 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <div id="batch-mobile-menu-panel" class="hidden md:hidden border-t border-[#E5E5E3] bg-[#F2F2F0] px-6 py-3 space-y-1">
            @foreach ($navLinks as $link)
                <a
                    href="{{ $link['href'] }}"
                    class="block px-3 py-2 rounded-lg text-xs {{ !empty($link['active']) ? 'font-bold bg-white text-[#111111]' : 'font-medium text-[#5E5E5A] hover:bg-white hover:text-[#111111]' }} transition"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </header>

    
    <section aria-label="Kontrol Pencarian dan Tab Lacak Batch" class="bg-white border-b border-[#E5E5E3]">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="py-3.5 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3.5">
                <div class="flex items-center gap-6 sm:gap-8 overflow-x-auto">
                    <button
                        type="button"
                        data-tab-target="paspor"
                        class="py-2 text-xs sm:text-[13px] font-bold border-b-2 border-[#111111] text-[#111111] transition cursor-pointer whitespace-nowrap"
                    >
                        Paspor Batch
                    </button>
                    <button
                        type="button"
                        data-tab-target="daftar"
                        class="py-2 text-xs sm:text-[13px] font-semibold border-b-2 border-transparent text-[#6E6E6A] hover:text-[#111111] transition cursor-pointer whitespace-nowrap"
                    >
                        Daftar Semua Batch (Aktif &amp; Arsip)
                    </button>
                </div>

                <form id="batch-search-form" class="flex items-center gap-2 w-full lg:w-auto" novalidate>
                    <div class="relative flex-1 lg:w-64">
                        <input
                            type="text"
                            id="batch-search-input"
                            name="kode"
                            value="{{ $activeCode }}"
                            placeholder="ANOM-04-ARG"
                            aria-label="Masukkan kode batch"
                            class="w-full px-3.5 py-2 rounded-lg border border-[#E5E5E3] bg-[#F8F8F6] text-xs font-semibold uppercase tracking-wide text-[#111111] placeholder:text-[#8E8E8A] focus:outline-none focus:border-[#111111] focus:bg-white transition"
                        >
                    </div>
                    <button
                        type="submit"
                        class="px-5 py-2 rounded-lg bg-[#111111] text-white text-xs font-bold hover:bg-[#2A2A28] transition cursor-pointer shrink-0"
                    >
                        Lacak
                    </button>
                </form>
            </div>

            
            <div id="batch-search-error" class="hidden pb-3">
                <div class="px-3.5 py-2 rounded-lg bg-red-50 border border-red-200 text-xs text-red-700 flex flex-wrap items-center justify-between gap-2">
                    <span id="batch-search-error-text">Kode batch tidak ditemukan.</span>
                    <button type="button" id="batch-search-reset" class="font-bold underline hover:text-red-900 cursor-pointer">
                        Lihat ANOM-04-ARG
                    </button>
                </div>
            </div>
        </div>

        
        <div id="quick-switcher-bar" class="bg-[#EAEAE7] border-t border-[#E5E5E3]">
            <div class="max-w-7xl mx-auto px-6 py-3 flex flex-wrap items-center gap-2.5">
                <span class="text-[11px] font-semibold text-[#5E5E5A] mr-1">Cek Cepat:</span>
                @foreach ($quickPickBatches as $qp)
                    @php
                        $isCurrent = $qp['kode'] === $activeCode;
                    @endphp
                    <button
                        type="button"
                        data-quick-batch="{{ $qp['kode'] }}"
                        class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold border transition cursor-pointer {{ $isCurrent ? 'bg-[#111111] text-white border-[#111111]' : 'bg-white text-[#111111] border-[#E5E5E3] hover:border-[#111111]' }}"
                    >
                        <span class="w-1.5 h-1.5 rounded-full {{ $isCurrent ? 'bg-[#16A34A]' : 'bg-[#6E6E6A]' }}" data-quick-dot></span>
                        <span>{{ $qp['tab_label'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

        
        <section id="tab-panel-paspor" class="space-y-10">
            
            <div class="bg-white rounded-2xl border border-[#E5E5E3] p-5 sm:p-7 shadow-[0_2px_10px_rgba(17,17,17,0.03)]">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
                    
                    <div class="lg:col-span-3">
                        <div class="relative h-56 lg:h-full min-h-[210px] rounded-xl overflow-hidden bg-[#ECEAE4] border border-[#E5E5E3]">
                            <img
                                id="passport-thumbnail"
                                src="{{ $initialBatch['thumbnail'] }}"
                                alt="{{ $initialBatch['title'] }}"
                                referrerpolicy="no-referrer"
                                onerror="this.onerror=null;this.src='data:image/svg+xml;utf8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22400%22 viewBox=%220 0 400 400%22%3E%3Crect width=%22400%22 height=%22400%22 fill=%22%23EAE8E3%22/%3E%3Ctext x=%2250%25%22 y=%2248%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-weight=%22bold%22 font-size=%2222%22 fill=%22%23111111%22%3EKOPI ANOM%3C/text%3E%3Ctext x=%2250%25%22 y=%2256%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-size=%2214%22 fill=%22%23666662%22%3EBatch Passport%3C/text%3E%3C/svg%3E';"
                                class="w-full h-full object-cover"
                            >
                            <div id="passport-verified-seal" class="absolute bottom-3 right-3 w-11 h-11 rounded-full {{ $initialBatch['is_archived'] ? 'bg-[#525250]' : 'bg-[#16A34A]' }} text-white flex flex-col items-center justify-center shadow-md border-2 border-white">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20 6 9 17l-5-5"/>
                                </svg>
                                <span class="text-[7px] font-extrabold tracking-wider uppercase leading-none mt-0.5">
                                    {{ $initialBatch['is_archived'] ? 'ARSIP' : 'VERIFIED' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="lg:col-span-5 flex flex-col justify-center">
                        <div>
                            <span
                                id="passport-badge"
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-extrabold uppercase tracking-wider {{ $initialBatch['is_archived'] ? 'bg-[#F0F0EE] text-[#555553] border border-[#E5E5E3]' : 'bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0]' }}"
                            >
                                {{ $initialBatch['badge_text'] }}
                            </span>
                        </div>

                        <h1 id="passport-title" class="mt-3.5 text-2xl sm:text-3xl font-extrabold tracking-tight text-[#111111] leading-tight">
                            {{ $initialBatch['title'] }}
                        </h1>

                        <p id="passport-subtitle" class="mt-2.5 text-xs sm:text-sm text-[#5E5E5A] leading-relaxed">
                            {{ $initialBatch['subtitle'] }}
                        </p>

                        <div class="mt-5 flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#F7F7F5] border border-[#E5E5E3] text-xs font-semibold text-[#111111]">
                                <svg class="w-3.5 h-3.5 text-[#DC2626]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span id="passport-lokasi">{{ $initialBatch['lokasi'] }}</span>
                            </span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-[#F7F7F5] border border-[#E5E5E3] text-xs font-semibold text-[#111111]">
                                Lot: <span id="passport-lot" class="ml-1 font-bold">{{ $initialBatch['kode'] }}</span>
                            </span>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-[#F7F7F5] border border-[#E5E5E3] text-xs font-semibold text-[#111111]">
                                Varietas: <span id="passport-varietas" class="ml-1 font-bold">{{ $initialBatch['varietas'] }}</span>
                            </span>
                        </div>
                    </div>

                    
                    <div class="lg:col-span-4 lg:border-l lg:border-[#ECECE8] lg:pl-7 grid grid-cols-2 gap-3 content-center">
                        <div class="p-3.5 rounded-xl bg-[#F8F8F6] border border-[#E5E5E3]">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-[#6E6E6A]">ASAL KEBUN</p>
                            <p id="metric-asal" class="mt-1.5 text-sm font-extrabold text-[#111111] tabular-nums">{{ $initialBatch['asal_kebun'] }}</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-[#F8F8F6] border border-[#E5E5E3]">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-[#6E6E6A]">KADAR AIR</p>
                            <p id="metric-air" class="mt-1.5 text-sm font-extrabold text-[#16A34A] tabular-nums">{{ $initialBatch['kadar_air'] }}</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-[#F8F8F6] border border-[#E5E5E3]">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-[#6E6E6A]">TANGGAL ROASTING</p>
                            <p id="metric-roast" class="mt-1.5 text-sm font-extrabold text-[#111111] tabular-nums">{{ $initialBatch['tanggal_roasting'] }}</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-[#F8F8F6] border border-[#E5E5E3]">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-[#6E6E6A]">MASA PUNCAK RASA</p>
                            <p id="metric-puncak" class="mt-1.5 text-sm font-extrabold text-[#111111] tabular-nums">{{ $initialBatch['puncak_rasa'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div>
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 mb-7">
                    <div>
                        <h2 class="text-2xl sm:text-[26px] font-extrabold tracking-tight text-[#111111]">
                            Jejak Perjalanan Kopimu
                        </h2>
                        <p class="mt-1 text-xs sm:text-sm text-[#5E5E5A]">
                            Lima tahap kendali mutu dengan data telemetri roastery dari kebun hingga cangkirmu.
                        </p>
                    </div>
                    <span class="inline-flex items-center self-start sm:self-auto px-3 py-1 rounded-full bg-[#DCFCE7] text-[#15803D] text-[10px] font-extrabold uppercase tracking-wider">
                        5 TAHAP &bull; 100% TERCATAT
                    </span>
                </div>

                <div class="relative pl-10 sm:pl-12 space-y-5">
                    
                    <div class="absolute left-[15px] sm:left-[17px] top-6 bottom-8 w-[2px] bg-[#16A34A]/70" aria-hidden="true"></div>

                    
                    <div id="timeline-stages-container" class="space-y-5">
                        @foreach ($initialBatch['timeline'] as $stage)
                            <div class="relative">
                                <div class="absolute -left-10 sm:-left-12 top-5 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-[#16A34A] text-white text-xs font-extrabold flex items-center justify-center ring-4 ring-[#F2F2F0] tabular-nums">
                                    {{ $stage['step'] }}
                                </div>
                                <div class="bg-white rounded-2xl border border-[#E5E5E3] p-5 sm:p-6 flex flex-col-reverse sm:flex-row items-start justify-between gap-5 shadow-[0_1px_4px_rgba(17,17,17,0.02)]">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-[11px] font-semibold text-[#6E6E6A]">{{ $stage['date'] }}</p>
                                        <h3 class="mt-1 text-base sm:text-lg font-extrabold text-[#111111]">
                                            {{ $stage['title'] }}
                                        </h3>
                                        <p class="mt-2 text-xs sm:text-sm text-[#5E5E5A] leading-relaxed">
                                            {{ $stage['desc'] }}
                                        </p>
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            @foreach ($stage['stats'] as $stat)
                                                <span class="inline-flex items-center px-3 py-1 rounded-lg bg-[#F5F5F3] border border-[#E5E5E3] text-[11px] font-semibold text-[#333330]">
                                                    {{ $stat }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="w-full sm:w-48 shrink-0">
                                        <img
                                            src="{{ $stage['image'] }}"
                                            alt="{{ $stage['image_alt'] }}"
                                            referrerpolicy="no-referrer"
                                            onerror="this.onerror=null;this.src='data:image/svg+xml;utf8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22260%22 viewBox=%220 0 400 260%22%3E%3Crect width=%22400%22 height=%22260%22 fill=%22%23EAE8E3%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-weight=%22bold%22 font-size=%2216%22 fill=%22%23555553%22%3ETahap {{ $stage['step'] }} - Kopi Anom%3C/text%3E%3C/svg%3E';"
                                            class="w-full sm:w-48 h-32 object-cover rounded-xl bg-[#EAE8E3]"
                                        >
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    
                    <div class="relative">
                        <div class="absolute -left-10 sm:-left-12 top-6 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-[#16A34A] text-white text-xs font-extrabold flex items-center justify-center ring-4 ring-[#F2F2F0] tabular-nums">
                            05
                        </div>
                        <div class="bg-[#111111] text-white rounded-2xl p-6 sm:p-7 shadow-lg">
                            <span
                                id="stage5-status-badge"
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#16A34A]/20 border border-[#16A34A]/40 text-[#4ADE80] text-[10px] font-extrabold uppercase tracking-wider"
                            >
                                {{ $initialBatch['status_tahap_5'] }}
                            </span>

                            <h3 class="mt-3.5 text-xl sm:text-2xl font-extrabold tracking-tight text-white">
                                05. Tiba di Tangan Pelanggan
                            </h3>
                            <p id="stage5-desc" class="mt-2 text-xs sm:text-sm text-[#B8B8B2] leading-relaxed max-w-2xl">
                                {{ $initialBatch['tahap_5_desc'] }}
                            </p>

                            
                            <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                                <div class="p-4 rounded-xl bg-[#1C1C1A] border border-[#2C2C29]">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#9A9A94]">
                                        PANDUAN TAKARAN TUBRUK
                                    </p>
                                    <p id="stage5-tubruk" class="mt-1.5 text-sm font-extrabold text-white">
                                        Tubruk: {{ $initialBatch['takaran_tubruk'] }}
                                    </p>
                                </div>
                                <div class="p-4 rounded-xl bg-[#1C1C1A] border border-[#2C2C29]">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#9A9A94]">
                                        PANDUAN TAKARAN BARISTA
                                    </p>
                                    <p id="stage5-barista" class="mt-1.5 text-sm font-extrabold text-white">
                                        V60 Barista: {{ $initialBatch['takaran_barista'] }}
                                    </p>
                                </div>
                            </div>

                            
                            <div class="mt-6 flex flex-wrap items-center gap-3">
                                <button
                                    type="button"
                                    id="stage5-order-btn"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-white text-[#111111] text-xs font-extrabold hover:bg-[#EAE8E3] transition cursor-pointer"
                                >
                                    <span>Pesan Ulang Batch Ini &rarr;</span>
                                </button>
                                <a
                                    id="stage5-wa-review"
                                    href="https://wa.me/{{ $adminWhatsapp }}?text={{ urlencode('Halo Tim Roastery Kopi Anom, saya ingin mengirim ulasan untuk Batch ' . $initialBatch['kode'] . ' (' . $initialBatch['title'] . ').') }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg border border-[#3A3A36] bg-transparent text-white text-xs font-bold hover:bg-[#1E1E1C] transition"
                                >
                                    <span>Kirim Ulasan via WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-2xl border border-[#E5E5E3] p-6 sm:p-8 shadow-[0_2px_10px_rgba(17,17,17,0.03)]">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <div class="lg:col-span-6">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#6E6E6A]">
                            PROFIL KARAKTER RASA ROASTERY
                        </span>
                        <h2 id="flavor-heading" class="mt-2 text-2xl sm:text-[26px] font-extrabold tracking-tight text-[#111111]">
                            {{ $initialBatch['flavor_title'] }}
                        </h2>

                        <div id="flavor-pills-container" class="mt-4 flex flex-wrap gap-2">
                            @foreach ($initialBatch['flavor_notes'] as $note)
                                <span class="px-3.5 py-1.5 rounded-full bg-[#F5F5F3] border border-[#E5E5E3] text-xs font-semibold text-[#111111]">
                                    {{ $note }}
                                </span>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            <p class="text-[10px] font-extrabold uppercase tracking-wider text-[#16A34A]">
                                CATATAN ROASTER
                            </p>
                            <p id="roaster-note-text" class="mt-2 text-xs sm:text-sm text-[#555552] leading-relaxed">
                                {{ $initialBatch['roaster_note'] }}
                            </p>
                        </div>

                        <div class="mt-6 p-4 rounded-xl bg-[#F8F8F6] border border-[#E5E5E3] flex items-center gap-3.5">
                            <span class="w-9 h-9 rounded-full bg-[#DCFCE7] text-[#16A34A] flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20 6 9 17l-5-5"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-[11px] text-[#6E6E6A] font-medium">Diverifikasi oleh:</p>
                                <p id="roaster-verifier" class="text-xs sm:text-sm font-extrabold text-[#111111]">
                                    {{ $initialBatch['roaster_verifier'] }}
                                </p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="lg:col-span-6 lg:border-l lg:border-[#ECECE8] lg:pl-8 flex flex-col items-center">
                        <h3 class="text-xs sm:text-sm font-extrabold text-[#111111] text-center">
                            Profil Karakter Rasa (Skala 1–5)
                        </h3>

                        <div class="mt-3 w-full max-w-[320px]">
                            <svg id="radar-svg" viewBox="0 0 320 290" class="w-full h-auto overflow-visible" aria-label="Grafik Pentagon Radar Profil Karakter Rasa">
                                
                                <g id="radar-grid" stroke="#E2E2DE" stroke-width="1" fill="none"></g>
                                
                                <g id="radar-axes" stroke="#E2E2DE" stroke-width="1"></g>
                                
                                <polygon id="radar-polygon" fill="rgba(22, 163, 74, 0.16)" stroke="#16A34A" stroke-width="2.2" stroke-linejoin="round" points=""></polygon>
                                
                                <g id="radar-points"></g>
                                
                                <g id="radar-labels"></g>
                            </svg>
                        </div>

                        
                        <div id="radar-bars" class="mt-2 w-full max-w-[320px] space-y-2.5 text-xs"></div>
                    </div>
                </div>
            </div>
        </section>

        
        <section id="tab-panel-daftar" class="hidden space-y-10">
            
            <div>
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 mb-6">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#16A34A]">
                            STOK ROASTERY TERKINI
                        </span>
                        <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-[#111111]">
                            Batch Segar yang Masih Tersedia
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach ($activeListBatches as $ab)
                        @php
                            $pct = $ab['stock_total'] > 0 ? round(($ab['stock_remaining'] / $ab['stock_total']) * 100) : 0;
                            $badgeStyle = match ($ab['status_type']) {
                                'limited' => 'bg-amber-50 text-amber-700 border-amber-200',
                                'fermenting' => 'bg-[#F3F4F6] text-[#374151] border-[#D1D5DB]',
                                default => 'bg-[#F0FDF4] text-[#16A34A] border-[#BBF7D0]',
                            };
                            $barColor = match ($ab['status_type']) {
                                'limited' => 'bg-amber-500',
                                'fermenting' => 'bg-[#525250]',
                                default => 'bg-[#16A34A]',
                            };
                        @endphp
                        <article class="bg-white rounded-2xl border border-[#E5E5E3] p-5 flex flex-col justify-between shadow-[0_2px_8px_rgba(17,17,17,0.03)]">
                            <div>
                                <div class="flex items-start justify-between gap-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider border {{ $badgeStyle }}">
                                        {{ $ab['stock_badge'] }}
                                    </span>
                                    <span class="text-[11px] font-mono font-bold text-[#6E6E6A]">
                                        {{ $ab['kode'] }}
                                    </span>
                                </div>

                                <div class="mt-4 flex items-center gap-4">
                                    <img
                                        src="{{ $ab['thumbnail'] }}"
                                        alt="{{ $ab['short_title'] }}"
                                        referrerpolicy="no-referrer"
                                        onerror="this.onerror=null;this.src='data:image/svg+xml;utf8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22 viewBox=%220 0 120 120%22%3E%3Crect width=%22120%22 height=%22120%22 fill=%22%23EAE8E3%22/%3E%3Ctext x=%2250%25%22 y=%2252%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-weight=%22bold%22 font-size=%2214%22 fill=%22%23111111%22%3EANOM%3C/text%3E%3C/svg%3E';"
                                        class="w-16 h-16 rounded-xl object-cover shrink-0 border border-[#E5E5E3] bg-[#EAE8E3]"
                                    >
                                    <div class="min-w-0">
                                        <h3 class="text-base font-extrabold text-[#111111] leading-snug">
                                            {{ $ab['short_title'] }}
                                        </h3>
                                        <p class="mt-1 text-xs text-[#5E5E5A]">
                                            {{ $ab['asal_kebun'] }} &bull; {{ $ab['tanggal_roasting'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div class="flex items-center justify-between text-[11px] font-semibold text-[#5E5E5A] mb-1.5">
                                        <span>{{ $ab['status_type'] === 'fermenting' ? 'Slot Pre-Order Tersedia' : 'Sisa Stok Batch' }}</span>
                                        <span class="font-bold text-[#111111] tabular-nums">{{ $ab['stock_remaining'] }}/{{ $ab['stock_total'] }} Pouch</span>
                                    </div>
                                    <div class="w-full h-2 rounded-full bg-[#ECECE8] overflow-hidden">
                                        <div class="h-full rounded-full {{ $barColor }}" style="width: {{ $pct }}%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 pt-4 border-t border-[#F0EFEA] flex items-center gap-2.5">
                                <button
                                    type="button"
                                    data-open-passport="{{ $ab['kode'] }}"
                                    class="flex-1 py-2.5 px-4 rounded-lg border border-[#E5E5E3] bg-white text-[#111111] text-xs font-bold hover:border-[#111111] hover:bg-[#F8F8F6] transition cursor-pointer"
                                >
                                    Lihat Paspor
                                </button>
                                <button
                                    type="button"
                                    data-order-batch="{{ $ab['kode'] }}"
                                    class="flex-1 py-2.5 px-4 rounded-lg bg-[#111111] text-white text-xs font-bold text-center hover:bg-[#2A2A28] transition cursor-pointer"
                                >
                                    {{ $ab['status_type'] === 'fermenting' ? 'Booking Pre-Order' : 'Pesan' }}
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            
            <div class="bg-white rounded-2xl border border-[#E5E5E3] overflow-hidden shadow-[0_2px_8px_rgba(17,17,17,0.03)]">
                <div class="p-5 sm:p-6 border-b border-[#E5E5E3]">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#6E6E6A]">
                        ARSIP TRANSPARANSI ROASTERY
                    </span>
                    <h2 class="mt-1 text-lg sm:text-xl font-extrabold tracking-tight text-[#111111]">
                        Riwayat Batch Sebelumnya - Sudah Habis Terjual
                    </h2>
                    <p class="mt-1 text-xs text-[#5E5E5A]">
                        Setiap arsip batch tetap kami simpan agar pemilik kemasan lama selalu dapat memverifikasi asal kopi mereka.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#F8F8F6] border-b border-[#E5E5E3] text-[10px] font-bold uppercase tracking-wider text-[#6E6E6A]">
                                <th class="py-3.5 px-5">Kode Batch</th>
                                <th class="py-3.5 px-5">Varian Kopi</th>
                                <th class="py-3.5 px-5">Asal &amp; Ketinggian</th>
                                <th class="py-3.5 px-5">Tanggal Sangrai</th>
                                <th class="py-3.5 px-5">Status</th>
                                <th class="py-3.5 px-5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#ECECE8] text-xs">
                            @foreach ($archiveListBatches as $arc)
                                <tr class="hover:bg-[#FAF9F7] transition-colors">
                                    <td class="py-4 px-5 font-mono font-bold text-[#111111] whitespace-nowrap">
                                        {{ $arc['kode'] }}
                                    </td>
                                    <td class="py-4 px-5 font-bold text-[#111111] whitespace-nowrap">
                                        {{ $arc['short_title'] }}
                                    </td>
                                    <td class="py-4 px-5 text-[#5E5E5A] whitespace-nowrap">
                                        {{ $arc['lokasi'] }} ({{ $arc['asal_kebun'] }})
                                    </td>
                                    <td class="py-4 px-5 text-[#5E5E5A] tabular-nums whitespace-nowrap">
                                        {{ $arc['tanggal_roasting'] }}
                                    </td>
                                    <td class="py-4 px-5 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-[#F0F0EE] border border-[#E5E5E3] text-[10px] font-extrabold uppercase tracking-wider text-[#555553]">
                                            {{ $arc['stock_badge'] }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-5 text-right whitespace-nowrap">
                                        <button
                                            type="button"
                                            data-open-passport="{{ $arc['kode'] }}"
                                            class="inline-flex items-center gap-1 text-xs font-extrabold text-[#111111] hover:underline cursor-pointer"
                                        >
                                            <span>Buka Paspor &rarr;</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

    
    <footer class="bg-[#111111] text-white mt-auto">
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
                        <path d="M5 12h14"/>
                        <path d="m12 5 7 7-7 7"/>
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
    
    <div
        id="batch-floating-cart"
        class="fixed bottom-6 right-6 z-40 hidden transition-all duration-300 transform translate-y-0"
    >
        <button
            type="button"
            id="open-floating-cart-btn"
            class="flex items-center gap-3 px-4.5 py-3 rounded-full bg-[#111111] text-white shadow-2xl hover:bg-[#222220] hover:scale-105 active:scale-95 transition-all border border-[#2D2D2A] cursor-pointer"
        >
            <div class="relative">
                <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/>
                </svg>
                <span id="floating-cart-count" class="absolute -top-1.5 -right-2 px-1.5 py-0.2 min-w-4 text-[10px] font-extrabold rounded-full bg-[#16A34A] text-white text-center tabular-nums">0</span>
            </div>
            <div class="text-left">
                <p class="text-[10px] font-medium text-[#A3A39E] uppercase tracking-wider">Nota Batch</p>
                <p id="floating-cart-total" class="text-xs font-extrabold text-white tabular-nums">Rp 0</p>
            </div>
            <span class="text-xs font-bold text-[#16A34A] flex items-center gap-1 pl-1 border-l border-[#333330]">
                Checkout &rarr;
            </span>
        </button>
    </div>

    <div
        id="batch-order-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-4 bg-black/60 backdrop-blur-sm"
        role="dialog"
        aria-modal="true"
        aria-labelledby="batch-order-modal-title"
    >
        <div class="w-full max-w-xl rounded-2xl bg-white border border-[#E5E5E3] p-5 sm:p-7 shadow-2xl max-h-[92vh] overflow-y-auto flex flex-col gap-5">
            <div class="flex items-start justify-between gap-4 pb-4 border-b border-[#ECEAE4]">
                <div>
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-[#F1F0EC] text-[#141413] text-[10px] font-extrabold uppercase tracking-wider">
                        PESAN LANGSUNG BATCH KHUSUS
                    </span>
                    <h3 id="batch-order-modal-title" class="mt-1.5 text-lg font-extrabold text-[#141413]">
                        Pesan Batch Kopi Anom
                    </h3>
                </div>
                <button
                    type="button"
                    id="close-batch-order-modal"
                    aria-label="Tutup modal pemesanan"
                    class="w-8 h-8 rounded-lg border border-[#E5E4DF] bg-[#F7F6F2] text-[#5C5B57] hover:text-[#141413] flex items-center justify-center transition cursor-pointer"
                >
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <div class="bg-[#F8F8F6] border border-[#E8E8E4] rounded-2xl p-4 sm:p-5">
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                    <div>
                        <div class="flex items-center gap-2">
                            <span id="modal-batch-code-badge" class="px-2.5 py-0.5 rounded-full bg-[#111111] text-white text-[10px] font-mono font-bold tracking-wider">
                                ANOM-04-ARG
                            </span>
                            <span id="modal-batch-stock" class="text-xs font-semibold text-[#16A34A] tabular-nums">
                                Sisa 14/60 Pouch
                            </span>
                        </div>
                        <h4 id="modal-batch-title" class="mt-2 text-base font-extrabold text-[#111111] leading-tight">
                            Arabica Malang — Batch #04
                        </h4>
                    </div>
                    <div class="sm:text-right">
                        <span class="text-[10px] uppercase font-bold text-[#6E6E6A] block">Harga 200g</span>
                        <span id="modal-batch-price" class="text-base font-extrabold text-[#111111] tabular-nums">
                            Rp 85.000
                        </span>
                    </div>
                </div>

                <div id="modal-preorder-notice" class="hidden mt-3.5 p-3 rounded-xl bg-amber-50 border border-amber-200 text-amber-900 text-xs flex items-start gap-2.5 leading-relaxed">
                    <svg class="w-4 h-4 text-amber-600 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <span id="modal-preorder-text">
                        Jadwal Kirim Pre-Order: 12 Nov 2026 (Segera setelah proses fermentasi &amp; sangrai selesai)
                    </span>
                </div>

                <div class="mt-4 pt-3.5 border-t border-[#E8E8E4] space-y-3">
                    <div>
                        <label class="block text-[11px] font-bold text-[#5E5E5A] uppercase tracking-wider mb-2">
                            PILIHAN GILINGAN (200G):
                        </label>
                        <div class="grid grid-cols-3 gap-2" id="modal-grind-options">
                            <button
                                type="button"
                                data-modal-grind="Biji Utuh"
                                class="modal-grind-pill py-2 px-2.5 text-center text-xs font-semibold rounded-lg border transition cursor-pointer"
                            >
                                Biji Utuh
                            </button>
                            <button
                                type="button"
                                data-modal-grind="Halus - Tubruk"
                                class="modal-grind-pill py-2 px-2.5 text-center text-xs font-semibold rounded-lg border transition cursor-pointer"
                            >
                                Halus - Tubruk
                            </button>
                            <button
                                type="button"
                                data-modal-grind="Kasar - Barista"
                                class="modal-grind-pill py-2 px-2.5 text-center text-xs font-semibold rounded-lg border transition cursor-pointer"
                            >
                                Kasar - Barista
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label class="text-[11px] font-bold text-[#5E5E5A] uppercase tracking-wider">
                            JUMLAH POUCH:
                        </label>
                        <div class="flex items-center gap-3">
                            <div class="flex items-center border border-[#D5D5D0] rounded-lg bg-white overflow-hidden shadow-xs">
                                <button
                                    type="button"
                                    id="modal-qty-minus"
                                    class="w-8 h-8 flex items-center justify-center text-sm font-bold text-[#111111] hover:bg-[#F2F2F0] transition cursor-pointer"
                                    aria-label="Kurangi jumlah"
                                >
                                    &minus;
                                </button>
                                <span id="modal-qty-val" class="px-3 text-xs font-bold text-[#111111] tabular-nums select-none">
                                    1
                                </span>
                                <button
                                    type="button"
                                    id="modal-qty-plus"
                                    class="w-8 h-8 flex items-center justify-center text-sm font-bold text-[#111111] hover:bg-[#F2F2F0] transition cursor-pointer"
                                    aria-label="Tambah jumlah"
                                >
                                    +
                                </button>
                            </div>
                            <span id="modal-max-stock-text" class="text-[11px] text-[#7A7A75]">
                                (Maks. 14)
                            </span>
                        </div>
                    </div>

                    <button
                        type="button"
                        id="modal-btn-add-batch"
                        class="w-full mt-2 py-2.5 px-4 rounded-xl bg-white hover:bg-[#F2F2EE] border border-[#D5D5CE] text-[#111111] text-xs font-bold transition flex items-center justify-center gap-2 cursor-pointer shadow-xs"
                    >
                        <span>+ Tambahkan Pouch Ini ke Nota Keranjang</span>
                    </button>
                </div>
            </div>

            <div class="p-4 sm:p-5 rounded-2xl bg-[#FAFAF8] border border-[#E8E8E4]">
                <div class="flex items-center justify-between pb-3 border-b border-[#ECEAE4]">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-[#111111] uppercase tracking-wider">
                            Ringkasan Nota Pesanan
                        </span>
                        <span id="modal-cart-count-badge" class="px-2 py-0.5 rounded-full bg-[#111111] text-white text-[10px] font-extrabold tabular-nums">
                            0 Item
                        </span>
                    </div>
                    <span class="text-[11px] text-[#7A7A75]">
                        Tersinkron dengan Nota Beranda
                    </span>
                </div>

                <div id="modal-cart-empty" class="py-5 text-center text-xs text-[#8A8A85]">
                    Belum ada item di nota. Klik tombol tambah di atas atau pilih varian lain.
                </div>

                <div id="modal-cart-items-list" class="divide-y divide-[#EFEFEA] max-h-44 overflow-y-auto pr-1"></div>

                <div class="mt-3 pt-3 border-t border-[#ECEAE4] space-y-1.5 text-xs">
                    <div class="flex justify-between text-[#6E6E6A]">
                        <span>Subtotal Produk</span>
                        <span id="modal-cart-subtotal" class="font-bold text-[#111111] tabular-nums">Rp 0</span>
                    </div>
                    <div class="flex justify-between text-[#6E6E6A]">
                        <span>Ongkos Kirim Flat (Malang)</span>
                        <span id="modal-cart-shipping" class="font-bold text-[#111111] tabular-nums">Rp 10.000</span>
                    </div>
                    <div class="flex justify-between pt-2 border-t border-[#ECEAE4] text-sm font-extrabold text-[#111111]">
                        <span>Total Pembayaran</span>
                        <span id="modal-cart-grand-total" class="tabular-nums">Rp 0</span>
                    </div>
                </div>
            </div>

            <div class="space-y-3.5">
                <span class="block text-xs font-bold text-[#111111] uppercase tracking-wider">
                    DATA PENGIRIMAN (KOTA / KAB. MALANG)
                </span>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-semibold text-[#5E5E5A] mb-1">Nama Lengkap</label>
                        <input
                            type="text"
                            id="batch-customer-name"
                            placeholder="Contoh: Budi Santoso"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-[#D5D5D0] text-xs text-[#111111] bg-white focus:outline-none focus:border-[#111111]"
                        >
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-[#5E5E5A] mb-1">Nomor WhatsApp</label>
                        <input
                            type="tel"
                            id="batch-customer-phone"
                            placeholder="Contoh: 081234567890"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-[#D5D5D0] text-xs text-[#111111] bg-white focus:outline-none focus:border-[#111111]"
                        >
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold text-[#5E5E5A] mb-1">Alamat Pengiriman Lengkap</label>
                    <textarea
                        id="batch-customer-address"
                        rows="2"
                        placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan, kecamatan"
                        class="w-full px-3.5 py-2 rounded-xl border border-[#D5D5D0] text-xs text-[#111111] bg-white focus:outline-none focus:border-[#111111]"
                    ></textarea>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold text-[#5E5E5A] mb-1">Kode Pos</label>
                    <input
                        type="text"
                        id="batch-customer-postal"
                        placeholder="Contoh: 65111"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-[#D5D5D0] text-xs text-[#111111] bg-white focus:outline-none focus:border-[#111111]"
                    >
                </div>

                <div id="batch-form-error" class="hidden p-3 rounded-xl bg-red-50 border border-red-200 text-xs text-red-700 font-medium"></div>

                <div class="pt-2 flex flex-col sm:flex-row gap-3">
                    <button
                        type="button"
                        id="btn-save-and-browse-more"
                        class="flex-1 py-3 px-4 rounded-xl border-2 border-[#111111] bg-white text-[#111111] text-xs font-bold hover:bg-[#F5F5F3] transition text-center cursor-pointer"
                    >
                        + Simpan ke Nota &amp; Pilih Batch Lain
                    </button>
                    <button
                        type="button"
                        id="btn-confirm-and-pay"
                        class="flex-1 py-3 px-4 rounded-xl bg-[#111111] text-white text-xs font-extrabold hover:bg-[#2A2A28] transition text-center cursor-pointer flex items-center justify-center gap-1.5 shadow-md"
                    >
                        <span>Konfirmasi &amp; Bayar Pesanan &rarr;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div
        id="batch-invoice-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-4 bg-black/60 backdrop-blur-sm"
        role="dialog"
        aria-modal="true"
        aria-labelledby="batch-invoice-modal-title"
    >
        <div class="w-full max-w-lg rounded-2xl bg-white border border-[#ECEAE4] p-6 sm:p-7 shadow-2xl max-h-[92vh] overflow-y-auto">
            <div class="flex items-start justify-between gap-4 pb-4 border-b border-[#ECEAE4]">
                <div>
                    <span id="batch-invoice-number-badge" class="inline-block px-2.5 py-0.5 rounded-full bg-[#F1F0EC] text-[#141413] text-[10px] font-extrabold uppercase tracking-wider">
                        INVOICE #ANM-B4021
                    </span>
                    <h3 id="batch-invoice-modal-title" class="mt-1.5 text-lg font-extrabold text-[#141413]">
                        Ringkasan Nota &amp; Pembayaran QRIS
                    </h3>
                </div>
                <button
                    type="button"
                    id="close-batch-invoice-modal"
                    aria-label="Tutup invoice"
                    class="w-8 h-8 rounded-lg border border-[#E5E4DF] bg-[#F7F6F2] text-[#5C5B57] hover:text-[#141413] flex items-center justify-center transition cursor-pointer"
                >
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <div class="mt-4 p-3.5 rounded-xl bg-[#F7F6F2] border border-[#ECEAE4] text-xs space-y-1">
                <p class="font-bold text-[#141413]" id="batch-invoice-customer-name">Nama Pemesan</p>
                <p class="text-[#6B6A65]">
                    <span id="batch-invoice-customer-address">Alamat</span>
                    (Kode Pos: <span id="batch-invoice-customer-postal">65111</span>)
                </p>
                <p class="text-[#6B6A65]" id="batch-invoice-customer-phone">081234567890</p>
            </div>

            <div id="batch-invoice-items" class="mt-4 space-y-2 text-xs max-h-40 overflow-y-auto pr-1"></div>

            <div class="mt-4 pt-3 border-t border-[#ECEAE4] space-y-1.5 text-xs">
                <div class="flex justify-between text-[#6B6A65]">
                    <span>Subtotal</span>
                    <span id="batch-invoice-subtotal" class="font-semibold text-[#141413]">Rp 0</span>
                </div>
                <div class="flex justify-between text-[#6B6A65]">
                    <span>Ongkir (Malang)</span>
                    <span class="font-semibold text-[#141413]">Rp 10.000</span>
                </div>
                <div class="flex justify-between pt-2 border-t border-[#ECEAE4] text-sm font-extrabold text-[#141413]">
                    <span>Total Pembayaran</span>
                    <span id="batch-invoice-grand-total">Rp 0</span>
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
                    <p class="mt-1 text-[11px] text-[#6B6A65]">Setelah transfer, klik tombol di bawah agar tim roastery langsung memverifikasi batch pesananmu.</p>
                </div>
            </div>

            <div class="mt-5 flex flex-col sm:flex-row gap-2.5">
                <a
                    id="batch-whatsapp-confirm-link"
                    href="#"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-[#16A34A] text-white text-xs font-bold hover:bg-[#15803D] transition shadow-md"
                >
                    <span>Kirim Pesanan ke WhatsApp Admin &amp; Konfirmasi Pembayaran</span>
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    </footer>

    <script>
        window.batchesData = @json($batches);

        document.addEventListener('DOMContentLoaded', () => {
            const batchesData = window.batchesData || {};
            const adminWhatsapp = '{{ $adminWhatsapp }}';
            let currentCode = '{{ $activeCode }}';
            let currentTab = 'paspor';

            const tabButtons = document.querySelectorAll('[data-tab-target]');
            const tabPanelPaspor = document.getElementById('tab-panel-paspor');
            const tabPanelDaftar = document.getElementById('tab-panel-daftar');
            const quickSwitcherBar = document.getElementById('quick-switcher-bar');
            const quickButtons = document.querySelectorAll('[data-quick-batch]');

            const searchForm = document.getElementById('batch-search-form');
            const searchInput = document.getElementById('batch-search-input');
            const searchErrorBox = document.getElementById('batch-search-error');
            const searchErrorText = document.getElementById('batch-search-error-text');
            const searchResetBtn = document.getElementById('batch-search-reset');

            const escapeHtml = (str) => String(str)
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');

            const mobileBtn = document.getElementById('batch-mobile-menu-toggle');
            const mobilePanel = document.getElementById('batch-mobile-menu-panel');
            const iconOpen = document.getElementById('batch-icon-open');
            const iconClose = document.getElementById('batch-icon-close');

            mobileBtn?.addEventListener('click', () => {
                const isHidden = mobilePanel?.classList.contains('hidden');
                mobilePanel?.classList.toggle('hidden', !isHidden);
                iconOpen?.classList.toggle('hidden', Boolean(isHidden));
                iconClose?.classList.toggle('hidden', !isHidden);
                mobileBtn.setAttribute('aria-expanded', String(Boolean(isHidden)));
            });

            function switchTab(targetTab) {
                currentTab = targetTab;
                tabButtons.forEach((btn) => {
                    const active = btn.dataset.tabTarget === targetTab;
                    btn.className = active
                        ? 'py-2 text-xs sm:text-[13px] font-bold border-b-2 border-[#111111] text-[#111111] transition cursor-pointer whitespace-nowrap'
                        : 'py-2 text-xs sm:text-[13px] font-semibold border-b-2 border-transparent text-[#6E6E6A] hover:text-[#111111] transition cursor-pointer whitespace-nowrap';
                });

                if (targetTab === 'paspor') {
                    tabPanelPaspor.classList.remove('hidden');
                    tabPanelDaftar.classList.add('hidden');
                    quickSwitcherBar.classList.remove('hidden');
                } else {
                    tabPanelPaspor.classList.add('hidden');
                    tabPanelDaftar.classList.remove('hidden');
                    quickSwitcherBar.classList.add('hidden');
                }
            }

            tabButtons.forEach((btn) => {
                btn.addEventListener('click', () => switchTab(btn.dataset.tabTarget));
            });

            function renderRadarChart(scores) {
                const svgNS = 'http://www.w3.org/2000/svg';
                const gridEl = document.getElementById('radar-grid');
                const axesEl = document.getElementById('radar-axes');
                const polygonEl = document.getElementById('radar-polygon');
                const pointsEl = document.getElementById('radar-points');
                const labelsEl = document.getElementById('radar-labels');
                const barsEl = document.getElementById('radar-bars');

                const cx = 160;
                const cy = 148;
                const radius = 84;
                const axesOrder = ['Aroma', 'Acidity', 'Sweetness', 'Body', 'Clean Finish'];
                const count = axesOrder.length;

                gridEl.innerHTML = '';
                axesEl.innerHTML = '';
                pointsEl.innerHTML = '';
                labelsEl.innerHTML = '';

                const getPoint = (index, ratio) => {
                    const angle = (-Math.PI / 2) + (index * 2 * Math.PI) / count;
                    return {
                        x: cx + Math.cos(angle) * radius * ratio,
                        y: cy + Math.sin(angle) * radius * ratio,
                        angle,
                    };
                };

                for (let level = 1; level <= 5; level++) {
                    const ratio = level / 5;
                    const pts = [];
                    for (let i = 0; i < count; i++) {
                        const p = getPoint(i, ratio);
                        pts.push(`${p.x.toFixed(1)},${p.y.toFixed(1)}`);
                    }
                    const poly = document.createElementNS(svgNS, 'polygon');
                    poly.setAttribute('points', pts.join(' '));
                    gridEl.appendChild(poly);
                }

                axesOrder.forEach((axisName, i) => {
                    const outer = getPoint(i, 1);
                    const line = document.createElementNS(svgNS, 'line');
                    line.setAttribute('x1', cx);
                    line.setAttribute('y1', cy);
                    line.setAttribute('x2', outer.x.toFixed(1));
                    line.setAttribute('y2', outer.y.toFixed(1));
                    axesEl.appendChild(line);

                    const labelPos = getPoint(i, 1.28);
                    const text = document.createElementNS(svgNS, 'text');
                    text.setAttribute('x', labelPos.x.toFixed(1));
                    text.setAttribute('y', labelPos.y.toFixed(1));
                    text.setAttribute('text-anchor', 'middle');
                    text.setAttribute('font-family', 'Plus Jakarta Sans, sans-serif');

                    const tspanName = document.createElementNS(svgNS, 'tspan');
                    tspanName.setAttribute('x', labelPos.x.toFixed(1));
                    tspanName.setAttribute('dy', '-0.2em');
                    tspanName.setAttribute('font-size', '10.5');
                    tspanName.setAttribute('font-weight', '600');
                    tspanName.setAttribute('fill', '#555552');
                    tspanName.textContent = axisName;

                    const val = Number(scores[axisName] ?? 0).toFixed(1);
                    const tspanVal = document.createElementNS(svgNS, 'tspan');
                    tspanVal.setAttribute('x', labelPos.x.toFixed(1));
                    tspanVal.setAttribute('dy', '1.2em');
                    tspanVal.setAttribute('font-size', '11');
                    tspanVal.setAttribute('font-weight', '800');
                    tspanVal.setAttribute('fill', '#16A34A');
                    tspanVal.textContent = val;

                    text.appendChild(tspanName);
                    text.appendChild(tspanVal);
                    labelsEl.appendChild(text);
                });

                const scorePts = [];
                axesOrder.forEach((axisName, i) => {
                    const rawVal = Math.max(0, Math.min(5, Number(scores[axisName] ?? 0)));
                    const p = getPoint(i, rawVal / 5);
                    scorePts.push(`${p.x.toFixed(1)},${p.y.toFixed(1)}`);

                    const dot = document.createElementNS(svgNS, 'circle');
                    dot.setAttribute('cx', p.x.toFixed(1));
                    dot.setAttribute('cy', p.y.toFixed(1));
                    dot.setAttribute('r', '4');
                    dot.setAttribute('fill', '#16A34A');
                    dot.setAttribute('stroke', '#FFFFFF');
                    dot.setAttribute('stroke-width', '1.5');
                    pointsEl.appendChild(dot);
                });
                polygonEl.setAttribute('points', scorePts.join(' '));

                const barMetrics = ['Body', 'Acidity'];
                barsEl.innerHTML = barMetrics.map((metric) => {
                    const score = Number(scores[metric] ?? 0);
                    const widthPct = Math.round((score / 5) * 100);
                    return `
                        <div class="flex items-center gap-3">
                            <span class="w-16 font-semibold text-[#555552]">${escapeHtml(metric)}</span>
                            <div class="flex-1 h-1.5 rounded-full bg-[#EAEAE6] overflow-hidden">
                                <div class="h-full rounded-full bg-[#16A34A] transition-all duration-300" style="width: ${widthPct}%"></div>
                            </div>
                            <span class="w-12 text-right font-extrabold text-[#111111] tabular-nums">${score.toFixed(1)} / 5</span>
                        </div>
                    `;
                }).join('');
            }

            function loadBatchPassport(code, updateUrl = true) {
                const normalized = String(code || '').trim().toUpperCase();
                const batch = batchesData[normalized];
                if (!batch) {
                    searchErrorText.textContent = `Kode batch "${normalized || '-'}" tidak ditemukan. Coba: ANOM-04-ARG, ANOM-04-RBS, ANOM-03-EXC, atau ANOM-03-ARG.`;
                    searchErrorBox.classList.remove('hidden');
                    return false;
                }

                searchErrorBox.classList.add('hidden');
                currentCode = normalized;
                searchInput.value = normalized;

                if (updateUrl && window.history && window.history.replaceState) {
                    const url = new URL(window.location.href);
                    url.searchParams.set('kode', normalized);
                    window.history.replaceState({}, '', url.toString());
                }

                quickButtons.forEach((btn) => {
                    const isActive = btn.dataset.quickBatch === normalized;
                    const dot = btn.querySelector('[data-quick-dot]');
                    btn.className = isActive
                        ? 'inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold border transition cursor-pointer bg-[#111111] text-white border-[#111111]'
                        : 'inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold border transition cursor-pointer bg-white text-[#111111] border-[#E5E5E3] hover:border-[#111111]';
                    if (dot) {
                        dot.className = isActive
                            ? 'w-1.5 h-1.5 rounded-full bg-[#16A34A]'
                            : 'w-1.5 h-1.5 rounded-full bg-[#6E6E6A]';
                    }
                });

                const thumbEl = document.getElementById('passport-thumbnail');
                thumbEl.src = batch.thumbnail;
                thumbEl.alt = batch.title;

                const sealEl = document.getElementById('passport-verified-seal');
                sealEl.className = `absolute bottom-3 right-3 w-11 h-11 rounded-full ${batch.is_archived ? 'bg-[#525250]' : 'bg-[#16A34A]'} text-white flex flex-col items-center justify-center shadow-md border-2 border-white`;
                sealEl.querySelector('span').textContent = batch.is_archived ? 'ARSIP' : 'VERIFIED';

                const badgeEl = document.getElementById('passport-badge');
                badgeEl.textContent = batch.badge_text;
                badgeEl.className = `inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-extrabold uppercase tracking-wider ${
                    batch.is_archived
                        ? 'bg-[#F0F0EE] text-[#555553] border border-[#E5E5E3]'
                        : 'bg-[#F0FDF4] text-[#16A34A] border border-[#BBF7D0]'
                }`;

                document.getElementById('passport-title').textContent = batch.title;
                document.getElementById('passport-subtitle').textContent = batch.subtitle;
                document.getElementById('passport-lokasi').textContent = batch.lokasi;
                document.getElementById('passport-lot').textContent = batch.kode;
                document.getElementById('passport-varietas').textContent = batch.varietas;

                document.getElementById('metric-asal').textContent = batch.asal_kebun;
                document.getElementById('metric-air').textContent = batch.kadar_air;
                document.getElementById('metric-roast').textContent = batch.tanggal_roasting;
                document.getElementById('metric-puncak').textContent = batch.puncak_rasa;

                const timelineEl = document.getElementById('timeline-stages-container');
                timelineEl.innerHTML = batch.timeline.map((stage) => {
                    const statsHtml = stage.stats.map((st) => `
                        <span class="inline-flex items-center px-3 py-1 rounded-lg bg-[#F5F5F3] border border-[#E5E5E3] text-[11px] font-semibold text-[#333330]">
                            ${escapeHtml(st)}
                        </span>
                    `).join('');
                    const fallbackSvg = `data:image/svg+xml;utf8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22260%22 viewBox=%220 0 400 260%22%3E%3Crect width=%22400%22 height=%22260%22 fill=%22%23EAE8E3%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-weight=%22bold%22 font-size=%2216%22 fill=%22%23555553%22%3ETahap ${escapeHtml(stage.step)} - Kopi Anom%3C/text%3E%3C/svg%3E`;
                    return `
                        <div class="relative">
                            <div class="absolute -left-10 sm:-left-12 top-5 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-[#16A34A] text-white text-xs font-extrabold flex items-center justify-center ring-4 ring-[#F2F2F0] tabular-nums">
                                ${escapeHtml(stage.step)}
                            </div>
                            <div class="bg-white rounded-2xl border border-[#E5E5E3] p-5 sm:p-6 flex flex-col-reverse sm:flex-row items-start justify-between gap-5 shadow-[0_1px_4px_rgba(17,17,17,0.02)]">
                                <div class="flex-1 min-w-0">
                                    <p class="text-[11px] font-semibold text-[#6E6E6A]">${escapeHtml(stage.date)}</p>
                                    <h3 class="mt-1 text-base sm:text-lg font-extrabold text-[#111111]">
                                        ${escapeHtml(stage.title)}
                                    </h3>
                                    <p class="mt-2 text-xs sm:text-sm text-[#5E5E5A] leading-relaxed">
                                        ${escapeHtml(stage.desc)}
                                    </p>
                                    <div class="mt-4 flex flex-wrap gap-2">
                                        ${statsHtml}
                                    </div>
                                </div>
                                <div class="w-full sm:w-48 shrink-0">
                                    <img
                                        src="${escapeHtml(stage.image)}"
                                        alt="${escapeHtml(stage.image_alt)}"
                                        referrerpolicy="no-referrer"
                                        onerror="this.onerror=null;this.src='${fallbackSvg}';"
                                        class="w-full sm:w-48 h-32 object-cover rounded-xl bg-[#EAE8E3]"
                                    >
                                </div>
                            </div>
                        </div>
                    `;
                }).join('');

                document.getElementById('stage5-status-badge').textContent = batch.status_tahap_5;
                document.getElementById('stage5-desc').textContent = batch.tahap_5_desc;
                document.getElementById('stage5-tubruk').textContent = `Tubruk: ${batch.takaran_tubruk}`;
                document.getElementById('stage5-barista').textContent = `V60 Barista: ${batch.takaran_barista}`;
                const waText = `Halo Tim Roastery Kopi Anom, saya ingin mengirim ulasan untuk Batch ${batch.kode} (${batch.title}).`;
                document.getElementById('stage5-wa-review').href = `https://wa.me/${adminWhatsapp}?text=${encodeURIComponent(waText)}`;

                document.getElementById('flavor-heading').textContent = batch.flavor_title;
                document.getElementById('flavor-pills-container').innerHTML = batch.flavor_notes.map((note) => `
                    <span class="px-3.5 py-1.5 rounded-full bg-[#F5F5F3] border border-[#E5E5E3] text-xs font-semibold text-[#111111]">
                        ${escapeHtml(note)}
                    </span>
                `).join('');
                document.getElementById('roaster-note-text').textContent = batch.roaster_note;
                document.getElementById('roaster-verifier').textContent = batch.roaster_verifier;

                renderRadarChart(batch.scores);
                return true;
            }

            quickButtons.forEach((btn) => {
                btn.addEventListener('click', () => {
                    loadBatchPassport(btn.dataset.quickBatch);
                    switchTab('paspor');
                });
            });

            document.querySelectorAll('[data-open-passport]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    const code = btn.dataset.openPassport;
                    if (loadBatchPassport(code)) {
                        switchTab('paspor');
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                });
            });

            searchForm.addEventListener('submit', (e) => {
                e.preventDefault();
                if (loadBatchPassport(searchInput.value)) {
                    switchTab('paspor');
                }
            });

            searchResetBtn?.addEventListener('click', () => {
                loadBatchPassport('ANOM-04-ARG');
                switchTab('paspor');
            });

            const urlParams = new URLSearchParams(window.location.search);
            const paramCode = urlParams.get('kode');
            if (paramCode && batchesData[paramCode.trim().toUpperCase()]) {
                loadBatchPassport(paramCode, false);
            } else {
                loadBatchPassport(currentCode, false);
            }

            const CART_STORAGE_KEY = 'kopi_anom_cart_v1';
            const CUSTOMER_STORAGE_KEY = 'kopi_anom_customer_v1';
            const shippingCost = {{ $shippingCost ?? 10000 }};

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
                updateFloatingCartUI();
            };

            let cart = loadSavedCart();
            let selectedModalBatchCode = currentCode || 'ANOM-04-ARG';
            let modalSelectedGrind = 'Halus - Tubruk';
            let modalSelectedQty = 1;

            const formatRupiah = (amount) => 'Rp ' + Number(amount).toLocaleString('id-ID');

            const floatingCartEl = document.getElementById('batch-floating-cart');
            const floatingCartCount = document.getElementById('floating-cart-count');
            const floatingCartTotal = document.getElementById('floating-cart-total');
            const openFloatingCartBtn = document.getElementById('open-floating-cart-btn');

            const orderModal = document.getElementById('batch-order-modal');
            const closeOrderModalBtn = document.getElementById('close-batch-order-modal');
            const invoiceModal = document.getElementById('batch-invoice-modal');
            const closeInvoiceModalBtn = document.getElementById('close-batch-invoice-modal');

            const modalBatchCodeBadge = document.getElementById('modal-batch-code-badge');
            const modalBatchTitle = document.getElementById('modal-batch-title');
            const modalBatchStock = document.getElementById('modal-batch-stock');
            const modalBatchPrice = document.getElementById('modal-batch-price');
            const modalPreorderNotice = document.getElementById('modal-preorder-notice');
            const modalPreorderText = document.getElementById('modal-preorder-text');
            const modalQtyVal = document.getElementById('modal-qty-val');
            const modalMaxStockText = document.getElementById('modal-max-stock-text');
            const modalBtnAddBatch = document.getElementById('modal-btn-add-batch');

            const modalCartCountBadge = document.getElementById('modal-cart-count-badge');
            const modalCartEmpty = document.getElementById('modal-cart-empty');
            const modalCartItemsList = document.getElementById('modal-cart-items-list');
            const modalCartSubtotal = document.getElementById('modal-cart-subtotal');
            const modalCartGrandTotal = document.getElementById('modal-cart-grand-total');

            const inputCustName = document.getElementById('batch-customer-name');
            const inputCustPhone = document.getElementById('batch-customer-phone');
            const inputCustAddress = document.getElementById('batch-customer-address');
            const inputCustPostal = document.getElementById('batch-customer-postal');
            const formErrorBox = document.getElementById('batch-form-error');

            const btnSaveAndBrowse = document.getElementById('btn-save-and-browse-more');
            const btnConfirmAndPay = document.getElementById('btn-confirm-and-pay');

            const loadSavedCustomer = () => {
                try {
                    const raw = localStorage.getItem(CUSTOMER_STORAGE_KEY);
                    if (!raw) return;
                    const parsed = JSON.parse(raw);
                    if (parsed && typeof parsed === 'object') {
                        if (parsed.name) inputCustName.value = parsed.name;
                        if (parsed.phone) inputCustPhone.value = parsed.phone;
                        if (parsed.address) inputCustAddress.value = parsed.address;
                        if (parsed.postalCode) inputCustPostal.value = parsed.postalCode;
                    }
                } catch (err) {}
            };

            const saveCustomer = () => {
                try {
                    localStorage.setItem(CUSTOMER_STORAGE_KEY, JSON.stringify({
                        name: inputCustName?.value || '',
                        phone: inputCustPhone?.value || '',
                        address: inputCustAddress?.value || '',
                        postalCode: inputCustPostal?.value || '',
                    }));
                } catch (err) {}
            };

            [inputCustName, inputCustPhone, inputCustAddress, inputCustPostal].forEach((el) => {
                el?.addEventListener('input', saveCustomer);
            });
            loadSavedCustomer();

            function updateFloatingCartUI() {
                const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
                const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
                if (totalQty > 0) {
                    floatingCartEl.classList.remove('hidden');
                    floatingCartCount.textContent = totalQty;
                    floatingCartTotal.textContent = formatRupiah(subtotal + shippingCost);
                } else {
                    floatingCartEl.classList.add('hidden');
                }
            }

            function syncModalGrindUI() {
                document.querySelectorAll('.modal-grind-pill').forEach((btn) => {
                    const active = btn.dataset.modalGrind === modalSelectedGrind;
                    btn.className = active
                        ? 'modal-grind-pill py-2 px-2.5 text-center text-xs font-bold rounded-lg border bg-[#111111] text-white border-[#111111] transition cursor-pointer'
                        : 'modal-grind-pill py-2 px-2.5 text-center text-xs font-semibold rounded-lg border bg-white text-[#5E5E5A] border-[#E5E5E3] hover:border-[#111111] transition cursor-pointer';
                });
            }

            document.querySelectorAll('.modal-grind-pill').forEach((btn) => {
                btn.addEventListener('click', () => {
                    modalSelectedGrind = btn.dataset.modalGrind;
                    syncModalGrindUI();
                });
            });

            document.getElementById('modal-qty-minus')?.addEventListener('click', () => {
                if (modalSelectedQty > 1) {
                    modalSelectedQty--;
                    modalQtyVal.textContent = modalSelectedQty;
                }
            });

            document.getElementById('modal-qty-plus')?.addEventListener('click', () => {
                const batch = batchesData[selectedModalBatchCode];
                const max = batch ? (batch.stock_remaining || 10) : 10;
                if (modalSelectedQty < max) {
                    modalSelectedQty++;
                    modalQtyVal.textContent = modalSelectedQty;
                }
            });

            function renderModalCart() {
                const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
                const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
                const grandTotal = totalQty > 0 ? subtotal + shippingCost : 0;

                modalCartCountBadge.textContent = `${totalQty} Pouch`;
                modalCartSubtotal.textContent = formatRupiah(subtotal);
                modalCartGrandTotal.textContent = formatRupiah(grandTotal);

                if (cart.length === 0) {
                    modalCartEmpty.classList.remove('hidden');
                    modalCartItemsList.innerHTML = '';
                    return;
                }

                modalCartEmpty.classList.add('hidden');
                modalCartItemsList.innerHTML = cart.map((item, idx) => `
                    <div class="py-2.5 flex items-center justify-between gap-3 text-xs">
                        <div class="flex-1 min-w-0">
                            <p class="font-extrabold text-[#111111] truncate">${escapeHtml(item.name)}</p>
                            <p class="text-[11px] text-[#6E6E6A]">${escapeHtml(item.grind || 'Biji')} &bull; ${escapeHtml(item.weight || '200g')}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="flex items-center border border-[#D5D5D0] rounded-md bg-white">
                                <button type="button" data-cart-minus="${idx}" class="w-6 h-6 flex items-center justify-center text-xs font-bold text-[#111111] hover:bg-[#F2F2F0] cursor-pointer">&minus;</button>
                                <span class="px-2 text-xs font-bold tabular-nums">${item.qty}</span>
                                <button type="button" data-cart-plus="${idx}" class="w-6 h-6 flex items-center justify-center text-xs font-bold text-[#111111] hover:bg-[#F2F2F0] cursor-pointer">+</button>
                            </div>
                            <span class="w-20 text-right font-extrabold text-[#111111] tabular-nums">${formatRupiah(item.price * item.qty)}</span>
                            <button type="button" data-cart-remove="${idx}" class="text-[#999994] hover:text-red-600 transition p-1 cursor-pointer" aria-label="Hapus item">&times;</button>
                        </div>
                    </div>
                `).join('');

                modalCartItemsList.querySelectorAll('[data-cart-minus]').forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const idx = Number(btn.dataset.cartMinus);
                        if (cart[idx].qty > 1) {
                            cart[idx].qty--;
                        } else {
                            cart.splice(idx, 1);
                        }
                        saveCart(cart);
                        renderModalCart();
                    });
                });

                modalCartItemsList.querySelectorAll('[data-cart-plus]').forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const idx = Number(btn.dataset.cartPlus);
                        cart[idx].qty++;
                        saveCart(cart);
                        renderModalCart();
                    });
                });

                modalCartItemsList.querySelectorAll('[data-cart-remove]').forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const idx = Number(btn.dataset.cartRemove);
                        cart.splice(idx, 1);
                        saveCart(cart);
                        renderModalCart();
                    });
                });
            }

            function openBatchOrderModal(batchCode) {
                formErrorBox.classList.add('hidden');
                selectedModalBatchCode = batchCode || currentCode || 'ANOM-04-ARG';
                const batch = batchesData[selectedModalBatchCode] || batchesData['ANOM-04-ARG'];
                if (!batch) return;

                modalBatchCodeBadge.textContent = batch.kode;
                modalBatchTitle.textContent = batch.title;
                const price = batch.price || (batch.kode.includes('RBS') ? 65000 : batch.kode.includes('WNE') ? 115000 : batch.kode.includes('EXC') ? 90000 : 85000);
                modalBatchPrice.textContent = formatRupiah(price);
                modalBatchStock.textContent = `Sisa ${batch.stock_remaining || 0}/${batch.stock_total || 0} Pouch`;
                modalMaxStockText.textContent = `(Maks. ${batch.stock_remaining || 10})`;

                if (batch.status_type === 'fermenting' || batch.kode === 'ANOM-03-WNE') {
                    modalPreorderNotice.classList.remove('hidden');
                    modalPreorderText.textContent = batch.preorder_notice || 'Jadwal Kirim Pre-Order: 12 Nov 2026 (Segera setelah proses fermentasi & sangrai selesai)';
                } else {
                    modalPreorderNotice.classList.add('hidden');
                }

                modalSelectedQty = 1;
                modalQtyVal.textContent = modalSelectedQty;
                syncModalGrindUI();
                renderModalCart();
                loadSavedCustomer();

                orderModal.classList.remove('hidden');
                orderModal.classList.add('flex');
            }

            function closeBatchOrderModal() {
                orderModal.classList.add('hidden');
                orderModal.classList.remove('flex');
                updateFloatingCartUI();
            }

            closeOrderModalBtn?.addEventListener('click', closeBatchOrderModal);
            orderModal?.addEventListener('click', (e) => {
                if (e.target === orderModal) closeBatchOrderModal();
            });

            function addSelectedBatchToCart() {
                const batch = batchesData[selectedModalBatchCode] || batchesData['ANOM-04-ARG'];
                if (!batch) return;
                const price = batch.price || (batch.kode.includes('RBS') ? 65000 : batch.kode.includes('WNE') ? 115000 : batch.kode.includes('EXC') ? 90000 : 85000);
                const key = `${batch.kode}__${modalSelectedGrind}`;
                const existing = cart.find((i) => i.key === key);
                if (existing) {
                    existing.qty += modalSelectedQty;
                } else {
                    cart.push({
                        key,
                        batch_code: batch.kode,
                        name: `${batch.short_title || batch.title} [${batch.kode}]`,
                        grind: modalSelectedGrind,
                        weight: '200g',
                        price,
                        qty: modalSelectedQty,
                    });
                }
                saveCart(cart);
                renderModalCart();
            }

            modalBtnAddBatch?.addEventListener('click', () => {
                addSelectedBatchToCart();
            });

            btnSaveAndBrowse?.addEventListener('click', () => {
                addSelectedBatchToCart();
                closeBatchOrderModal();
                updateFloatingCartUI();
            });

            openFloatingCartBtn?.addEventListener('click', () => {
                openBatchOrderModal(selectedModalBatchCode);
            });

            btnConfirmAndPay?.addEventListener('click', async () => {
                if (cart.length === 0) {
                    addSelectedBatchToCart();
                }

                const name = inputCustName.value.trim();
                const phone = inputCustPhone.value.trim();
                const address = inputCustAddress.value.trim();
                const postal = inputCustPostal.value.trim();

                if (!name || !phone || !address || !postal) {
                    formErrorBox.textContent = 'Harap lengkapi Nama Penerima, Nomor WhatsApp, Alamat Pengiriman, dan Kode Pos.';
                    formErrorBox.classList.remove('hidden');
                    return;
                }

                formErrorBox.classList.add('hidden');
                saveCustomer();

                let serverInvoiceNo = null;
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
                            customer_postal_code: postal,
                            source: 'batch',
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
                        formErrorBox.textContent = firstError || errData?.message || 'Data pesanan tidak valid.';
                        formErrorBox.classList.remove('hidden');
                        return;
                    }

                    if (response.ok) {
                        const result = await response.json();
                        serverInvoiceNo = result?.data?.invoice_number || null;
                    }
                } catch (err) {
                }

                closeBatchOrderModal();
                openInvoiceModal(serverInvoiceNo);
            });

            function openInvoiceModal(serverInvoiceNo = null) {
                const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
                const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
                const grandTotal = totalQty > 0 ? subtotal + shippingCost : 0;

                const name = inputCustName.value.trim();
                const phone = inputCustPhone.value.trim();
                const address = inputCustAddress.value.trim();
                const postal = inputCustPostal.value.trim();

                const invoiceNo = serverInvoiceNo || ('#ANM-B' + Math.floor(1000 + Math.random() * 9000));
                document.getElementById('batch-invoice-number-badge').textContent = `INVOICE ${invoiceNo}`;
                document.getElementById('batch-invoice-customer-name').textContent = name;
                document.getElementById('batch-invoice-customer-address').textContent = address;
                document.getElementById('batch-invoice-customer-postal').textContent = postal || '-';
                document.getElementById('batch-invoice-customer-phone').textContent = phone;

                document.getElementById('batch-invoice-items').innerHTML = cart.map((item) => `
                    <div class="flex justify-between items-start py-1 border-b border-[#F0EFEA] last:border-b-0">
                        <div>
                            <p class="font-bold text-[#141413]">${escapeHtml(item.name)}</p>
                            <p class="text-[11px] text-[#6B6A65]">${escapeHtml(item.grind || 'Biji')} &times; ${item.qty}</p>
                        </div>
                        <span class="font-extrabold text-[#141413] tabular-nums">${formatRupiah(item.price * item.qty)}</span>
                    </div>
                `).join('');

                document.getElementById('batch-invoice-subtotal').textContent = formatRupiah(subtotal);
                document.getElementById('batch-invoice-grand-total').textContent = formatRupiah(grandTotal);

                const itemsText = cart.map((i) => `- ${i.name} (${i.grind}) x${i.qty} = ${formatRupiah(i.price * i.qty)}`).join('\n');
                const waMessage = `Halo Tim Roastery Kopi Anom, saya ingin konfirmasi pesanan dari Halaman Lacak Batch:\n\nNo. Invoice: ${invoiceNo}\nNama: ${name}\nNo. WhatsApp: ${phone}\nAlamat: ${address} (Kode Pos: ${postal || '-'})
\nDaftar Pesanan:\n${itemsText}\n\nSubtotal: ${formatRupiah(subtotal)}\nOngkir (Malang): ${formatRupiah(shippingCost)}\nTotal Pembayaran: ${formatRupiah(grandTotal)}\n\nMohon diproses untuk jadwal pengiriman. Terima kasih!`;

                document.getElementById('batch-whatsapp-confirm-link').href = `https://wa.me/${adminWhatsapp}?text=${encodeURIComponent(waMessage)}`;

                invoiceModal.classList.remove('hidden');
                invoiceModal.classList.add('flex');
            }

            function closeInvoiceModal() {
                invoiceModal.classList.add('hidden');
                invoiceModal.classList.remove('flex');
            }

            closeInvoiceModalBtn?.addEventListener('click', closeInvoiceModal);
            invoiceModal?.addEventListener('click', (e) => {
                if (e.target === invoiceModal) closeInvoiceModal();
            });

            document.getElementById('stage5-order-btn')?.addEventListener('click', () => {
                openBatchOrderModal(currentCode);
            });

            document.getElementById('header-order-batch-btn')?.addEventListener('click', () => {
                openBatchOrderModal(currentCode);
            });

            document.querySelectorAll('[data-order-batch]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    openBatchOrderModal(btn.dataset.orderBatch);
                });
            });

            updateFloatingCartUI();

        });
    </script>
</body>
</html>
