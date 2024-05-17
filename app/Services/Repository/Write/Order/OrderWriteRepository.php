<?php

namespace App\Services\Repository\Write\Order;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OrderWriteRepository implements OrderWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Order::query();
    }

    public function create(int $userId): Model|Builder
    {
        $now = Carbon::now();
        return $this->query()->create(
            [
                'user_id' => $userId,
                'created_at' => $now,
                'updated_at' => $now
            ]
        );
    }

    public function deleteOrderById(int $orderId): void
    {
        $this->query()->where('id', $orderId)->delete();
    }
}
