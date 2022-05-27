@extends('layouts.front')
@section('title')
{{ __('checkOut.title') }}
@endsection

@section('content')
 <div class="container">

    <form id="form" action="{{ url('placeOrder') }}"  method="POST">
 <div class="row p-4 mt-3" style="background: rgb(241 238 238)">
@csrf
        <div class="col-lg-6">
       <h2>{{ __('checkOut.basic_details') }}</h2>
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
            <input type="hidden" name="payment_id" id="payment_id">
            <input type="hidden" name="payment_mood" id="payment_mood">
          </div>
        </div>

        <div class="col-lg-6">
            <h2>{{ __('checkOut.order_details') }}</h2>
            <table class="table">
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
              @foreach ($cart as $item )
              <tr>
                 <td>{{ $item->product->name }}</td>
                 <td>{{ $item->count }}</td>
                 <td>{{ $item->product->selling_price * $item->count  }}</td>
               </tr>
               @php $total +=  $item->count * $item->product->selling_price;  @endphp
              @endforeach
             </tbody>
           </table>
           <h4>{{ __('cart.total') }} : {{ $total }}</h4>
<input type="hidden" value="{{ $total }}" name="total">

            @isset($cart)
            <button style='display: block' type='submit' class='btn btn-primary btn-block'>Submit</button>;
            <div id="paypal-button-container"></div>
            @endisset



        </div>

    </div>
      </form>






 </div>


 </div>


@endsection

@section('scripts')
<script
src="https://www.paypal.com/sdk/js?client-id=AZxZ63xLipYU9jLGtiZD6RguzZ0RgFzQaurMliThlwqruImo0MFiYGyNO221vsjhGEOyN6TLsHh-zzuJ"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
</script>

  <script>

    paypal.Buttons({
      createOrder: function(data, actions) {
        $(payment_mood).val("paypal");
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '{{ $total }}'
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.
          let xhr=new XMLHttpRequest();
          xhr.open("POST","/placeOrder",true);
          xhr.onload=()=>{
              if(xhr.readyState==XMLHttpRequest.DONE){

                      let data=xhr.response;
                      {{--  console.log(data)  --}}

              }
          }
          let formData = new FormData(form);
          formData.append( 'payment_id', '1' );
          formData.append( 'payment_mood', 'paypal' );
           xhr.send(formData);

        });
      }
    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
  </script>

    <script>
        @if($errors->any())
      window.alert("{{ $errors->first() }}")
        @endif

    </script>

  @endsection
