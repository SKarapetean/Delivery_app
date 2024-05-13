<?php

namespace App\Services\Actions\Product;

use App\Exceptions\ProductNotFoundException;
use App\Services\Repository\Read\Product\ProductReadRepositoryInterface;

class GetProductAction
{
    public function __construct(
        public ProductReadRepositoryInterface $productReadRepository
    )
    {
    }

    /**
     * @throws ProductNotFoundException
     */
    public function run(int $productId): ?object
    {
        $product = $this->productReadRepository->getProductById($productId);
        if (!$product) {
            throw new ProductNotFoundException('No product with the given id.', 404);
        }
        return $product;
    }
}
