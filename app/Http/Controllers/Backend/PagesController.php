<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Support\Facades\Request;
use App\Models\Product;
use App\Models\ProductImage;
use  App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;


class PagesController extends Controller
{
    public function index(){
        return view('backend.pages.index');
    }

   
        
    
}
