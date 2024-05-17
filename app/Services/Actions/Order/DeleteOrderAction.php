<?php

namespace App\Services\Actions\Order;

use App\Enum\Order\Status;
use App\Exceptions\OrderNotFoundException;
use App\Exceptions\OrderStatusException ;
use App\Services\Repository\Write\Order\OrderWriteRepositoryInterface;
use App\Services\Repository\Read\Order\ReadRepositoryInterface;

class DeleteOrderAction
{

    public function __construct(
        public OrderWriteRepositoryInterface $writeRepository,
        public OrderReadRepositoryInterface $readRepository
    )
    {
    }

    public function run(bool $isAdmin, int $orderId): void
    {
        $status = $this->readRepository->getOrderStatus($orderId);

        if (!$isAdmin && $status !== Status::RECEIVED) {
            throw new OrderStatusException(null, 404); //Check code
        }

        $this->writeRepository->deleteOrderById($orderId);
    }
}
