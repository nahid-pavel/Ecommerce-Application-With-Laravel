@extends('pages.admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @if(session('message'))
        <h2 class="text-success">{{ session('message') }}</h2>
        @endif
        <div class="card">
            <div class="card-header">Add New Product</div>
            <div class="card-body">
                <form method="post" action="/admin/create">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Product title" name="title">
                        @error('title')
                        <p class="text-danger">{{ $message }}<p>
                                @enderror

                    </div>
                    <div class="form-group">
                        <label for="description"> Description</label>
                        <textarea class="form-control" placeholder="Enter Product description" cols="50" rows="5"
                            name="description"></textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}<p>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="desction"> Price</label>
                        <input type="number" class="form-control" placeholder="Enter price" name="price">
                        @error('price')
                        <p class="text-danger">{{ $message }}<p>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter quantity" name="amount">
                        @error('amount')
                        <p class="text-danger">{{ $message }}<p>
                                @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>

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