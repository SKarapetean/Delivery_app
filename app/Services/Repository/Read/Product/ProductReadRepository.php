<?php

namespace App\Services\Repository\Read\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductReadRepository implements ProductReadRepositoryInterface
{
    private function query(): Builder
    {
        return Product::query();
    }

    public function index(?int $page, ?int $perPage): LengthAwarePaginator
    {
        return $this->query()->paginate(perPage: $perPage, page: $page);
    }

    public function getProductById(int $productId): ?object
    {
        return $this->query()->where('id', $productId)->first();
    }
}
