<?php

namespace App\Models;

class BerandaModel
{
    public function getNavLinks(): array
    {
        return [
            ['label' => 'Beranda', 'href' => url('/'), 'active' => true],
            ['label' => 'Katalog & Racik', 'href' => '#katalog', 'active' => false],
            ['label' => 'Cara Seduh', 'href' => '#seduh', 'active' => false],
            ['label' => 'Lacak Batch', 'href' => url('/batch'), 'active' => false],
            ['label' => 'Cerita & Pesan Petani', 'href' => url('/cerita'), 'active' => false],
        ];
    }

    public function getHeroTrustItems(): array
    {
        return [
            '100% Petik Ceri Merah',
            '4 Varian & Custom Mix',
            'QR Lacak di Tiap Kemasan',
        ];
    }

    public function getThreeStages(): array
    {
        return [
            [
                'number' => '01',
                'overline' => '01 — PETIK MERAH & JEMUR PARA-PARA',
                'description' => 'Dipanen hanya saat ceri matang sempurna di satu desa di Malang, lalu dijemur di atas para-para bersih (bukan di tanah atau aspal). Bebas biji cacat dan bebas bau tanah.',
                'badge' => 'Sortir Petik Merah 100% • Kadar Air 11%-12%',
                'image' => 'https://images.unsplash.com/photo-1610632380989-680fe40816c6?auto=format&fit=crop&w=1000&q=80',
                'image_alt' => 'Petani menyortir biji kopi petik merah di atas para-para',
                'reverse' => false,
                'has_qr' => false,
            ],
            [
                'number' => '02',
                'overline' => '02 — SANGRAI BATCH KECIL: NIKMAT TUBRUK MAUPUN BARISTA',
                'description' => 'Disangrai segar per batch untuk mengeluarkan manis alami kopi. Mau diseduh praktis sebagai Kopi Tubruk rumahan pakai sendok makan, atau diseduh presisi dengan alat Barista, rasanya tetap bersih dan kaya aroma.',
                'badge' => 'Fresh Micro-Batch • Nyaman untuk Tubruk & Manual Brew',
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=1000&q=80',
                'image_alt' => 'Proses pendinginan biji kopi yang baru disangrai di mesin roaster',
                'reverse' => true,
                'has_qr' => false,
            ],
            [
                'number' => '03',
                'overline' => '03 — KODE LACAK DI TIAP KEMASAN',
                'description' => 'Setiap bungkus Kopi Anom memiliki QR Code identitas batch. Scan langsung dari kemasan fisikmu untuk melihat siapa petaninya, kapan dipanen, dan kapan kopimu disangrai.',
                'badge' => 'Transparansi Fisik: QR Identitas Batch & Petani Malang',
                'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?auto=format&fit=crop&w=1000&q=80',
                'image_alt' => 'Kemasan Kopi Anom dengan QR code pelacak batch',
                'reverse' => false,
                'has_qr' => true,
            ],
        ];
    }

    public function getProducts(): array
    {
        return [
            [
                'id' => 'fine-robusta-malang',
                'badge' => '100% MURNI',
                'name' => 'Fine Robusta Malang',
                'description' => 'Body tebal dengan cokelat pekat, mantap untuk tubruk & kopi susu.',
                'notes' => ['Dark Cocoa', 'Bold'],
                'price' => 65000,
                'weight' => '200g',
                'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?auto=format&fit=crop&w=500&q=80',
                'default_grind' => 'Halus - Tubruk',
            ],
            [
                'id' => 'arabica-malang',
                'badge' => '100% MURNI',
                'name' => 'Arabica Malang',
                'description' => 'Aroma gula aren & citrus segar dengan hasil seduh yang bersih.',
                'notes' => ['Brown Sugar', 'Citrus'],
                'price' => 85000,
                'weight' => '200g',
                'image' => 'https://images.unsplash.com/photo-1611854779393-1b2da9d400fe?auto=format&fit=crop&w=500&q=80',
                'default_grind' => 'Halus - Tubruk',
            ],
            [
                'id' => 'rare-excelsa',
                'badge' => '100% MURNI',
                'name' => 'Rare Excelsa',
                'description' => 'Varian langka lereng Malang dengan aroma nangka matang yang eksotis.',
                'notes' => ['Jackfruit Aroma', 'Sweet Tart'],
                'price' => 90000,
                'weight' => '200g',
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=500&q=80',
                'default_grind' => 'Halus - Tubruk',
            ],
            [
                'id' => 'excelsa-wine-process',
                'badge' => '100% MURNI',
                'name' => 'Excelsa Wine Process',
                'description' => 'Fermentasi panjang bernuansa buah tropis & sensasi red winey mewah.',
                'notes' => ['Red Winey', 'Tropical Fruit'],
                'price' => 115000,
                'weight' => '200g',
                'image' => 'https://images.unsplash.com/photo-1587734195503-904fca47e0e9?auto=format&fit=crop&w=500&q=80',
                'default_grind' => 'Halus - Tubruk',
            ],
        ];
    }

