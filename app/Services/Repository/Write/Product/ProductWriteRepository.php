<?php

namespace App\Services\Repository\Write\Product;

use App\Models\Product;
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
}
