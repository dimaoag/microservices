<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Product;

use App\Models\Product\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $products = Product::paginate(10);

        return ProductResource::collection($products);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        return new JsonResponse(new ProductResource(Product::create($request->all())), Response::HTTP_CREATED);
    }

    public function update(UpdateRequest $request, Product $product): JsonResponse
    {
        $product->update($request->all());

        return new JsonResponse(new ProductResource($product), Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id): JsonResponse
    {
        Product::destroy($id);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
