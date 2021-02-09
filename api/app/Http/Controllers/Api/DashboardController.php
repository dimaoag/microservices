<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Order\Order;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Order\ChartResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DashboardController extends Controller
{
    public function chart(): AnonymousResourceCollection
    {
        Gate::authorize('view', 'orders');

        $orders = Order::query()
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->selectRaw(
                "to_char(orders.created_at, 'YYYY-mm-dd') as date,
                sum(order_items.quantity*order_items.price) as sum"
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return ChartResource::collection($orders);
    }
}
