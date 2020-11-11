<?php



namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Models\Brand;
use Image;
use File;


class BrandsController extends Controller
{
    public function  index(){
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brand.index',compact('brands'));
    }

    public function create(){
        
        return view('backend.pages.brand.create');
    }

    public function store(Brand $brand){

        
       
        request()->validate([
            'name'=>'required',
            'description'=>'required',
            'image' =>'nullable|image'
        ],[
            'name.required'=>'please enter brand name',
            'image.image'=>'please enter valid image with extenstion like.jpg or .png'
        ]);

        $brand->name = request('name');
        $brand->description= request('description');
       
        if(request('image')){
          $image=request('image');
          $img = time().'.'.$image->getClientOriginalExtension();
          $location =public_path('images/brands/'.$img);
          Image::make($image->getRealPath())->save($location);
          $brand->image=$img;
        }
        $brand->save();

        return redirect()->route('admin.brand.create')->with('message','brand Created Successfully');

    }

    public function edit(Brand $brand){
        
        return view('backend.pages.brand.edit',compact('brand'));
    }

    public function update(Brand $brand){

        request()->validate([
            'name'=>'required',
            'description'=>'required',
            'image' =>'nullable|image'
        ],[
            'name.required'=>'please enter brand name',
            'image.image'=>'please enter valid image with extenstion like.jpg or .png'
        ]);

        $brand->name = request('name');
        $brand->description= request('description');
       
        if(request('image')){
        if(File::exists('images/brands/'.$brand->image)){
            File::delete('images/brands/'.$brand->image);
        }
          $image=request('image');
          $img = time().'.'.$image->getClientOriginalExtension();
          $location =public_path('images/brands/'.$img);
          Image::make($image->getRealPath())->save($location);
          $brand->image=$img;
        }
        $brand->save();

        return redirect()->route('admin.brand.index')->with('message','brand updated Successfully');
   }

   public function destroy(Brand $brand){
     
      $brand->delete();

      return back()->with('message','brand has been deleted');

   }
}
