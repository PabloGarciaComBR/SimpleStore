@extends('layouts.app')

@section('content')
<div class="container ss-products-index">
  <div class="row">
    <div class="col-md-12">
      <h4 class="d-flex justify-content-between align-items-center mb-5">
        <span class="text-muted">My cart</span>
        <span class="badge badge-secondary badge-pill">{{ count($cart) }}</span>
      </h4>
      <ul class="list-group mb-3">
        @forelse ($cart as $item)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">{{ $item['name'] }}</h6>
            <small class="text-muted">{{ $item['description'] }} - {{ $item['quantity'] }}un</small>
          </div>
          <div class="text-right">
            <h6 class="my-0">${{ $item['total'] }}</h6>
            <small class="text-muted">{{ $item['howMany'] }} x ${{ $item['price'] }}</small>
          </div>
        </li>
        @empty
        <p>You don't have any products in your cart :(</p>
        @endforelse
        <!--
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        -->
        <li class="list-group-item d-flex justify-content-between bg-dark ss-cart-total">
          <span>Total (USD)</span>
          <strong>${{ $counter['total'] }}</strong>
        </li>
      </ul>
    </div>
  </div>

  @if (count($cart))
  <div class="row">
    <!--
    <div class="col-md-4">
      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    -->

    <div class="col-md-4 offset-md-8">
      <form class="card p-2" action="/cart/shipping">
        <div class="input-group">
          <button class="btn btn-primary btn-md btn-block" type="submit">Continue to shipping method</button>
        </div>
      </form>
    </div>
  </div>
  @endif

</div>
@endsection
