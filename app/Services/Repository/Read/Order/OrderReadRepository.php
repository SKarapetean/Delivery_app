<?php

namespace App\Services\Repository\Read\Order;

use App\Models\Order;
use App\Exceptions\OrderNotFoundException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderReadRepository implements OrderReadRepositoryInterface
{
    private function query(): Builder
    {
        return Order::query();
    }

    public function getOrderById(int $orderId): Model
    {
        $order = $this->query()->where('id', $orderId)->first();

        if ($order) {
            throw new OrderNotFoundException(null, 404);
        }

        return $order;
    }

    public function getOrderStatus(int $orderId): Status 
    {
        $order = $this->query()->where('id', $orderId)->first();

        if (!$order) {
            throw new OrderNotFoundException(null, 404);
        }

        return $order->status;
    }

    public function index(?int $userId, ?int $page, ?int $perPage): LengthAwarePaginator
    {
        if ($userId) {
            $orders = $this->query()->where('user_id', $userId);
            return $orders->paginate(perPage: $perPage, page: $page);
        }

        return $this->query()->paginate(perPage: $perPage, page: $page);
    }

}
