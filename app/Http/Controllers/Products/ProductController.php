<?php

namespace App\Http\Controllers\Products;

use App\DTO\AddProductDTO;
use App\DTO\UpdateProductDTO;
use App\Exceptions\ProductNotFoundException;
use App\Exceptions\SaveImageException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AddProductRequest;
use App\Http\Requests\Product\IndexProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductWithDescriptionResource;
use App\Services\Actions\Product\AddProductAction;
use App\Services\Actions\Product\DeleteProductAction;
use App\Services\Actions\Product\GetProductAction;
use App\Services\Actions\Product\IndexProductAction;
use App\Services\Actions\Product\UpdateProductAction;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{

    public function index(IndexProductRequest $request, IndexProductAction $action): AnonymousResourceCollection
    {
        $searchItem = $request->route('search');
        $page = $request->getPage();
        $perPage = $request->getPerPage();
        $products = $action->run($page, $perPage, $searchItem);
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

    /**
     * @throws ProductNotFoundException
     */
    public function delete(Request $request, DeleteProductAction $action): JsonResponse
    {
        $productId = $request->route('id');
        $action->run($productId);

        return response()->json([
                'message' => 'Product deleted successfully'
        ]);
    }

    /**
     * @throws ProductNotFoundException
     */
    public function get(Request $request, GetProductAction $action): ProductWithDescriptionResource
    {
        $productId = $request->route('id');
        $product = $action->run($productId);
        return new ProductWithDescriptionResource($product);
    }

    /**
     * @throws ProductNotFoundException
     * @throws SaveImageException
     */
    public function update(UpdateProductRequest $request, UpdateProductAction $action): ProductWithDescriptionResource
    {
        $productId = $request->route('id');
        $dto = UpdateProductDTO::fromRequest($request);
        $product = $action->run($productId, $dto);
        return new ProductWithDescriptionResource($product);
    }
}
