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
                    <div class="col-md-3">
                        <div class="card ">
                            <img class="card-img-top featured_img " src="images/1.jpg" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text.</p>
                                <a href="#" class="btn btn-outline-success btn-block">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card ">
                            <img class="card-img-top featured_img " src="images/1.jpg" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text.</p>
                                <a href="#" class="btn btn-outline-success btn-block">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card ">
                            <img class="card-img-top featured_img " src="images/1.jpg" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text.</p>
                                <a href="#" class="btn btn-outline-success btn-block">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>

</div>

@endsection