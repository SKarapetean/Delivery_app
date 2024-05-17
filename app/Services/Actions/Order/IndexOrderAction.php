<?php

namespace App\Services\Actions\Order;

use App\Services\Repository\Read\Order\OrderReadRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexOrderAction
{
    public function __construct(public OrderReadRepositoryInterface $orderReadRepository)
    {
    }

    public function run(int $userId, ?int $page, ?int $perPage): LengthAwarePaginator
    {   
        //Check the role of user
        //if ($userId == Admin) {
        //  return $this->orderReadRepository->index(null, $page, $perPage);     
        //}        
        
        return $this->orderReadRepository->index($userid, $page, $perPage);
    }

}
