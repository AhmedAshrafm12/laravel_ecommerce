@extends('layouts.front')
@section('title')
my orders
@endsection
@section('content')
<div class="container">

<div class="row mt-4">
   <div class="col-lg-4">

    <div class="card p-2">
        <img src="{{ asset('assets/uploads/avatar/—Pngtree—user vector avatar_4830521.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ Auth::user()['firstName'].' '.Auth::user()['lastName'] }}</h5>
          <ul class="list-group mb-2">
            <li class="list-group-item p-2"><strong>{{ __('checkOut.email') }}: </strong>{{ Auth::user()['email'] }}</li>
            <li class="list-group-item p-2"><strong>{{ __('checkOut.mobile') }}:   </strong>{{ Auth::user()['mobile'] }}</li>
            <li class="list-group-item p-2"><strong>{{ __('checkOut.address') }}: </strong>{{ Auth::user()['address'] }}</li>
          </ul>
          <a href="#" class="btn btn-primary pull-right mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ __('myOrders.update') }}</a>
        </div>
      </div>


   </div>
   <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form" method="POST" action="{{ url('updateuser') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('checkOut.NAME') }}</label>

                <div class="col-md-6">
                    <input id="name" value='{{ Auth::user()['name'] }}' type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('checkOut.email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" value='{{ Auth::user()['email'] }}' class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>



            <div class="form-group row">
                <label for="firstName"  class="col-md-4 col-form-label text-md-right">{{ __('checkOut.firstName:') }}</label>
                <div class="col-md-6">
                    <input id="firstName" type="text" value='{{ Auth::user()['firstName'] }}' class="form-control @error('firstName') is-invalid @enderror" name="firstName" required autocomplete="new-firstName">

                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('checkOut.lastName') }}</label>

                <div class="col-md-6">
                    <input id="lastName"  value='{{ Auth::user()['firstName'] }}' type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" required autocomplete="new-lastName">

                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('checkOut.country') }}</label>

                <div class="col-md-6">
                    <input id="country"  value='{{ Auth::user()['country'] }}' type="text" class="form-control @error('country') is-invalid @enderror" name="country" required autocomplete="new-country">

                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('checkOut.city') }}</label>

                <div class="col-md-6">
                    <input id="city"  value='{{ Auth::user()['city'] }}' type="text" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="new-city">

                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('checkOut.address') }}</label>

                <div class="col-md-6">
                    <input id="address"  value='{{ Auth::user()['address'] }}' type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="new-address">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('checkOut.mobile') }}</label>

                <div class="col-md-6">
                    <input id="mobile"  value='{{ Auth::user()['mobile'] }}' type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" required autocomplete="new-mobile">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">{{ __('myOrders.save') }}</button>
        </form></div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('myOrders.cancel') }}</button>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-8">
    <table class="table table-striped mt-4">
        <h1 class="bg-info text-light p-2 mt-4"">{{ __('myOrders.orders') }}</h1>
      <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('myOrders.trakcking_number') }}</th>
            <th scope="col">{{ __('myOrders.price') }}</th>
            <th scope="col">{{ __('myOrders.status:') }}</th>
            <th scope="col">{{ __('myOrders.action') }}</th>
          </tr>
        </thead>
      <tbody>
          @php
          $i=0;
      @endphp
          @foreach ($orders as $order )
          @php
              $i++;
          @endphp
          <tr>
              <th scope="row">{{ $i }}</th>
              <td># {{ $order->trakcking_number }}</td>
              <td>{{ $order->total }}</td>
              <td>{{ $order->status == 0 ?  __('myOrders.pending')  : __('myOrders.completed')  }}</td>
              <td><a class="btn btn-info" href="{{ url('order-view/'.$order->id ) }}">{{ __('myOrders.view') }}</a></td>
            </tr>
          @endforeach

      </tbody>
    </table>


</div>
</div>


</div>
@endsection
@section('scripts')
<script>
    form.onsubmit=function(){
        console.log('sub')
    }
</script>
@endsection
