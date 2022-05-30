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
            <th scope="col">descrption</th>
            <th scope="col">avatar</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td><img width="100px" height="100px" src="/storage/{{ $category->file }}" alt=""></td>
            <td><a href="/category/destroy/{{ $category->id}}" class="btn btn-danger">delete</a>
                <a href="{{ url('category/'.$category->id.'/edit') }}" class="btn btn-primary">edit</a></td>
            </tr>
            @endforeach

        </tbody>
      </table>
   </div>

</div>


@endsection
