@extends('layouts.front')
@section('title')
{{ __('categories.title') }}
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <h1>{{ __('categories.All') }}</h1>

    <div class="owl-carousel owl-theme">
        @foreach ($featured_cats as $item)
        <div class="item">
            <div class="col-md-3">
               <a href="{{ url('view-products/'.$item->slug) }}">
                <div class="card" style="width: 18rem;">
                    <div class="card-body p-3">
                      <img src="{{ asset('assets/uploads/categories/'.$item->file) }}" alt="" width="100%" height="250px">
                      <h2 class="card-text">{{ $item->name }}</h2>
                      <p>{{ $item->description }}</p>
                    </div>
                  </div>

               </a>
            </div>
        </div>
        @endforeach
    </div></div>



    <div class="row mt-4">
        <h1>{{ __('categories.trending') }}</h1>
        @foreach ($trending_cats as $item)
            <div class="col-md-3">
               <a href="{{ url('view-products/'.$item->slug) }}">
                <div class="card" style="width: 18rem;">
                    <div class="card-body p-3">
                      <img src="{{ asset('assets/uploads/categories/'.$item->file) }}" alt="" width="100%" height="250px">
                      <h2 class="card-text">{{ $item->name }}</h2>
                      <p>{{ $item->description }}</p>
                    </div>
                  </div>
               </a>
            </div>
        @endforeach
    </div>

    </div>
</div>
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
                items:3
            }
        }
    })
</script>

@endsection

