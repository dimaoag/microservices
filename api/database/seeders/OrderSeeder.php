<?php

namespace Database\Seeders;

use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::factory(30)->create()
            ->each(function (Order $order) {
                /** @psalm-suppress UndefinedMagicPropertyFetch */
                OrderItem::factory(random_int(1, 5))->create([
                    'order_id' => $order->id
                ]);
            });
    }
}
