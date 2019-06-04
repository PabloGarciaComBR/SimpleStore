@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $product->description }}</li>
                                    <li class="list-group-item">Quantity: {{ $product->quantity }}</li>
                                    <li class="list-group-item">ID: #{{ $product->id }}</li>
                                </ul>
                            </div>

                            <div class="col-md-5 offset-md-1">
                                <form method="POST" action="/cart/add">

                                    <!-- product price component -->
                                    <div id="product-price-component"
                                         data-price="{{ $product->price }}"
                                         data-how-many="10"
                                         data-product-quantity="{{ $product->quantity }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Buy now</button>
                                </form>
                            </div>

                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
