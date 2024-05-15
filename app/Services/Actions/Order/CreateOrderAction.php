<?php

namespace App\Services\Actions\Order;

use App\Services\Repository\Write\Order\OrderWriteRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateOrderAction
{
    public function __construct(public OrderWriteRepositoryInterface $orderWriteRepository)
    {
    }

    public function run(array $products, int $userId): Model
    {
        $order = $this->orderWriteRepository->create($userId);
        $order->products()->sync($products);
        return $order;
    }
}
