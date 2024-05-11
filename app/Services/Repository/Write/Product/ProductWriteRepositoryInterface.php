<?php

namespace App\Services\Repository\Write\Product;

interface ProductWriteRepositoryInterface
{
    public function create(array $data);
    public function getProductById(int $productId): ?object;
    public function deleteProductById(int $productId): void;
}
