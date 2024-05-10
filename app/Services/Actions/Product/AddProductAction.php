<?php

namespace App\Services\Actions\Product;

use App\DTO\AddProductDTO;
use App\Services\FileService\FIleService;
use App\Services\Repository\Write\Product\ProductWriteRepositoryInterface;

class AddProductAction
{
    public function __construct(
        public ProductWriteRepositoryInterface $productWriteRepository,
        public FIleService $fIleService
    )
    {
    }

    public function run(AddProductDTO $dto)
    {
        $fileId = $this->fIleService->addFile($dto->image);

        if ($fileId != -1) {
            $data = [
              'name'=> $dto->productName,
              'description' => $dto->description,
              'price' => $dto->price,
              'image' => $fileId
            ];
            return $this->productWriteRepository->create($data);
        }

        return null;
    }
}
