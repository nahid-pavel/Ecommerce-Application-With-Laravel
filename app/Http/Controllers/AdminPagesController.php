<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class AdminPagesController extends Controller
{
    public function index(){
        return view('pages.admin.index');
    }

    public function create(){
        return view('pages.admin.products.create');
    }
    public function store(Product $product){
       
     request()->validate([
          'title'=>'required',
          'description'=>'required',
          'price'=>'required',
          'amount'=>'required'
      ]);
      
      
      $product->title=  request('title');
      $product->description = request('description');
      $product->price= request('price');
      $product->amount=request('amount');
      $product->slug= Str::slug($product->title);
      $product->admin_id=1;
      $product->category_id=1;
      $product->brand_id=1;

      $product->save();
      return redirect('/admin/create')->with('message','Successfully Added');

    



       
    }
}
