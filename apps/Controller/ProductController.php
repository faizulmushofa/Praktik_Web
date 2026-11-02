<?php

require_once __DIR__ . '/../Model/ProductModel.php';


class ProductController
{
    private ProductModel $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

   
    public function index(): void
    {
        $products = $this->productModel->getAllProducts();
        $pageTitle = 'Kopi Nusantara — Cerita Baik dari Setiap Seduhan';
        require __DIR__ . '/../View/product-page.php';
    }
}
