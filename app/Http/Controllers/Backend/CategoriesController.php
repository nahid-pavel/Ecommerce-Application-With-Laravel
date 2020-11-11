<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Models\Category;
use Image;
use File;


class CategoriesController extends Controller
{
    public function  index(){
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.pages.category.index',compact('categories'));
    }

    public function create(){
        $main_categories =  Category::orderBy('id','desc')->where('parent_id',null)->get();
        return view('backend.pages.category.create', compact('main_categories'));
    }

    public function store(Category $category){

        
       
        request()->validate([
            'name'=>'required',
            'description'=>'required',
            'image' =>'nullable|image'
        ],[
            'name.required'=>'please enter category name',
            'image.image'=>'please enter valid image with extenstion like.jpg or .png'
        ]);

        $category->name = request('name');
        $category->description= request('description');
        $category->parent_id = request('parent_id');
        if(request('image')){
          $image=request('image');
          $img = time().'.'.$image->getClientOriginalExtension();
          $location =public_path('images/categories/'.$img);
          Image::make($image->getRealPath())->save($location);
          $category->image=$img;
        }
        $category->save();

        return redirect()->route('admin.category.create')->with('message','Category Created Successfully');

    }

    public function edit(Category $category){
        $main_categories =  Category::orderBy('id','desc')->where('parent_id',null)->get();
        return view('backend.pages.category.edit',compact('category','main_categories'));
    }

    public function update(Category $category){

        request()->validate([
            'name'=>'required',
            'description'=>'required',
            'image' =>'nullable|image'
        ],[
            'name.required'=>'please enter category name',
            'image.image'=>'please enter valid image with extenstion like.jpg or .png'
        ]);

        $category->name = request('name');
        $category->description= request('description');
        $category->parent_id = request('parent_id');
        if(request('image')){
        if(File::exists('images/categories/'.$category->image)){
            File::delete('images/categories/'.$category->image);
        }
          $image=request('image');
          $img = time().'.'.$image->getClientOriginalExtension();
          $location =public_path('images/categories/'.$img);
          Image::make($image->getRealPath())->save($location);
          $category->image=$img;
        }
        $category->save();

        return redirect()->route('admin.category.index')->with('message','Category updated Successfully');
   }

   public function destroy(Category $category){
     
     if($category->parent_id === NULL){
       
       $sub_categories  = Category::orderBy('id','desc')->where('parent_id',$category->id)->get();
       foreach($sub_categories as $sub){
           
           if(File::exists('images/categories/'.$sub->image)){
             File::delete('images/categories/'.$sub->image);
           }
           $sub->delete();
       }

     }
     
      if(File::exists('images/categories/'.$category->image)){
        File::delete('images/categories/'.$category->image);
      }

       $category->delete();



       return back()->with('message','Category has been deleted');

   }
}
