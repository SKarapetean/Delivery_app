<?php

namespace App\Enum\Order;

enum Status: int
{
    case RECEIVED = 2;
    case PROCESSING = 3;
    case COMPLETED = 4;

}
