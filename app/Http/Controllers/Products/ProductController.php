<?php

namespace App\Http\Controllers\Products;

use App\DTO\AddProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AddProductRequest;
use App\Http\Requests\Product\IndexProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductWithDescriptionResource;
use App\Services\Actions\Product\AddProductAction;
use App\Services\Actions\Product\IndexProductAction;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{

    public function index(IndexProductRequest $request, IndexProductAction $action): AnonymousResourceCollection
    {
        $page = $request->getPage();
        $perPage = $request->getPerPage();
        $products = $action->run($page, $perPage);
        return ProductResource::collection($products);
    }

    public function add(AddProductRequest $request, AddProductAction $action): JsonResponse|ProductWithDescriptionResource
    {
        $dto = AddProductDTO::fromRequest($request);
        $product = $action->run($dto);

        if ($product) {
            return new ProductWithDescriptionResource($product);
        }

        return response()->json([
            'error' => 'Service Unavailable',
            'message' => 'The server is currently unable to handle the request. Please try again later.'],
            503
        );

    }

    public function edit() {}

    public function remove() {}

    public function get(Request $request)
    {
        $request->route('id');
    }
}
