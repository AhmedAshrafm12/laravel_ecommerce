{{--  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" aria-current="page" href="{{ url('/') }}"">{{ __('navbar.home') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse pull-right" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('AllCategories') }}">{{ __('navbar.categories') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('cart') }}">{{ __('navbar.cart') }}</a>
            </li>

          </ul>
      </div>


      <ul class="navbar-nav">
          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/my-orders') }}"">{{ Auth::user()['name'] }}</a></li>
          </li class="nav-item">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                 {{ __('navbar.logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ url('/login') }}"">{{ __('navbar.login') }}</a></li>
        <a class="nav-link active" aria-current="page" href="{{ url('/register') }}"">{{ __('navbar.signUp') }}</a></li>
          @endif

          <li class="nav-item m-2"><a href="{{  url(App::getLocale()== 'ar' ? 'change/en' : 'change/ar') }}" ><i class="fas fa-lg fa-globe"></i> {{ App::getLocale()== 'ar' ? 'English' : 'عربي' }}</a ></li>
          </ul>



    </div>
  </nav>
  --}}




  <nav class="navbar fixed-top navbar-expand-sm bg-light navbar-light">
    <h2 class="nav-link active"><a href="{{ url('/') }}">{{ __('navbar.home') }}</a></h2>

    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{ __('categories.title') }}</a>
          <ul class="dropdown-menu p-2">
              @foreach (App\Models\categorie::all() as $cat )
              <li><a class="dropdown-item" href="{{ url('/view-products/'.$cat->slug) }}">{{ $cat->name }}</a></li>
              <hr>
              @endforeach
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('cart') }}"><i class="fas fa-shopping-cart fa-lg"></i><span class="text-primary">(@php
        echo  App\Models\cart::where("UserId",Auth::id())->count();
        @endphp)</span></a>
         </li>
      </ul>
      <ul class="list-unstyled navList">
        @if (Auth::check())
        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-current="page" href="#">{{ Auth::user()['name'] }}</a>
           <ul class="dropdown-menu p-2">
             <li><a class="dropdown-item" href="{{ url('my-orders') }}" >{{__('navbar.my profile')}}</a></li>
             <li><a class="dropdown-item" href="{{ url('favs') }}" >{{ __('navbar.favourites') }}</a></li>
            </li class="nav-item">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
             {{ __('navbar.logout') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
  </li>

</li>
</ul>
    @else
    <li class="nav-item">
        <a class="nav-link"  href="{{ url('/login') }}"" >{{ __('navbar.login') }}</a>
     </li>
    <li class="nav-item">
        <a class="nav-link"  href="{{ url('/register') }}"" >{{ __('navbar.signUp') }}</a>
     </li>

        @endif
        <li class="nav-item m-2"><a href="{{  url(App::getLocale()== 'ar' ? 'change/en' : 'change/ar') }}" ><i class="fas fa-lg fa-globe"></i> {{ App::getLocale()== 'ar' ? 'English' : 'عربي' }}</a ></li>

        </ul>
    </div>
  </nav>
