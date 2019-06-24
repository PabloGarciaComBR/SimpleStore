@extends('layouts.app')

@section('content')
<div class="container ss-products-index">
  <div class="row">
    <div class="col-md-12 order-md-1">
      <h4 class="d-flex justify-content-between align-items-center mb-5">
        <span class="text-muted">{{ __('My address') }}</span>
      </h4>
      <form class="needs-validation" novalidate="">
        <h5 class="mb-3">Billing address</h5>
        <hr class="mb-4">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">

          <div class="col-md-10 mb-3">
            <div id="ss-region-combo"></div>
          </div>

          <div class="col-md-2 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required="">
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>

        </div>

        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('Continue to checkout') }}</button><hr class="mb-4">

      </form>
    </div>
  </div>
</div>
@endsection
