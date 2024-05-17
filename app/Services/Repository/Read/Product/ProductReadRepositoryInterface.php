<?php

namespace App\Services\Repository\Read\Product;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductReadRepositoryInterface
{
    public function index(?int $page, ?int $perPage): LengthAwarePaginator;
    public function getProductsByName(?int $page, ?int $perPage, string $searchItem): LengthAwarePaginator;
    // public function getProductsByCode(?int $page, ?int $perPage, string $searchItem): LengthAwarePaginator;
    public function getProductById(int $productId): ?object;
}
