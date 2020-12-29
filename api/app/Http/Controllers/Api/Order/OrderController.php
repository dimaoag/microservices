<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Order;

use App\Models\Order\Order;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\Order\OrderResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $orders = Order::paginate(10);

        return OrderResource::collection($orders);
    }

    public function show(Order $order): OrderResource
    {
        return new OrderResource($order);
    }
}
