<?php

namespace App\Services\Repository\Write\Order;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface OrderWriteRepositoryInterface
{
    public function create(int $userId): Model|Builder;
}
