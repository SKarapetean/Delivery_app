<?php

namespace App\Services\Actions\Product;

use App\Services\Repository\Read\Product\ProductReadRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexProductAction
{
    public function __construct(public ProductReadRepositoryInterface $productReadRepository)
    {
    }

    public function run(?int $page, ?int $perPage): LengthAwarePaginator
    {
        return $this->productReadRepository->index($page, $perPage);
    }

}
