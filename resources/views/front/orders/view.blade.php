@extends('layouts.front')
@section('title')
order view
@endsection

@section('content')
 <div class="container">
    <div class="panel panel-success mt-4 text-light">
        <div class="panel-heading bg-primary p-3"><h2 style="display: inline-block">{{ __('checkOut.order_details') }}</h2> <a class="btn btn-success pull-right" href="{{ url('my-orders') }}">{{ __('checkOut.back') }}</a></div>
        <div class="panel-body">
    <form action="{{ url('placeOrder') }}" method="POST" class="text-dark">
 <div class="row p-4 mt-3" style="background: rgb(241 238 238)">
@csrf
        <div class="col-lg-6">


        <div class="form-group">
            <label for="fi">{{ __('checkOut.firstName:') }}:</label>
            <input type="text" class="form-control" id="email" value="{{ Auth::user()['firstName'] }}" placeholder="Enter email" name="firstName">
          </div>
          <div class="form-group">
            <label for="email">{{ __('checkOut.lastName') }}:</label>
            <input type="text" class="form-control" id="email"   value="{{ Auth::user()['lastName'] }}" placeholder="Enter email" name="lastName">
          </div>
          <div class="form-group">
            <label for="email">{{ __('checkOut.email') }}:</label>
            <input type="email" class="form-control" id="email" value="{{ Auth::user()['email'] }}" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
            <label for="email">{{ __('checkOut.country') }}:</label>
            <input type="text" class="form-control" id="email" value="{{ Auth::user()['country'] }}"   placeholder="Enter email" name="country">
          </div>
          <div class="form-group">
            <label for="city">{{ __('checkOut.city') }}:</label>
            <input type="text" class="form-control" id="email" value="{{ Auth::user()['city'] }}" placeholder="Enter email" name="city">
          </div>
          <div class="form-group">
            <label for="email">{{ __('checkOut.address') }}:</label>
            <input type="text" class="form-control" id="email" value="{{ Auth::user()['address'] }}" placeholder="Enter email" name="address">
          </div>

          <div class="form-group">
            <label for="email">{{ __('checkOut.mobile') }}:</label>
            <input type="text" class="form-control" id="email" value="{{ Auth::user()['mobile'] }}" placeholder="Enter email" name="mobile">
          </div>
        </div>

        <div class="col-lg-6">
            <h2>{{ __('checkOut.order_details') }}</h2>
            <table class="table table-striped-bordered  ">
             <thead>
               <tr>
                 <th>{{ __('checkOut.NAME') }}</th>
                 <th>{{ __('checkOut.qty') }}</th>
                 <th>{{ __('checkOut.price') }}</th>
               </tr>
             </thead>
             <tbody>
                @php
                $total  = 0;
            @endphp
              @foreach ($orderitems as $item )
              <tr>
                 <td>{{ $item->product->name }}</td>
                 <td>{{ $item->count }}</td>
                 <td>{{ $item->product->selling_price * $item->count  }}</td>
                 <td><img src="{{ asset('assets/uploads/products/'.$item->product->avatar) }}" alt="" width="50px" height="50px"> </td>
               </tr>
               @php $total +=  $item->count * $item->product->selling_price;  @endphp
              @endforeach
             </tbody>
           </table>
           <h4  class='text-dark'>{{ __('cart.total') }} : <strong>{{ $total }}</strong></h4>
<input type="hidden" value="{{ $total }}" name="total">

            @isset($cart)
            <button style='display: block' type='submit' class='btn btn-primary btn-block'>Submit</button>;
            @endisset



        </div>

    </div>
      </form>
    </div>






 </div>


 </div>


@endsection

