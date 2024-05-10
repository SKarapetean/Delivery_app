<?php

namespace App\Http\Controllers\Products;

use App\DTO\AddProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Services\Actions\Product\AddProductAction;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add(AddProductRequest $request, AddProductAction $action)
    {
        $dto = AddProductDTO::fromRequest($request);
        $product = $action->run($dto);
        return $product->image();

    }

    public function edit() {}

    public function remove() {}

    public function get(Request $request)
    {
        $request->route('id');
    }
}
