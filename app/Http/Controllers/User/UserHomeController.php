<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index() {
        return view('user.home');
    }

    public function read_new_product(){
        return view('user.component.data_new_product_home')->with([
            'data' => Product::latest()->take(4)->get()
        ]);
    }

    public function modal_cart($id){
        return view('user.component.data_modal_cart_new_product_home')->with([
            'data' => Product::find($id)
        ]);
    }
}
