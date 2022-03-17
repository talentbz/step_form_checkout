@extends('front.layouts.index')
@section('title') Modern Business - Start Bootstrap Template @endsection
@section('css')
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
<link href="{{ URL::asset('/assets/front/form-validation.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container mt-5">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your order</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">No-parking zone basic</h6>
              <small class="text-muted">basic no parking zone</small>
            </div>
            <span class="text-muted">89,00 €</span>
          </li>
          @if($duration_desc != '1 day' ) 
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Duration extension</h6>
              <small class="text-muted">{{$duration_desc}}</small>
            </div>
            <span class="text-muted">{{ number_format($order->duration, 2, ',', '');}} €</span>
          </li>
          @endif
          @if($length_desc != '7,5 Meters' ) 
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Length extension</h6>
              <small class="text-muted">{{$length_desc}}</small>
            </div>
            <span class="text-muted">{{ number_format($order->length, 2, ',', '')}} €</span>
          </li>
          @endif
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><strong>Total</strong></h6>
              <small class="text-muted" style="font-size: 0.6rem; text-align: end;">contains {{number_format(round(($price + $order->length + $order->duration)/100*19, 2), 2, ',', '')}} € VAT (19%)</small>
            </div>
            <strong>{{number_format(($price + $order->length + $order->duration), 2, ',', '')}} €</strong>
        </ul>

      
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Address of the no-parking zone</h4>
        <form class="needs-validation" action="{{route('front.checkout_post_2')}}" method="POST" novalidate>
          @csrf
          <div class="row g-3">
            <div class="col-8">
              <label for="address" class="form-label">Street</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="street" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-4">
              <label for="address" class="form-label">Number</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="number" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

          
            <div class="col-md-12">
              <label for="zipcode" class="form-label">Zip Code</label>
              <select class="form-select" id="country" name="zip_code" required>
                <option value="">Choose...</option>
                <option>48143 Münster</option>
                <option>48147 Münster</option>
                <option>48151 Münster</option>
                <option>48153 Münster</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid zip code.
              </div>
            </div>

          <hr class="my-4">

          <h4 class="mb-3">Special instructions (optional)</h4>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address" name="same_address" >
            <label class="form-check-label" for="same-address">There is an absolute parking ban in front of the property</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-parking" name="same_parking" >
            <label class="form-check-label" for="same-parking">There are parking meters or parking ticket machines in front of the property</label>
          </div>


          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info" name="save_info">
            <label class="form-check-label" for="save-info">In front of the property is a resident parking zone</label>
          </div>

        
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to enter billing details</button>
        </form>
      </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/front/form-validation.js') }}"></script>
@endsection