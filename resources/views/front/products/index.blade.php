@extends('layouts.front')
@section('title')
welcome to your shop
@endsection

@section('content')
<div class="container mt-4" style="margin-top: 70px">
    <h1>{{ $categorie->name }}</h1>
    <hr>

    <div class="row p-4" style="padding: 50px !important; background: #ddd">
        @php
        if(count($products) == 0)
        echo '<h1>No products here</h1>';
    @endphp
        @foreach ($products as $item)
        @php
        $count = 0;
$count  =  App\Models\cart::where("UserId",Auth::id())->where('itemId',$item->id)->count();
$favs  =  App\Models\fav::where("userId",Auth::id())->where('itemId',$item->id)->count();

@endphp
        <div class="col-lg-3" style="border-radius: 15px">
            <a href="{{ url('product-details/'.$item->id) }}">
            <div class="card  bg-default p-3" >
                <img src="{{ asset('assets/uploads/products/'.$item->avatar) }}" class="card-img-top" alt="..." height="200px">
                <div class="card-body">
                    <h2 class="card-text">{{ $item->name }}</h2>
                    <div class="p-2 text-dark"><span style="display: inline-block;margin-right: 30px"><strong>{{ __('products.selling_price') }}</strong> : {{ $item->selling_price }} </span><span style="display: inline-block; text-decoration: line-through;"><strong> {{ __('products.original_price') }}</strong> : {{ $item->original_price }} </span></div>
                    <div class="text-center">
                        @if($item->qty  > 0 )
                        <a href="@if ($count > 0)
                        {{ url('cart/') }}
                        @else
                        {{ url('add-to-cart/'.$item->id) }}/1
                      @endif" class="m-2 fs-4"><i class="fas @if($count > 0)fa-luggage-cart text-success @else fa-cart-plus
                      @endif"></i></a>
                      @else
                      <a class="text-danger"><i class="fas fa-lg fa-times-circle"></i></a>
                      @endif
                      <a href="@if ($favs > 0)
                        {{ url('favs/') }}
                        @else
                        {{ url('add-to-fav/'.$item->id) }}
                      @endif" class="m-2 fs-4"><i class=" @if($favs > 0)fas fa-heart text-danger @else far fa-heart
                        @endif"></i></a></div>
                </div>
              </div>
            </a>
        </div>

        @endforeach
    </div>
    </div>
@endsection


