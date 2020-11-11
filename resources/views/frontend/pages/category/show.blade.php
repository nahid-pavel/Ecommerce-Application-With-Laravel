@extends('frontend.layout.master')

@section('content')
<div class="container margin-top-20 ">
    <div class="row">

        <div class="col-md-4">
            @include('frontend.partials.sidebar')
        </div>

        <div class="col-md-8">
            <div class="widget margin-top-20">
                <h2>All Products in {{ $category->name }}</h2>
                @php
                $products= $category->products()->get();
                @endphp

                @if($products->count() > 0)
                @include('frontend.pages.product.partials.all_products')
                @else
                <div class="alert alert-warning">No Products found</div>
                @endif


            </div>
        </div>


    </div>

</div>

@endsection