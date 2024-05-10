<?php

namespace App\Services\Repository\Write\Product;

use App\Models\Product;

class ProductWriteRepository implements ProductWriteRepositoryInterface
{
    private function query()
    {
        return Product::query();
    }

    public function create(array $data)
    {
        return $this->query()->create($data);
    }
}
