<?php

namespace App\Services\Actions\Product;

use App\Services\Repository\Read\Product\ProductReadRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexProductAction
{
    public function __construct(public ProductReadRepositoryInterface $productReadRepository)
    {
    }

    public function run(?int $page, ?int $perPage, string|int|null $searchItem): LengthAwarePaginator
    {
        if ($searchItem) { // Uncomment when 'code' field will be add. 
            // if (is_int($searchItem)) {
                // return $this->productReadRepository->getProductsByCode($searchItem, $page, $perPage);
                
            // }
            // else {
                return $this->productReadRepository->getProductsByName($searchItem, $page, $perPage);
            // }
        }
        return $this->productReadRepository->index($page, $perPage);
    }

}
