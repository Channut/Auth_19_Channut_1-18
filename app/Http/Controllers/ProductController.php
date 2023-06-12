<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('admin.product.index',compact('product'));
    }


    public function create(){
        return view('admin.product.create');


    }
    public function insert (Request $request){
        $pro = new Product();
        $pro->name = $request->name;
        $pro->price = $request->price;
        $pro->description = $request->description;
        $pro->save();
        return redirect()->route('pro.index');
    }
}


