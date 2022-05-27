@extends('layouts.front')
@section('title')
{{ __('cart.my_cart') }}
@endsection
<style>
    body{
        background: #ddd;
    }
</style>
@php
    $total  = 0;
@endphp
@section('content')
<div class="container mt-3 p-4 h-100" style="background: #ddd">
    <div class="row">
        <div class="col-lg-8">
<div class="cart p-4 mt-4 h-100"  style="background: #fff;">

<div class="row">
    @php if(count($cart) > 0)
 echo
"    <div class='col-lg-2'>
        <h4 style='color: #898989'>product</h4 style='color: #898989'>
    </div>
    <div class='col-lg-2'>
        <h4 style='color: #898989'>price</h4 style='color: #898989'>
    </div>
    <div class='col-lg-2'>
        <h4 style='color: #898989'>qty</h4 style='color: #898989'>
    </div>
    <div class='col-lg-2'>
        <h4 style='color: #898989'>in stock</h4 style='color: #898989'>
    </div>
    <div class='col-lg-2'>
        <h4 style='color: #898989'>total</h4 style='color: #898989'>
    </div>";
    @endphp
</div>
@php
if(count($cart) == 0)
echo '<h1>No products in your cart</h1>';
@endphp
    @foreach ($cart as $item)
   <div class="row mb-3 mt-2 p-3" >
        <div class="col-lg-2">
            <img class="img-thumbnail" src="{{ asset('assets/uploads/products/'.$item->product->avatar) }}" alt="" width="90px" height="90px">
            <h4 class="p-2">{{ $item->product->name }}</h4>
        </div>
        <div class="col-lg-2">
            <p class="p-2 lead">{{ $item->product->selling_price }}</p>
        </div>
        <div class="col-lg-2 p-2">
            <p class="p-1" style=" width: 80px"> <i style="cursor: pointer;" onclick="minus({{ $item->id }},{{ $item->count-1 }})" class="fas fa-minus" data-id="{{  $item->id }}" data-value="{{ $item->count-1 }}" ></i> <span>{{ $item->count }}</span> <i style="cursor: pointer;" onclick="minus({{ $item->id }},{{ $item->count+1 }})" class="fas fa-plus"></i></p>
        </div>
        <div class="col-lg-2 p-2">
<span class="bg-success p-2 text-light ms-4  rounded">{{ $item->product->qty }}</span>
        </div>
        <div class="col-lg-2">
            <p class="p-2 lead">{{ $item->product->selling_price * $item->count  }}</p>
        </div>
        <div class="col-lg-2">
            <a  href="{{ url('removeCart/'.$item->itemId) }}"> <i class="fas fa-lg  fa-trash-alt" style="color: red"></i></a>
        </div>

       </div>
<hr>
  @php $total +=  $item->count * $item->product->selling_price;  @endphp
    @endforeach
</div>


</div>
<div class="col-lg-4">
<div class="total mt-4 p-4 h-100" style="background: rgb(187, 178, 178)">
    <h4>{{ __('cart.total') }} : {{ $total }}</h4>
    <a href="{{ url('checkOut') }}"  class="btn btn-success">{{ __('cart.checkOut') }}</a >
</div>

</div>
</div>


</div>
@endsection

@section("scripts")
<script>
    @if($errors->any())
    alert("{{ $errors->first() }}");
    @endif
  function minus($id,$value){
  window.location.href="{{ url('update-cart/') }}/"+$id+'/'+$value ;
  }


    @if($errors->any())
  window.alert("{{ $errors->first() }}")
    @endif

</script>
@endsection
