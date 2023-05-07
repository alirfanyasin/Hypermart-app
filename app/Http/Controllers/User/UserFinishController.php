<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UserFinishController extends Controller
{
    public function index() {
        return view('user.finish');
    }

    public function read() {
        
        return view('user.component.data_finish')->with([
            'data' => Order::where('status', 'Finish')->orderBy('id','desc')->get()
        ]);
    }


}
