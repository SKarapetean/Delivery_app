<?php

namespace App\Services\Repository\Read\Order;

use App\Enum\Order\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface OrderReadRepositoryInterface
{
    public function getOrderById(int $orderId): Model;
    public function getOrderStatus(int $orderId): Status;
    public function index(?int $userId, ?int $page, ?int $perPage): LengthAwarePaginator;
}
