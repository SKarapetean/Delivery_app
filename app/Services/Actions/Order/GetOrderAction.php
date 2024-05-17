<?php

namespace App\Services\Actions\Order;

use App\Services\Repository\Read\Order\OrderReadRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class GetOrderAction
{
    public function __construct(public OrderReadRepositoryInterface $orderReadRepository)
    {
    }

    public function run(int $orderId): Collection
    {
        return $this->orderReadRepository->getOrderById($orderId)->products();
    }
}
