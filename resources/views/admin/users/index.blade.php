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
          <th scope="col">name</th>
          <th scope="col">Email</th>
          <th scope="col">phone</th>
          <th scope="col">action</th>
        </tr>
      </thead>
    <tbody>
        @foreach ($users as $user )
        <tr>
            <th scope="row">1</th>
            <td> {{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->mobile }}</td>
            <td><a class="btn btn-info" href="/user/{{ $user->id  }}">view</a></td>
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
