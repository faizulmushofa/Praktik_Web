<?php

require_once __DIR__ . '/Product.php';


class ProductModel
{
    private string $filePath;

    public function __construct(?string $filePath = null)
    {
        $this->filePath = $filePath ?? __DIR__ . '/../data/products.json';
    }

  
      @return Product[]
     
    public function getAllProducts(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $jsonContent = file_get_contents($this->filePath);
        $data = json_decode($jsonContent, true);

        if (!is_array($data)) {
            return [];
        }

        $products = [];
        foreach ($data as $item) {
            $products[] = Product::fromArray($item);
        }

        return $products;
    }

   
    public function getProductById(string $id): ?Product
    {
        $products = $this->getAllProducts();
        foreach ($products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }
        return null;
    }
}
