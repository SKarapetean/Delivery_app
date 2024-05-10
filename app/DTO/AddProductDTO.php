<?php

namespace App\DTO;

use App\Http\Requests\AddProductRequest;
use Illuminate\Http\UploadedFile;

class AddProductDTO
{
    public function __construct(
        public string $productName,
        public float $price,
        public UploadedFile $image,
        public string $description
    )
    {
    }

    public static function fromRequest(AddProductRequest $request): self
    {
        return new self(
            productName: $request->getProductName(),
            price: $request->getProductPrice(),
            image: $request->getProductImage(),
            description: $request->getProductDescription()
        );
    }
}
