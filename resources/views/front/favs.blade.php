@extends('layouts.front')
@section('title')
{{ __('navbar.favourites') }}
@endsection

@section('content')
<div class="container mt-4" style="margin-top: 70px">
<h1>{{ __('navbar.favourites') }}</h1>

    <div class="row p-4" style="padding: 50px !important; background: #ddd">
        @php
        if(count($favs) == 0)
        echo '<h1>..</h1>';
    @endphp
        @foreach ($favs as $item)
        @php
        $count = 0;
$count  =  App\Models\cart::where("userId",Auth::id())->where('itemId',$item->product->id)->count();
$fav  =  App\Models\fav::where("userId",Auth::id())->where('itemId',$item->product->id)->count();
@endphp
        <div class="col-lg-3" style="border-radius: 15px">
            <a href="{{ url('product-details/'.$item->product->id) }}">
            <div class="card  bg-default p-3" >
                <img src="{{ asset('assets/uploads/products/'.$item->product->avatar) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-text">{{ $item->name }}</h2>
                    <div class="p-2 text-dark"><span style="display: inline-block;margin-right: 30px"><strong>{{ __('products.selling_price') }}</strong> : {{ $item->product->selling_price }} </span><span style="display: inline-block; text-decoration: line-through;"><strong> {{ __('products.original_price') }}</strong> : {{ $item->product->original_price }} </span></div>
                    <div class="text-center"><a href="@if ($count > 0)
                        {{ url('cart/') }}
                        @else
                        {{ url('add-to-cart/'.$item->product->id) }}/1
                      @endif" class="m-2 fs-4"><i class="fas @if($count > 0)fa-luggage-cart text-success @else fa-cart-plus
                      @endif"></i></a><a href="{{ url('removefav/'.$item->id) }}" class="m-2 fs-4"><i class="fas fa-trash text-danger"></i></a></div>

                  </div>
                </div>
              </div>
            </a>
        </div>

        @endforeach
    </div>
    </div>
@endsection


