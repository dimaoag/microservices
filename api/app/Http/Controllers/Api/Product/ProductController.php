<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Product;

use App\Models\Product\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Api\Product\CreateRequest;
use App\Http\Requests\Api\Product\UpdateRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        Gate::authorize('view', 'products');

        $products = Product::paginate(10);

        return ProductResource::collection($products);
    }

    public function show(Product $product): ProductResource
    {
        Gate::authorize('view', 'products');

        return new ProductResource($product);
    }

    public function store(\App\Http\Requests\Api\Product\CreateRequest $request): JsonResponse
    {
        Gate::authorize('edit', 'products');

        return new JsonResponse(new ProductResource(Product::create($request->all())), Response::HTTP_CREATED);
    }

    public function update(\App\Http\Requests\Api\Product\UpdateRequest $request, Product $product): JsonResponse
    {
        Gate::authorize('edit', 'products');

        $product->update($request->all());

        return new JsonResponse(new ProductResource($product), Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id): JsonResponse
    {
        Gate::authorize('edit', 'products');

        Product::destroy($id);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
