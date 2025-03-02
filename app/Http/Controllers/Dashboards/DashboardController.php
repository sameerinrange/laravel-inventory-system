<?php

namespace App\Http\Controllers\Dashboards;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Quotation;
use App\Models\User;
use App\Models\Customer;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
       /*  $orders = Order::count();
        $completedOrders = Order::where('order_status', OrderStatus::COMPLETE)
            ->count();

        $products = Product::count();

        $purchases = Purchase::count();
        $todayPurchases = Purchase::query()
            ->where('date', today())
            ->get()
            ->count();

        $categories = Category::count();

        $quotations = Quotation::count();
        $todayQuotations = Quotation::query()
            ->where('date', today()->format('Y-m-d'))
            ->get()
            ->count(); */

            $user = auth()->user();
 
            if ($user->isSuperAdmin()) {
                // SuperAdmin sees all data
                $orders = Order::count();
                $completedOrders = Order::where('order_status', OrderStatus::COMPLETE)->count();
                $products = Product::count();
                $categories = Category::count();
                $quotations = Quotation::count();
                $todayQuotations = Quotation::where('date', today()->format('Y-m-d'))->count();
                $purchases = Purchase::count();
                $todayPurchases = Purchase::where('date', today())->count();
            } else if ($user->isShop()) {
                // Shop user gets only their own records
                $userID = $user->id;
            
                // Get all customers belonging to this shop user
                $customerIDs = Customer::where('user_id', $userID)->pluck('id');
            
                // Filter orders where customer_id belongs to this shop user
                $orders = Order::whereIn('customer_id', $customerIDs)->count();
                $completedOrders = Order::whereIn('customer_id', $customerIDs)
                    ->where('order_status', OrderStatus::COMPLETE)
                    ->count();
            
                // Products & Categories filtered by user_id
                $products = Product::where('user_id', $userID)->count();
                $categories = Category::where('user_id', $userID)->count();
            
                // Quotation filtering based on customer_id
                $quotations = Quotation::whereIn('customer_id', $customerIDs)->count();
                $todayQuotations = Quotation::whereIn('customer_id', $customerIDs)
                    ->where('date', today()->format('Y-m-d'))
                    ->count();
            
                // Get all suppliers belonging to this shop user
                $supplierIDs = Supplier::where('user_id', $userID)->pluck('id');
            
                // Filter purchases where supplier_id belongs to this shop user
                $purchases = Purchase::whereIn('supplier_id', $supplierIDs)->count();
                $todayPurchases = Purchase::whereIn('supplier_id', $supplierIDs)
                    ->where('date', today())
                    ->count();
            }
            
            
        return view('dashboard', [
            'products' => $products,
            'orders' => $orders,
            'completedOrders' => $completedOrders,
            'purchases' => $purchases,
            'todayPurchases' => $todayPurchases,
            'categories' => $categories,
            'quotations' => $quotations,
            'todayQuotations' => $todayQuotations,
        ]);
    }
}
