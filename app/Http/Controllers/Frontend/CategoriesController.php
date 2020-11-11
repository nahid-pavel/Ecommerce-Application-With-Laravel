<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        return view('frontend.pages.category.index');
    }

    public function show($id){
      $category = Category::find($id);
      

      return view('frontend.pages.category.show',compact('category'));
        
    }

    

    
}
