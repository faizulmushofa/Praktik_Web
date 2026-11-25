<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Kopi Anom</title>
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
            background-color: #FAF9F6;
            color: #141413;
            font-family: "Plus Jakarta Sans", ui-sans-serif, system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between bg-[#FAF9F6] text-[#141413]">
    <header class="w-full border-b border-[#EDE7DC]/80 bg-[#F2F2F0]/90 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2.5 group shrink-0">
                <span class="w-7 h-7 flex items-center justify-center">
                    <svg viewBox="0 0 400 400" class="w-7 h-7" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <g stroke="#1E1A17" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="195" y="218" width="10" height="122" rx="4" fill="#1E1A17" />
                            <path d="M180 218 C178 165 182 115 200 72 C218 115 222 165 220 218 Z" fill="#1E1A17" />
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
                <span class="text-sm font-extrabold tracking-tight uppercase text-[#111111]">KOPI ANOM</span>
            </a>

            <a
                href="{{ route('beranda') }}"
                class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#5E5E5A] hover:text-[#111111] transition"
            >
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m12 19-7-7 7-7"/><path d="M19 12H5"/>
                </svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center px-4 py-12 sm:py-16">
        <div class="w-full max-w-4xl grid grid-cols-1 lg:grid-cols-12 rounded-3xl overflow-hidden bg-white border border-[#E5DFD5] shadow-[0_12px_40px_rgba(20,20,19,0.06)]">
            <div class="lg:col-span-5 bg-[#141413] text-white p-8 sm:p-10 flex flex-col justify-between">
                <div>
                    <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-[#EAE6DE] text-[10px] font-bold uppercase tracking-widest">
                        AKSES AKUN KOPI ANOM
                    </span>
                    <h1 class="mt-5 text-2xl sm:text-3xl font-extrabold leading-tight tracking-tight">
                        Dari Kebun Desa, Tersambung Rapi.
                    </h1>
                    <p class="mt-3 text-xs sm:text-sm text-[#B8B2A8] leading-relaxed">
                        Masuk untuk mengelola stok micro-batch roastery, memantau panen petik merah, atau melihat riwayat pesanan Anda.
                    </p>
                </div>

                <div class="mt-8 pt-6 border-t border-white/10 space-y-3 text-xs text-[#D5CFC6]">
                    <div class="flex items-center gap-2.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        <span>100% Petik Ceri Merah Lereng Malang</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                        <span>Transparansi Batch &amp; Profil Sangrai</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 p-7 sm:p-10">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#141413]">Masuk ke Akun</h2>
                        <p class="mt-1 text-xs text-[#6B6A65]">Masukkan email dan kata sandi Anda untuk melanjutkan.</p>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 p-1 rounded-xl bg-[#F2F2F0] border border-[#E5E5E3] text-xs font-bold">
                    <span class="py-2 text-center rounded-lg bg-white text-[#111111] shadow-xs">
                        Masuk
                    </span>
                    <a href="{{ route('register') }}" class="py-2 text-center rounded-lg text-[#6E6E6A] hover:text-[#111111] transition">
                        Daftar Akun
                    </a>
                </div>

                <form id="login-form" class="mt-6 space-y-4" novalidate>
                    <div>
                        <label for="login-email" class="block text-xs font-bold text-[#141413] mb-1.5">Alamat Email</label>
                        <input
                            type="email"
                            id="login-email"
                            name="email"
                            required
                            placeholder="nama@email.com"
                            class="w-full px-4 py-3 rounded-xl border border-[#D8D5CE] bg-[#FAF9F6] text-xs sm:text-sm text-[#141413] focus:outline-none focus:bg-white focus:border-[#141413] transition"
                        >
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="login-password" class="block text-xs font-bold text-[#141413]">Kata Sandi</label>
                            <button type="button" id="forgot-password-btn" class="text-[11px] font-semibold text-[#6B6A65] hover:text-[#141413] cursor-pointer">
                                Lupa kata sandi?
                            </button>
                        </div>
                        <div class="relative">
                            <input
                                type="password"
                                id="login-password"
                                name="password"
                                required
                                placeholder="Masukkan kata sandi"
                                class="w-full px-4 py-3 pr-11 rounded-xl border border-[#D8D5CE] bg-[#FAF9F6] text-xs sm:text-sm text-[#141413] focus:outline-none focus:bg-white focus:border-[#141413] transition"
                            >
                            <button
                                type="button"
                                data-toggle-password="login-password"
                                aria-label="Tampilkan atau sembunyikan kata sandi"
                                class="absolute inset-y-0 right-3 flex items-center text-[#6B6A65] hover:text-[#141413] cursor-pointer"
                            >
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label class="inline-flex items-center gap-2 text-xs text-[#5E5E5A] cursor-pointer">
                            <input type="checkbox" id="remember-me" class="rounded border-[#D8D5CE] text-[#141413] focus:ring-0">
                            <span>Ingat saya di perangkat ini</span>
                        </label>
                    </div>

                    <div id="login-feedback" class="hidden p-3 rounded-xl text-xs font-medium"></div>

                    <button
                        type="submit"
                        class="w-full py-3.5 px-5 rounded-xl bg-[#141413] text-white text-xs sm:text-sm font-bold hover:bg-[#2B2B29] transition flex items-center justify-center gap-2 cursor-pointer"
                    >
                        <span>Masuk Sekarang</span>
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                        </svg>
                    </button>
                </form>

                <p class="mt-6 text-center text-xs text-[#6B6A65]">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-bold text-[#141413] underline hover:opacity-80">
                        Daftar di sini
                    </a>
                </p>
            </div>
        </div>
    </main>

    <footer class="py-5 text-center text-[11px] text-[#7A756E] border-t border-[#EDE7DC]/70">
        &copy; {{ date('Y') }} Kopi Anom &bull; Lereng Malang, Jawa Timur
    </footer>

    <script>
        document.querySelectorAll('[data-toggle-password]').forEach((btn) => {
            btn.addEventListener('click', () => {
                const target = document.getElementById(btn.dataset.togglePassword);
                if (!target) return;
                target.type = target.type === 'password' ? 'text' : 'password';
            });
        });

        const feedbackBox = document.getElementById('login-feedback');
        const showFeedback = (message, isError = true) => {
            feedbackBox.textContent = message;
            feedbackBox.className = isError
                ? 'p-3 rounded-xl text-xs font-medium bg-red-50 border border-red-200 text-red-700'
                : 'p-3 rounded-xl text-xs font-medium bg-emerald-50 border border-emerald-200 text-emerald-800';
            feedbackBox.classList.remove('hidden');
        };

        document.getElementById('forgot-password-btn')?.addEventListener('click', () => {
            showFeedback('Fitur reset kata sandi akan tersedia setelah integrasi backend.', false);
        });

        document.getElementById('login-form')?.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = document.getElementById('login-email').value.trim();
            const password = document.getElementById('login-password').value;

            if (!email || !email.includes('@')) {
                showFeedback('Mohon masukkan alamat email yang valid.');
                return;
            }
            if (!password || password.length < 6) {
                showFeedback('Kata sandi minimal 6 karakter.');
                return;
            }

            showFeedback('Form login siap! Tampilan frontend berhasil divalidasi untuk ' + email + '.', false);
        });
    </script>
</body>
</html>
