<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

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
          'title'=>'required|max:5',
          'description'=>'required|min:10',
          'price'=>'required|numeric',
          'amount'=>'required|numeric'
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

      if(count(request('product_image')) > 0){
        
       
        foreach (request('product_image') as $image) {
              
          $img = time().'.'.$image->getClientOriginalExtension();
          $location =public_path('images/products/'.$img);
          Image::make($image->getRealPath())->save($location);
          $product_image = new ProductImage;
          $product_image->product_id = $product->id;
          $product_image->image = $img;
          $product_image->save();
            
        };

      
       
       };

      
      return redirect('/admin/create')->with('message','Successfully Added');

    



       
    }
}
