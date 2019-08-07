@extends('layouts.app')

@section('content')
<div class="container ss-products-index">
  <div class="row">
    <div class="col-md-12 order-md-1">
      <h4 class="d-flex justify-content-between align-items-center mb-5">
        <span class="text-muted">{{ __('Payment') }}</span>
      </h4>

      <form class="needs-validation" novalidate="" method="POST" action="/cart/save-order">
        {{ @csrf_field() }}
        <div class="d-block my-3">
          @forelse ($paymentTypes as $typeId => $typeName)
          <div class="custom-control custom-radio">
            <input id="pay-type-{{ $typeId }}" name="paymentMethod" type="radio" class="custom-control-input" value="{{ $typeId }}" required>
            <label class="custom-control-label" for="pay-type-{{ $typeId }}">{{ __($typeName) }}</label>
          </div>
          @empty
            {{ __('At this moment, we haven\'t any payment types available.') }}
          @endforelse
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">{{ __('Name on card') }}</label>
            <input type="text" class="form-control" id="cc-name" name="cc-name" placeholder="" required>
            <small class="text-muted">{{ __('Full name as displayed on card') }}</small>
            <div class="invalid-feedback">
              {{ __('Name on card is required') }}
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">{{ __('Credit card number') }}</label>
            <input type="text" class="form-control" id="cc-number" name="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              {{ __('Credit card number is required') }}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">{{ __('Expiration') }}</label>
            <input type="text" class="form-control" id="cc-expiration" name="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              {{ __('Expiration date required') }}
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">{{ __('CVV') }}</label>
            <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              {{ __('Security code required') }}
            </div>
          </div>
        </div>

        <div class="col-md-4 offset-md-8">
          <div class="input-group">
            <button class="btn btn-primary btn-md btn-block" type="submit">{{ __('Continue to checkout') }}</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection
