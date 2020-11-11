@extends('frontend.layout.master')

@section('content')
<div class="container margin-top-20 ">
    <div class="row">
        <div class="col-md-4">
            @include('frontend.partials.sidebar')
        </div>

        <div class="col-md-8">
            <div class="widget margin-top-20">
                <h2>Featured Products</h2>
                @include('frontend.pages.product.partials.all_products')
            </div>
        </div>


    </div>

</div>

@endsection