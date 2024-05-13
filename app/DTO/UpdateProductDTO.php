<?php

namespace App\DTO;

use App\Http\Requests\Product\UpdateProductRequest;

class UpdateProductDTO
{
    public function __construct(
        public string $productName,
        public float $price,
        public string $description
    )
    {
    }

    public static function fromRequest(UpdateProductRequest $request): self
    {
        return new self(
            productName: $request->getProductName(),
            price: $request->getProductPrice(),
            description: $request->getProductDescription()
        );
    }
}
