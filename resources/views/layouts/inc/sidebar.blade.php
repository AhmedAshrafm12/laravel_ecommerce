<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
        my shop
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}  ">
          <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item  {{ Request::is('category') ? 'active' : '' }}  ">
          <a class="nav-link" href="{{ url('category') }}">
            <i class="material-icons">list</i>
            <p>categories</p>
          </a>
        </li>
        <li class="nav-item   {{ Request::is('category/create') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ url('category/create') }}">
              <i class="material-icons">add</i>
              <p>add-category</p>
            </a>
          </li>
          <li class="nav-item  {{ Request::is('product') ? 'active' : '' }}  ">
            <a class="nav-link" href="{{ url('product') }}">
              <i class="material-icons">sell</i>
              <p>products</p>
            </a>
          </li>
          <li class="nav-item   {{ Request::is('product/create') ? 'active' : '' }} ">
              <a class="nav-link" href="{{ url('product/create') }}">
                <i class="material-icons">add</i>
                <p>add-product</p>
              </a>
            </li>

            <li class="nav-item   {{ Request::is('order') ? 'active' : '' }} {{ Request::is('ordersHistory') ? 'active' : '' }}  @isset($order)
            @if (Request::is('order/'.$order->id))
            active
            @endif
            @endisset ">
                <a class="nav-link" href="{{ url('order') }}">
                  <i class="material-icons">money</i>
                  <p>orders</p>
                </a>
              </li>
              <li class="nav-item   {{ Request::is('user') ? 'active' : '' }}   @isset($user)
              @if (Request::is('user/'.$user->id))
              active
              @endif
              @endisset ">
                <a class="nav-link" href="{{ url('user') }}">
                  <i class="material-icons">person</i>
                  <p>users</p>
                </a>
              </li>

      </ul>
    </div>
  </div>
