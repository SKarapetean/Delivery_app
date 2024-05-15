<?php

namespace App\Services\Repository\Write\Product;

use App\DTO\UpdateProductDTO;

interface ProductWriteRepositoryInterface
{
    public function create(array $data);
    public function deleteProductById(int $productId): void;
    public function updateProduct(object $product, UpdateProductDTO $dto): void;
}