    public function getGrindOptions(): array
    {
        return [
            'Biji Utuh',
            'Halus - Tubruk',
            'Kasar - Barista',
        ];
    }

    public function getBlendPresets(): array
    {
        return [
            ['arabica' => 80, 'label' => '80:20'],
            ['arabica' => 50, 'label' => '50:50'],
            ['arabica' => 30, 'label' => '30:70'],
        ];
    }

    public function getBrewingRituals(): array
    {
        return [
            [
                'saran' => 'SARAN KATALOG: PILIH GILING HALUS',
                'badge_top' => null,
                'image' => 'https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?auto=format&fit=crop&w=800&q=80',
                'image_alt' => 'Kopi Tubruk bersih dalam gelas kaca',
                'title' => '1. Kopi Tubruk Bersih (Tanpa Alat)',
                'description' => 'Serat biji petik merah kami padat dan segar. Cukup seduh 1,5 sendok makan dengan 200ml air panas (tunggu 1 menit setelah mendidih) lalu aduk. Dalam 4 menit, ampas otomatis turun rapat ke dasar gelas tanpa rasa sepat.',
                'best_pair' => 'Fine Robusta Malang & Custom Mix 50:50',
                'cta' => '↑ Pilih Kopi Giling Halus di Atas',
                'cta_grind' => 'Halus - Tubruk',
                'dark' => false,
            ],
            [
                'saran' => 'SARAN KATALOG: PILIH GILING HALUS',
                'badge_top' => null,
                'image' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=800&q=80',
                'image_alt' => 'Es Kopi Susu sekelas kafe dengan gula aren',
                'title' => '2. Es Kopi Susu Sekelas Kafe',
                'description' => 'Tidak perlu mesin espresso mahal. Seduh pekat 2 sendok makan kopi dengan sedikit air panas (75ml), saring ampasnya, lalu tuang ke atas es batu, susu segar, dan gula aren. Cokelat pekatnya tetap nendang menembus susu.',
                'best_pair' => 'Fine Robusta Malang & Custom Mix 30:70',
                'cta' => '↑ Pilih Kopi untuk Kopi Susu di Atas',
                'cta_grind' => 'Halus - Tubruk',
                'dark' => false,
            ],
            [
                'saran' => 'SARAN KATALOG: PILIH GILING KASAR / BIJI UTUH',
                'badge_top' => 'TINGKAT LANJUT / BARISTA',
                'image' => 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?auto=format&fit=crop&w=800&q=80',
                'image_alt' => 'Barista menyeduh kopi manual brew V60',
                'title' => '3. Eksplorasi Aroma Ala Barista',
                'description' => 'Untuk mengeluarkan ledakan aroma buah nangka matang dan sensasi red winey, seduh dengan rasio 1:15 (15g kopi : 225ml air suhu 92°C) pada V60, French Press, atau Japanese Iced tanpa gula.',
                'best_pair' => 'Arabica Malang, Rare Excelsa & Excelsa Wine',
                'cta' => '↑ Pilih Kopi Eksotis di Atas',
                'cta_grind' => 'Biji Utuh',
                'dark' => true,
            ],
        ];
    }

    public function getShippingCost(): int
    {
        return 10000;
    }

    public function getMaxSlotPacks(): int
    {
        return 4;
    }

    public function getAdminWhatsapp(): string
    {
        return '6281234567890';
    }

    public function getAllData(): array
    {
        return [
            'navLinks' => $this->getNavLinks(),
            'heroTrustItems' => $this->getHeroTrustItems(),
            'threeStages' => $this->getThreeStages(),
            'products' => $this->getProducts(),
            'grindOptions' => $this->getGrindOptions(),
            'blendPresets' => $this->getBlendPresets(),
            'brewingRituals' => $this->getBrewingRituals(),
            'shippingCost' => $this->getShippingCost(),
            'maxSlotPacks' => $this->getMaxSlotPacks(),
            'adminWhatsapp' => $this->getAdminWhatsapp(),
        ];
    }
}
