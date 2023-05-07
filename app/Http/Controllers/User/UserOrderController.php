<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOrderController extends Controller
{
    public function index() {
        return view('user.order');
    }

    public function read() {

        return view('user.component.data_order')->with([
            'data' => DB::table('orders')->orderBy('id', 'desc')->get()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
        ]);

        $orders = $request->products;

        foreach ($orders as   $order) {
            $data = [
                'user_id' => $order['user_id'],
                'name' => $order['name'],
                'stock' => $order['stock'],
                'price' => $order['price'],
                'category' => $order['category'],
                'sold' => $order['sold'],
                'count' => $order['count'],
                'size' => $order['size'],
                'status' => $order['status'],
                'image' => $order['image'],
                'payment' => $order['payment'],
            ];

            Order::create($data);
            Cart::where('user_id', $data['user_id'])->delete();
        }

    
        return response()->json(['success' => 'Order has been added successfully']);
    }



    // Finish Order
    public function finish(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->sold = $request->sold;
        $order->save();

        
        return response()->json(['success' => 'Successfully completed the order']);
    }

    // Cancel Order
    public function cancel(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        
        return response()->json(['success' => 'Successfully canceled the order']);
    }

    // Delete Order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        return response()->json(['success' => 'Successfully deleted the order']);
    }



}
