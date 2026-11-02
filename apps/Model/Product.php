<?php

class Product
{
    private string $id;
    private string $name;
    private int $price;
    private string $description;
    private string $detail;
    private string $image;
    private string $category;
    private string $bg;
    private string $origin;

    
    public function __construct(
        string $name,
        int $price = 0,
        string $description = '',
        string $detail = '',
        string $image = '../image/kopi-nusantara.jpg',
        string $category = 'Nusantara',
        string $bg = 'bg-[#f7f5ed]',
        string $origin = 'Indonesia',
        string $id = ''
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->detail = $detail;
        $this->image = $image;
        $this->category = $category;
        $this->bg = $bg;
        $this->origin = $origin;
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDetail(): string
    {
        return $this->detail;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getBg(): string
    {
        return !empty($this->bg) ? $this->bg : 'bg-[#f7f5ed]';
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function getFormattedPrice(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    
    public function getDetailId(): string
    {
        $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $this->name), '-'));
        return 'detail-' . $slug;
    }
    
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? 'Kopi Nusantara',
            price: isset($data['price']) ? (int) $data['price'] : 0,
            description: $data['description'] ?? '',
            detail: $data['detail'] ?? '',
            image: $data['image'] ?? '../image/kopi-nusantara.jpg',
            category: $data['class'] ?? $data['category'] ?? 'Nusantara',
            bg: $data['bg'] ?? 'bg-[#f7f5ed]',
            origin: $data['origin'] ?? 'Indonesia',
            id: (string) ($data['id'] ?? '')
        );
    }
}
