<?php

namespace App\Services\Actions\Product;

use App\Exceptions\ProductNotFoundException;
use App\Services\FileService\FIleService;
use App\Services\Repository\Write\Product\ProductWriteRepositoryInterface;

class DeleteProductAction
{

    public function __construct(
        public FIleService $fileService,
        public ProductWriteRepositoryInterface $writeRepository
    )
    {
    }

    /**
     * @throws ProductNotFoundException
     */
    public function run(int $productId): void
    {
        $product = $this->writeRepository->getProductById($productId);
        if (!$product) {
            throw new ProductNotFoundException('No product with the given id.', 404);
        }

        $this->writeRepository->deleteProductById($productId);
        $this->fileService->delete($product->image_id);
    }
}