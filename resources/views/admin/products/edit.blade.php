@extends('layouts.admin');
@section('content')

<div class="card">
    <div class="card-header"><h2>add category</h2></div>
   <div class="card-body">
    <form action="{{ url('product/'. $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <select class="form-control" name="cat_id" id="">
                  <option value="{{ $product->cat_id }}">{{ $product->category->name }}</option>
               </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="text" class="form-control" name="name"  value="{{ $product->name }}" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">description</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}" required >
          </div>
          <div class="form-group">
            <input type="checkbox"  name="status" {{ $product->status == 1 ?'checked' :'' }} > <span class="mr-2" >status</span>
            <input type="checkbox" name="popular" {{ $product->trending == 1 ?'checked' :'' }} > trending
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">original_price</label>
            <input type="number" class="form-control" name="original_price" value="{{ $product->original_price }}" required  >
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">selling_price	</label>
            <input type="number" class="form-control" name="selling_price"  value="{{ $product->selling_price }}" required >
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">tax	</label>
            <input type="number" class="form-control" name="tax"   value="{{ $product->tax }}" required>
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">qty</label>
            <input type="text" class="form-control" name="qty" value="{{ $product->qty }}" required >
          </div>

          <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="row row-sm">
                  <div class="col-sm-7 col-md-6 col-lg-4">
                    <div class="custom-file">
                      <input class="custom-file-input" type="file"  name="avatar" id="customFile" > 
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <img width="100px" height="100px" src="/storage/{{ $product->avatar }} " alt="">



          <div class="form-group">
            <input type="submit" class="form-control" >
          </div>
      </form>

   </div>

</div>


@endsection
