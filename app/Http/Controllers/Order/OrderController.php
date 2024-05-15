<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Services\Actions\Order\CreateOrderAction;

class OrderController extends Controller
{
    public function create(CreateOrderRequest $request, CreateOrderAction $action): \Illuminate\Http\JsonResponse
    {
        $order = $action->run($request->getProducts(), $request->getUserId());
        return response()->json($order);
    }

    public function get() {}
    public function index() {}
    public function delete() {}
}
