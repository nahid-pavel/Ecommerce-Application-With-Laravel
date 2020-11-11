<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Product;
use  App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //

    public function index(){
      $products = Product::orderBy('id','desc')->get();
      return view('frontend.pages.index',compact('products'));
    }

    public function search(){
       
      $search= request('search');

      

      $products= Product::orWhere('title','like', '%'.$search.'%')
                          ->orWhere('description','like', '%'.$search.'%')
                          ->orWhere('amount','like', '%'.$search.'%')
                          ->orWhere('price','like', '%'.$search.'%')
                          ->orderBy('id','desc')->get();

        
                          

       return  view('frontend.pages.product.search',compact('products','search'));


    }
    

   

}
