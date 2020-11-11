<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Support\Facades\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use  App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;

class ProductsController extends Controller
{
    public function index(){
      $products= Product::orderBy('id','desc')->get();

      return view('backend.pages.product.index',compact('products'));
    }

    public function create(){
        return view('backend.pages.product.create');
    }
    public function store(Product $product){
       
     request()->validate([
          'title'=>'required',
          'description'=>'required',
          'price'=>'required',
          'amount'=>'required',
          'category_id'=>'required',
          'brand_id'=>'required'
      ]);
      
      
      $product->title=  request('title');
      $product->description = request('description');
      $product->price= request('price');
      $product->amount=request('amount');
      $product->slug= Str::slug($product->title);
      $product->admin_id=1;
      $product->category_id=request('category_id');
      $product->brand_id=request('brand_id');
      $product->save();

      if(count(request('product_image')) > 0){
        
       
        foreach (request('product_image') as $image) {
              
          $img = time().'.'.$image->getClientOriginalExtension();
          $location =public_path('images/products/'.$img);
          Image::make($image->getRealPath())->save($location);
          $product_image = new ProductImage;
          $product_image->product_id = $product->id;
          $product_image->image = $img;
          $product_image->save();
            
        }

      
       
       }

      
      return redirect()->route('admin.products.create')->with('message','Successfully Added');
    }

   

    public function edit(Product $product){
         
      return view('backend.pages.product.edit',compact('product'));
    }

    public function update(Product $product){
         
          request()->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'amount'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required'
        ]);
        
        
        $product->title=  request('title');
        $product->description = request('description');
        $product->price= request('price');
        $product->amount=request('amount');
        $product->category_id=request('category_id');
        $product->brand_id=request('brand_id');
        $product->save();
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product){
         $product->delete();
         return back()->with('message','Product has been deleted');
    }

   
}
