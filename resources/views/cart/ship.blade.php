@extends('layouts.app')

@section('content')
<div class="container ss-products-index">
  <div class="row">
    <div class="col-md-12 order-md-1">
      <h4 class="d-flex justify-content-between align-items-center mb-5">
        <span class="text-muted">{{ __('My address') }}</span>
      </h4>
      <form class="needs-validation" novalidate="" method="POST" action="/cart/save-shipping">
        {{ @csrf_field() }}
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">{{ __('First name') }}</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              {{ __('Valid first name is required.') }}
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">{{ __('Last name') }}</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              {{ __('Valid last name is required.') }}
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="address">{{ __('Address') }}</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required="">
          <div class="invalid-feedback">
            {{ __('Please enter your shipping address.') }}
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">{{ __('Address 2') }} <span class="text-muted">({{ __('Optional') }})</span></label>
          <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">

          <div class="col-md-10 mb-3">
            <div id="ss-region-combo"></div>
          </div>

          <div class="col-md-2 mb-3">
            <label for="zip">{{ __('Postal code') }}</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required="">
            <div class="invalid-feedback">
              {{ __('Postal code required.') }}
            </div>
          </div>

        </div>

        <div class="col-md-4 offset-md-8">
          <div class="input-group">
            <button class="btn btn-primary btn-md btn-block" type="submit">{{ __('Continue to payment') }}</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
