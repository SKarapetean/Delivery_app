<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;

class ProductWithDescriptionResource extends ProductResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $baseResource = parent::toArray($request);
        $baseResource['description'] = $this->description;
        return $baseResource;
    }
}
