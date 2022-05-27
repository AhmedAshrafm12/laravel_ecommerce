@extends('layouts.front')
@section('title')
{{ __('home.title') }}
@endsection

@section('content')
@include('layouts.inc.carousal')
@include('layouts.inc.feature')


<div class="container mt-3" id="featured">
    <div class="row p-3">
        <h2>{{ __('home.fetured') }}</h2>
    <div class="owl-carousel owl-theme">
        @foreach ($featured_prdocuts as $item)
        @php
        $count = 0;
$count  =  App\Models\cart::where("UserId",Auth::id())->where('itemId',$item->id)->count();
$favs  =  App\Models\fav::where("userId",Auth::id())->where('itemId',$item->id)->count();
@endphp
        <div class="item">
            <div class="col-md-3">
                <a href="{{ url('product-details/'.$item->id) }}">
                <div class="card" style="width: 18rem;">
                    <div class="card-body p-3">
                      <img src="{{ asset('assets/uploads/products/'.$item->avatar) }}" alt="" width="100%" height="250px">
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
                  </div></a>

                  {{--  <div class="col-lg-3">
                    <div class="card  bg-default p-3" >
                        <img src="{{ asset('assets/uploads/products/'.$item->avatar) }}"  class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">{{ $item->name }}</p>
                         <a href="#" class="btn btn-primary">{{ $item->selling_price }} </a>
                          <div class="text-center"><a href="#" class="m-2 fs-4"><i class="fas fa-cart-plus"></i></a><a href="#" class="m-2 fs-4"><i class="far fa-heart"></i></a></div>
                        </div>
                      </div>
                </div>  --}}
            </div>
            </div>
        @endforeach

    </div>

    </div>
</div>
@include('layouts.inc.footer');

@endsection

@section('scripts')
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })


    @if($errors->any())
    window.alert("{{ $errors->first() }}")
      @endif

</script>
@endsection
