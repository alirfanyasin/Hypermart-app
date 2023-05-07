<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('user.cart');
    }

    


    public function read()
    {   
        $carts = Cart::with(['user', 'product'])->get();



        return view('user.component.data_cart')->with([
            'data' => $carts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();

        if($product->stock <= $request->count){
            return response()->json(['error' => 'Stock tidak mencukupi'], 422);
        }
        if($request->count == 0 || $request->count < 0){
            return response()->json(['error' => 'Jumlah pesanan tidak boleh 0'], 422);
        }
        if($product->stock > $request->count){
            $new_stock = $product->stock - $request->count;
            $data = [
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'size' => $request->size,
                'count' => $request->count,
            ];
            $product->update(['stock' => $new_stock]);
            Cart::create($data);
            return response()->json(['success' => 'Product added successfully']);

        }




        
       
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return response()->json(['success' => 'Product removed successfully']);
    }
}
