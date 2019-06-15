@extends('layouts.app')

@section('content')
<div class="container ss-products-index">
  <div class="row">

    @foreach ($products as $product)

    <div class="col-md-3 ss-product-item">
      <div class="card">
        <div class="card-header">{{ $product->name }}</div>
        <div class="card-body">
          <p>{{ $product->description }}</p>
          <span class="ss-product-price">${{ $product->price }}</span>
          <a href="/product/show/{{ $product->id }}" class="btn btn-primary btn-md btn-block">See details</a>
        </div>
      </div>
    </div>

    @endforeach

  </div>
</div>
@endsection
