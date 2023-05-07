<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('product');
    }
    

    public function read_product()
    {
        return view('user.component.data_product_guest')->with([
            'data' => DB::table('products')->orderBy('id', 'desc')->get()
        ]);
    }

   
    public function show($id) {
        return view('user.component.data_modal_detail_product')->with([
            'data' => Product::find($id)
        ]);
    }

    public function search(Request $request)
    {
       
        if (!empty($request->query)) {
            $query = $request->input('query');
            $products = Product::where('name', 'LIKE', '%'.$query.'%')->get();
            return view('search_results')->with([
                'data' => $products,
                'query' => $query
            ]);
        } else {
            return redirect()->back();
        }
    }
}
