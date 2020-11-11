@extends('backend.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @if(session('message'))
        <h2 class="text-success">{{ session('message') }}</h2>
        @endif
        <div class="card">
            <div class="card-header">Edit Product</div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.products.update',$product) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control {{ $errors->has('title') && 'error' }}"
                            placeholder="Enter Product title" value={{ $product->title }} name="title">
                        @error(' title') <p class="text-danger">{{ $message }}<p>
                                @enderror

                    </div>
                    <div class="form-group">
                        <label for="description"> Description</label>
                        <textarea class="form-control {{ $errors->has('description') && 'error' }}"
                            placeholder="Enter Product description" cols="50" rows="5"
                            name="description">{{  $product->description }}</textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}<p>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="desction"> Price</label>
                        <input type="number" class="form-control {{ $errors->has('price') && 'error'}}"
                            placeholder="Enter price" name="price" value="{{ $product->price }}">
                        @error('price')
                        <p class=" text-danger">{{ $message }}<p>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Select Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Please Select a Category</option>
                            @foreach(App\Models\Category::where('parent_id',NULL)->orderBy('id','asc')->get() as
                            $parent)
                            <option value="{{ $parent->id }}" {{ $product->category_id == $parent->id?'selected':'' }}>
                                {{ $parent->name }}</option>
                            @foreach(App\Models\Category::where('parent_id',$parent->id)->orderBy('id','asc')->get() as
                            $child)
                            <option value="{{ $child->id }}" {{ $product->category_id == $child->id?'selected':''  }}>
                                ------->{{ $child->name }}</option>
                            @endforeach
                            @endforeach

                        </select>
                        @error('category_id') <p class="text-danger">{{ $message }}<p>
                                @enderror

                    </div>

                    <div class="form-group">
                        <label for="title">Select Brand</label>
                        <select class="form-control" name="brand_id">
                            <option value="">Please Select a Brand</option>
                            @foreach(App\Models\Brand::orderBy('id','desc')->get() as
                            $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id?'selected':'' }}>
                                {{ $brand->name }}</option>
                            @endforeach

                        </select>
                        @error('brand_id') <p class="text-danger">{{ $message }}<p>
                                @enderror

                    </div>
                    <div class="form-group">
                        <label for="description">Quantity</label>
                        <input type="number" class="form-control {{ $errors->has('amount') &&  'error' }}"
                            placeholder="Enter quantity" value="{{ $product->amount }}" name="amount">
                        @error('amount')
                        <p class="text-danger">{{ $message }}<p>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="desction">Upload Image</label>
                        <div class="row">
                            <div class="col-md-3">

                                <input type="file" class="form-control" placeholder="Enter price"
                                    name="product_image[]">
                            </div>
                            <div class="col-md-3">

                                <input type="file" class="form-control" placeholder="Enter price"
                                    name="product_image[]">
                            </div>
                            <div class="col-md-3">

                                <input type="file" class="form-control" placeholder="Enter price"
                                    name="product_image[]">
                            </div>
                            <div class="col-md-3">

                                <input type="file" class="form-control" placeholder="Enter price"
                                    name="product_image[]">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Product</button>

                </form>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a
                    href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights
                reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
                    href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a>
                templates</span>
        </div>
    </footer>
    <!-- partial -->
</div>

@endsection