<?php

/**
 * Entry Point (Front Controller) - Kopi Nusantara
 * Praktikum Pemrograman Web (Pertemuan 7 - Arsitektur MVC)
 * 
 * Bertindak sebagai dispatcher yang menerima request dari pengguna,
 * menginisialisasi controller terkait, dan mengeksekusi action
 * untuk menghasilkan response tampilan.
 */

require_once __DIR__ . '/Controller/ProductController.php';

// Inisialisasi controller dan jalankan action default
$controller = new ProductController();
$controller->index();
