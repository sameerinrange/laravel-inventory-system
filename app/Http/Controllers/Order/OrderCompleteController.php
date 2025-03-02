<?php

namespace App\Http\Controllers\Order;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\Role;
class OrderCompleteController extends Controller
{
    public function __invoke(Request $request)
    {
        $orders = Order::query()
        ->when(auth()->user()->role === Role::Shop, function ($query) {
            return $query->forUser(auth()->id());
            
        })
            ->where('order_status', OrderStatus::COMPLETE)
            ->with('customer')
            ->latest()
            ->get();

        return view('orders.complete-orders', [
            'orders' => $orders
        ]);
    }
}
