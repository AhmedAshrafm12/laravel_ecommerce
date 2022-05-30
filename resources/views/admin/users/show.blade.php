@extends('layouts.admin')
@section('title')
order view
@endsection

@section('content')
 <div class="container">
    <div class="panel panel-success mt-4 text-light">
        <div class="panel-heading bg-primary p-3"><h2 style="display: inline-block">order details</h2> <a class="btn btn-success pull-right" href="{{ url('users') }}">back</a></div>
        <div class="panel-body">
    <form action="{{ url('updateUser/'.$user->id) }}" method="POST">
 <div class="row p-4 mt-3" style="background: rgb(241 238 238)">
@csrf
        <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="fi">role:</label>
                <input type="text" class="form-control" id="email" value="{{$user->role_as == 1 ? 'admin' :'user' }}" placeholder="Enter email" name="firstName">
              </div>

        <div class="form-group col-md-6 mb-3">
            <label for="fi">firstName:</label>
            <input type="text" class="form-control" id="email" value="{{$user->firstName }}" placeholder="Enter email" name="firstName">
          </div>
          <div class="form-group col-md-6 mb-3">
            <label for="email">lastName:</label>
            <input type="text" class="form-control" id="email"   value="{{$user->lastName }}" placeholder="Enter email" name="lastName">
          </div>
          <div class="form-group col-md-6 mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" value="{{$user->email }}" placeholder="Enter email" name="email">
          </div>
          <div class="form-group col-md-6 mb-3">
            <label for="email">country:</label>
            <input type="text" class="form-control" id="email" value="{{$user->country }}"   placeholder="Enter email" name="country">
          </div>
          <div class="form-group col-md-6 mb-3">
            <label for="city">city:</label>
            <input type="text" class="form-control" id="email" value="{{$user->city }}" placeholder="Enter email" name="city">
          </div>
          <div class="form-group col-md-6 mb-3">
            <label for="email">address:</label>
            <input type="text" class="form-control" id="email" value="{{$user->address }}" placeholder="Enter email" name="address">
          </div>

          <div class="form-group col-md-6 mb-3">
            <label for="email">mobile:</label>
            <input type="text" class="form-control" id="email" value="{{$user->mobile }}" placeholder="Enter email" name="mobile">
          </div>
        </div>

    </div>
      </form>
    </div>






 </div>


 </div>


@endsection

