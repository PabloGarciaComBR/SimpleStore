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
                                    <p class="ss-product-price">${{ $product->price }}</p>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="ss-product-multiply">
                                            <option selected>Choose...</option>
                                            @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="ss-product-multiply">x {{ $product->quantity }}</label>
                                        </div>
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
