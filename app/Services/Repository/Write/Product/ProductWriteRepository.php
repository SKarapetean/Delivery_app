<?php

namespace App\Services\Repository\Write\Product;

use App\Models\Product;
use App\DTO\UpdateProductDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProductWriteRepository implements ProductWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Product::query();
    }

    public function create(array $data): Model|Builder
    {
        return $this->query()->create($data);
    }

    public function deleteProductById(int $productId): void
    {
        $this->query()->where('id', $productId)->delete();
    }
 
    public function updateProduct(object $product, UpdateProductDTO $dto): void
    {
        $product->name = $dto->productName;
        $product->price = $dto->price;
        $product->description = $dto->description; 
        $product->save();
    }

}
