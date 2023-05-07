<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{

    // Producs
    public function product(){
        return view('user.product');
    }

    public function getProducts()
    {
        $products = DB::table('products')
        ->orderBy('id', 'desc')
        ->get();
        // $products = Product::all();
        return view('user.component.data_product_admin')->with([
            'success' => true,
            'data' => $products
        ]);
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'size' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // Simpan gambar ke direktori public/images
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        // Simpan data produk ke database
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
            'size' => $request->size,
            'image' => $imageName
        ];

        Product::create($data);

        return response()->json(['success' => 'Product added successfully.']);
    }


    public function show($id)
    {
        return view('user.component.data_detail_product_admin')->with([
            'data' => Product::find($id)
        ]);
    }


    public function edit($id)
    {
        return view('user.component.data_edit_product_admin')->with([
            'data' => Product::find($id)
        ]);
        
    }

    public function update(Request $request, $id){

        $product = Product::find($id);
    
        // Validasi input
        $request->validate([
            'name' => 'required|unique:products,name,'.$product->id,
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'size' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);
    
        // Jika ada gambar yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('images/'.$product->image))) {
                unlink(public_path('images/'.$product->image));
            }
            // Simpan gambar ke direktori public/images
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
    
            $product->image = $imageName;
        }
    
        // Simpan data produk ke database
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->size = $request->size;
        $product->save();
    
        return response()->json([
            'success' => true,
        ]);
    }    


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path('images/' . $product->image);
    
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        $product->delete();
    
        return response()->json([
            'success' => true,
        ]);
    }
}
