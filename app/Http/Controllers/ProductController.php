<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $product = Product::Paginate(5);
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
        alert()->success('บันทึกสำเร็จ','');
        return redirect()->route('pro.index');
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        alert()->success('ลบข้อมูลสำเร็จ','');
        return redirect()->route('pro.index');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));

    }

    public function update(Request $request, $id){
        $pro = Product::find($id);
        $pro->name = $request->name;
        $pro->price = $request->price;
        $pro->description = $request->description;
        $pro->update();
        alert()->success('แก้ไขสำเร็จ','');
        return redirect()->route('pro.index');
    }
}




