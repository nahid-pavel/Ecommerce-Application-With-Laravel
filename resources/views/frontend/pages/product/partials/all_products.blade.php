<div class="row">

    @foreach($products as $product)
    <div class="col-md-3">
        <div class="card ">
            @php $i=0; @endphp
            @foreach ($product->images as $image)
            @if($i ===0) <img class="card-img-top featured_img " src="/images/products/{{ $image->image }}"
                alt="Card image">
            @endif
            @php $i--; @endphp
            @endforeach
            <div class="card-body">
                <h4 class="card-title"><a href="{{ route('products.show',$product->slug) }}">{{ $product->title }}</a>
                </h4>
                <p class="card-text"> Taka-{{ $product->price }}</p>
                <a href="#" class="btn btn-outline-success btn-block">Add to Cart</a>
            </div>
        </div>
    </div>
    @endforeach
</div>