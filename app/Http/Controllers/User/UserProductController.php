<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProductController extends Controller
{
    public function index()
    {
        return view('user.product');
    }

    public function read() {
        $products = DB::table('products')->orderBy('id', 'desc')->get();
        return view('user.component.data_product')->with([
            'data' => $products
        ]);
    }

    public function show($id) {
        return view('user.component.data_modal_detail_product')->with([
            'data' => Product::find($id)
        ]);
    }


    public function modal_cart($id){
        return view('user.component.data_modal_cart_product')->with([
            'data' => Product::find($id)
        ]);
    }

    
    public function search(Request $request)
    {
       
        if (!empty($request->query)) {
            $query = $request->input('query');
            $products = Product::where('name', 'LIKE', '%'.$query.'%')->get();
            return view('user.component.search')->with([
                'data' => $products,
                'query' => $query
            ]);
        } else {
            return redirect()->back();
        }
    }
    

}
