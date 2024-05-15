<?php

namespace App\Services\Actions\Product;

use App\Models\Product;
use App\DTO\AddProductDTO;
use App\Services\FileService\FileService;
use App\Services\Repository\Write\Product\ProductWriteRepositoryInterface;

class AddProductAction
{
    public function __construct(
        public ProductWriteRepositoryInterface $productWriteRepository,
        public FileService $fileService
    )
    {
    }

    public function run(AddProductDTO $dto): ?Product
    {
        $fileId = $this->fileService->addFile($dto->image);

        if ($fileId != -1) {
            $data = [
              'name'=> $dto->productName,
              'description' => $dto->description,
              'price' => $dto->price,
              'image_id' => $fileId
            ];
            return $this->productWriteRepository->create($data);
        }

        return null;
    }
}
