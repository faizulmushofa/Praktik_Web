# Praktik Pemrograman Web — Kopi Nusantara

Repository praktikum mata kuliah Pemrograman Web. Landing page Kopi Nusantara menggunakan Tailwind CSS v4 CLI dan PHP.

---

## Prasyarat

- [Node.js](https://nodejs.org/) (versi 18+)
- [PHP](https://www.php.net/) (versi 8+)
- [Git](https://git-scm.com/)

---

## Cara Menjalankan

1. **Install dependensi:**
   ```bash
   npm install
   ```

2. **Build Tailwind CSS:**
   ```bash
   # Sekali build
   npm run build-css

   # Mode watch (auto-rebuild saat ubah file)
   npm run watch-css
   ```

3. **Jalankan Local PHP Server:**
   ```bash
   php -S localhost:8000
   ```

4. **Buka di browser:**
   Akses `http://localhost:8000/apps/index.php`.

---

## Aturan Alur Kerja Praktikum (`weeks/week-*`)

### 1. Standar Branching
- Penamaan branch: `weeks/week-<nomor>` (contoh: `weeks/week-3`, `weeks/week-4`, `weeks/week-5`).
- Branch minggu baru dibuat dari branch minggu sebelumnya:
  ```bash
  git checkout weeks/week-4
  git checkout -b weeks/week-5
  ```
- Setiap branch merefleksikan progres materi dan tugas minggu tersebut.

### 2. Konvensi Struktur Folder
```text
praktik_web/
├── apps/
│   ├── index.php         # Entry point aplikasi
│   ├── css/
│   │   └── style.css     # CSS input Tailwind v4 (@theme, fonts, custom style)
│   ├── js/
│   │   └── script.js     # Logika klien & inisialisasi icon
│   ├── data/
│   │   └── products.json # Data mock/JSON produk
│   └── dist/
│       └── output.css    # Hasil compile Tailwind (di-ignore dari Git)
├── image/                # Aset gambar statis
├── package.json          # Konfigurasi dependensi & build script
└── README.md
```

### 3. Aturan Modifikasi File
- **Class Baru Tailwind**: Jika menambahkan class/elemen baru di file PHP/HTML/JS, wajib jalankan `npm run build-css`.
- **Aset Gambar**: Simpan file gambar di folder `image/`, referensikan relatif dengan `../image/<nama-file>`.
- **File Terlarang Masuk Git**: Folder `node_modules/` dan `apps/dist/` wajib tetap di-ignore via `.gitignore`.

### 4. Checklist Commit & Push per Week
1. Jalankan `npm run build-css` untuk memastikan tidak ada error syntax.
2. Validasi PHP: `php -l apps/index.php`.
3. Jalankan server lokal dan verifikasi tampilan di browser.
4. Stage, commit, dan push:
   ```bash
   git add -A
   git commit -m "feat/refactor: deskripsi perubahan"
   git push -u origin weeks/week-<nomor>
   ```
