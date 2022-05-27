@extends('layouts.front')
@section('title')
welcome to your shop
@endsection



@section('content')
<div class="container mt-3">
    <div class="parent p-1" style="background: #ddd;box-shadow: 10px 10px 9px #ddc;">
        @if($errors->any())
        <div class="alert alert-success"> {{ $errors->first() }}</div>
        @endif
        @isset($session['status'])
            <h1>{{ $session['status'] }}</h1>
        @endisset
  <div class="p-3" style="background: yellow">cellecton/category</div>

  <div class="row">

            <div class="col-md-4">
               <div class="p-4"> <img src="{{ asset('assets/uploads/products/'.$product->avatar) }}" alt="" width="100%" height="250px">
            </div></div>
           <div class="col-md-8">
                <div class="p-3">
              <h1>{{ $product->name }}</h1>
        <hr>
              <div class="p-2"><span style="display: inline-block;margin-right: 30px"><strong>{{ __('products.selling_price') }}</strong> : {{ $product->selling_price }} </span><span style="display: inline-block; text-decoration: line-through;"><strong> {{ __('products.original_price') }}</strong> : {{ $product->original_price }} </span>></div>
              <p class="p-2" style="max-width: 400px;">{{ $product->description }}</p>
<hr>

                   <span class="
                   @if ($product->qty > 0)
                   bg-success
                @else
                bg-danger
                @endif
                   p-2 mb-2 text-light"  style="border-radius: 15px; display: inline-block;">
                       @if ($product->qty > 0)
                       {{ __('products.instock') }}  {{ $product->qty }}
                       @else
                       out of the stock
                       @endif
                   </span >
                   <div class="form-group">
                    @if ($product->qty > 0)
                       <input type="number" placeholder="number" value="{{ $product->qty  }}" max="{{ $product->qty  }}" min="1" name="" id="count" class="form-control">
                   @endif
                    </div>
                    <input class="prod-id" type="hidden" value="{{ $product->id }}">
                   <div class="mt-3 p-2" >
                    @if ($product->qty > 0)
                    <button class="btn-danger p-2 add-to-cart" style="border-radius: 10px">{{ __('products.addTocart') }}</button>
                    @else
                    <p  class="text-center fs-5 bg-success text-light p-2 rounded">wait for it soon</p >
                    @endif
                                       </div>

</div>


           </div>
                  </div>

</div></div>
    </div>

</div>
@endsection



@section('scripts')

<script>
$('.add-to-cart').click(function(){
    window.location.href="{{ url('add-to-cart/'.$product->id) }}/"+$('#count').val();
})


</script>

@endsection

