<?php

namespace App\Services\Actions\Product;

use App\Models\Product;
use App\DTO\UpdateProductDTO;
use App\Services\FileService\FileService;
use App\Exceptions\SaveImageException;
use App\Exceptions\ProductNotFoundException;
use App\Services\Repository\Write\Product\ProductWriteRepositoryInterface;
use App\Services\Repository\Read\Product\ProductReadRepositoryInterface;

class UpdateProductAction
{
    public function __construct(
        public ProductWriteRepositoryInterface $productWriteRepository,
        public ProductReadRepositoryInterface $productReadRepository,
        public FileService $fileService
    )
    {
    }

    public function run(int $productId, UpdateProductDTO $dto): object
    {
        $product = $this->productReadRepository->getProductById($productId);

        if ($product) {
            throw new ProductNotFoundException('No product with the given id.', 404);
        }

        $dto->imageId = $this->fileService->addFile($dto->image);

        if ($dto->imageId == -1) {
            throw new SaveImageException(null, 500);
        }

        $this->fileService->delete($product->image_id);
        $this->productWriteRepository->updateProduct($product, $dto);
        return $product;
    }
}
