@extends('backend.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @if(session('message'))
        <h2 class="text-success">{{ session('message') }}</h2>
        @endif
        <div class="card">
            <div class="card-header">Edit Category</div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.category.update',$category) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') && 'error' }}"
                            placeholder="Enter Category name" name="name" value={{ $category->name }}>
                        @error('name') <p class="text-danger">{{ $message }}<p>
                                @enderror

                    </div>
                    <div class="form-group">
                        <label for="description"> Description</label>
                        <textarea class="form-control {{ $errors->has('description') && 'error' }}"
                            placeholder="Enter Category description" cols="50" rows="5"
                            name="description">{{ $category->description }}</textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}<p>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Parent Category</label>
                        <select class="form-control" name="parent_id">
                            <option>Please Select Parent Category(Optional)</option>
                            @foreach($main_categories as $cat)
                            <option value={{ $cat->id }} {{ $cat->id === $category->parent_id?'selected':''}}>
                                {{ $cat->name  }}
                            </option>
                            @endforeach
                        </select>


                    </div>
                    <div class="form-group">
                        <label for="desction">Old Image</label><br />
                        <img src="/images/categories/{{ $category->image }}" alt="image" width="100" /><br />
                        <label for="desction"> New Image (Optional)</label>
                        <input type="file" class="form-control" placeholder="Enter image" name="image">
                        @error('image')
                        <p class="text-danger">{{ $message }}<p>
                                @enderror
                    </div>



                    <button type="submit" class="btn btn-primary">Update Category</button>

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