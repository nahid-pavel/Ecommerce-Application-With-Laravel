@extends('frontend.layout.master')

@section('content')
<div class="container margin-top-20 ">
    <div class="row">

        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">First item</a>
                <a href="#" class="list-group-item list-group-item-action">Second item</a>
                <a href="#" class="list-group-item list-group-item-action">Third item</a>
            </div>
        </div>

        <div class="col-md-8">
            <div class="widget margin-top-20">
                <h2>Searched Products - <span class="badge badge-primary">{{ $search }}</span></h2>
                @include('frontend.pages.product.partials.all_products')
            </div>
        </div>


    </div>

</div>

@endsection