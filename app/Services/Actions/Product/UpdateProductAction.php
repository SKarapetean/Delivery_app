<?php

namespace App\Services\Actions\Product;

use App\DTO\UpdateProductDTO;
use App\Services\Repository\Write\Product\ProductWriteRepositoryInterface;
use App\Services\Repository\Read\Product\ProductReadRepositoryInterface;

class UpdateProductAction
{
    public function __construct(
        public ProductWriteRepositoryInterface $productWriteRepository,
        public ProductReadRepositoryInterface $productReadRepository
    )
    {
    }

    public function run(int $productId, UpdateProductDTO $dto): ?object
    {
        $product = $this->productReadRepository->getProductById($productId);

        if ($product) {
            throw new ProductNotFoundException('No product with the given id.', 404);
        }

        $this->productWriteRepository($product, $dto);
        return $product;
    }
}
