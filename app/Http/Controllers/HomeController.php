<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function read_product(){
        return view('home_read_new_product')->with([
            'data' => Product::latest()->take(4)->get()
        ]);
    }
}
