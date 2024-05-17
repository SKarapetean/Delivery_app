<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\IndexOrderRequest;
use App\Http\Requests\Order\DeleteOrderRequest;
use App\Services\Actions\Order\CreateOrderAction;
use App\Http\Resources\Order\OrderResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function create(CreateOrderRequest $request, CreateOrderAction $action): \Illuminate\Http\JsonResponse
    {
        $order = $action->run($request->getProducts(), $request->getUserId());
        return response()->json($order);
    }

    public function get(Request $request, GetOrderAction $action): OrderResource
    {
        $orderId = $request->route('id');
        $order = $action->run($orderId);
        return new OrderResource($order);
    }

    public function index(IndexOrderRequest $request, IndexOrderAction $action) //Return type
    {
        $userId = $request->getUserId();
        $page = $request->getPage();
        $perPage = $request->getPerPage();
        $orders = $action->run($userId, $page, $perPage, $searchItem);
        return OrderResorce::collect($orders);
    }

    public function delete(DeleteOrderRequest $request, DeleteOrderAction $action): JsonResponse
    {
        $orderId = $request->route('id');
        $userId = $request->user()->id;
        $isAdmin = false;

        //Check role of user
        //if ($userId == Admin) 
        // $isAdmin = true;

        $action->run($isAdmin, $orderId);

        return response()->json([
            'message' => 'Order deleted successfully'
        ]);
    }
}
