@extends('layouts.admin');
@section('content')

<div class="card">
    <div class="card-header">
    <h1>category page</h1>

    </div>
   <div class="card-body" >
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">category Name</th>
            <th scope="col">selling price</th>
            <th scope="col">original price</th>
            <th scope="col">descrption</th>
            <th scope="col">avatar</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->selling_price	 }}</td>
            <td>{{ $product->original_price	 }}</td>
            <td>{{ $product->description }}</td>
            <td><img width="100px" height="100px" src="/storage/{{  $product->avatar }} " alt=""></td>
            <td><a href="/product/destroy/{{ $product->id}}" class="btn btn-danger">delete</a>
                <a href="{{ url('product/'.$product->id.'/edit') }}" class="btn btn-primary">edit</a></td>
            </tr>
            @endforeach

        </tbody>
      </table>
   </div>

</div>


@endsection
