@extends('layouts.admin');
@section('title')
my orders
@endsection
@section('content')
<div class="container">



  <table class="table table-striped mt-3">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">trakcking_number</th>
          <th scope="col">price</th>
          <th scope="col">status</th>
          <th scope="col">action</th>
          <a href="{{ url('ordersHistory') }}" class="btn btn-success">orders history</a href="{{ url('ordersHistory', []) }}">
        </tr>
      </thead>
    <tbody>
        @foreach ($orders as $order )
        <tr>
            <th scope="row">1</th>
            <td># {{ $order->tracking_number }}</td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->status == 0 ? 'pending' : 'compeleted' }}</td>
            <td><a class="btn btn-info" href="/order/{{ $order->id }}">view</a></td>
          </tr>
        @endforeach

    </tbody>
  </table>
</div>

<script>
    @if($errors->any())
  window.alert("{{ $errors->first() }}")
    @endif
 </script>

@endsection
