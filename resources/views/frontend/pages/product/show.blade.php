@extends('frontend.layout.master')

@section('title')
{{ $product->title }}
@endsection

@section('content')
<div class="container margin-top-20 ">

    <div class="row">

        <div class="col-md-4 ">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @php $i=0; @endphp
                    @foreach($product->images as $image)
                    <div class="product-item carousel-item {{ $i==0 ?'active':'' }}">
                        <img class="d-block w-100" src="/images/products/{{ $image->image }}" alt="First slide" />
                    </div>

                    @php $i++ @endphp
                    @endforeach


                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            Category <span class="badge badge-primary">{{ $product->category->name}}</span><br />
            Brand <span class="badge badge-primary">{{ $product->brand->name }}</span>
        </div>

        <div class="col-md-8">
            <div class="widget">
                <h3>{{ $product->title }}</h3>
                <h3>{{ $product->price  }} Taka
                    <span class="badge badge-primary">
                        {{ $product->amount < 1  ? 'No Item in stock': $product->amount.' Item in stock ' }}
                    </span>
                </h3>
                <hr />
                <div class="description">
                    {{ $product->description }}
                </div>
            </div>



        </div>


    </div>

</div>

@endsection