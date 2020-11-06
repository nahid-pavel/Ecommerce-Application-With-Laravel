<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PagesController extends Controller
{
    //

    public function index(){
      return view('pages.index');
    }

    public function products(){
        $products = Product::orderBy('id','desc')->get();
        return view('pages.product.index',['products'=>$products]);
      }

}
