<?php

namespace App\Http\Controllers\Order;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\Role;
class OrderPendingController extends Controller
{
    public function __invoke(Request $request)
    {
        $orders = Order::query()
        ->when(auth()->user()->role === Role::Shop, function ($query) {
            return $query->forUser(auth()->id());
            
        })
            ->where('order_status', OrderStatus::PENDING)
            ->with('customer')
            ->latest()
            ->get();

        return view('orders.pending-orders', [
            'orders' => $orders
        ]);
    }
}
