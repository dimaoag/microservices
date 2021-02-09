<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Order;

use App\Models\Order\Order;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\Order\OrderResource;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        Gate::authorize('view', 'orders');

        $orders = Order::paginate(10);

        return OrderResource::collection($orders);
    }

    public function show(Order $order): OrderResource
    {
        Gate::authorize('view', 'orders');

        return new OrderResource($order);
    }

    public function export(): StreamedResponse
    {
        Gate::authorize('view', 'orders');

        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=orders.csv',
            'Expires'             => '0',
            'Pragma'              => 'no-cache'
        ];

        $callback = static function (): void {
            $orders = Order::all();
            $file = fopen('php://output', 'wb');

            // Header Row
            fputcsv($file, ['ID', 'Name', 'Email', 'Title', 'Price', 'Quantity']);

            // Body
            foreach ($orders as $order) {
                fputcsv($file, [$order->id, $order->full_name, $order->email, '', '', '']);

                foreach ($order->items as $orderItem) {
                    fputcsv($file, ['', '', '', $orderItem->title, $orderItem->price, $orderItem->quantity]);
                }
            }
            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
