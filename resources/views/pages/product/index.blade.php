@extends('master')

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
                <h2>Featured Products</h2>
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card ">
                            @php $i=1 @endphp
                            @foreach($product->images as $image)
                            @if($i > 0)
                            <img class="card-img-top featured_img " src="/images/{{ $image->image  }}" alt="Card image">
                            @endif
                            @php $i-- @endphp
                            @endforeach

                            <div class="card-body">
                                <h4 class="card-title">{{ $product->title }}</h4>
                                <p class="card-text">{{ $product->price }}</p>
                                <a href="#" class="btn btn-outline-success btn-block">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>


    </div>

</div>

@endsection