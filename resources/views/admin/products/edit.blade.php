@extends('layouts.admin');
@section('content')

<div class="card">
    <div class="card-header"><h2>add category</h2></div>
   <div class="card-body">
    <form action="{{ url('update-product/'. $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <select class="form-control" name="cat_id" id="">
                  <option value="{{ $product->cat_id }}">{{ $product->category->name }}</option>
               </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="text" class="form-control" name="name"  value="{{ $product->name }}">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">small_description</label>
            <input type="text" class="form-control" name="small_description" value="{{ $product->small_description }}" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">description</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}" >
          </div>
          <div class="form-group">
            <input type="checkbox"  name="status" > status
            <input type="checkbox" name="popular" > trending
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">original_price</label>
            <input type="number" class="form-control" name="original_price" value="{{ $product->original_price }}"  >
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">selling_price	</label>
            <input type="number" class="form-control" name="selling_price"  value="{{ $product->selling_price }}" >
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">tax	</label>
            <input type="number" class="form-control" name="tax"   value="{{ $product->tax }}">
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">qty</label>
            <input type="text" class="form-control" name="qty" value="{{ $product->qty }}" >
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">meta_descrip</label>
            <input type="text" class="form-control" name="meta_descrip" value="{{ $product->meta_description }}" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">meta_title</label>
            <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title}}" >
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">meta_keywords</label>
            <input type="text" class="form-control" name="meta_keywords" value="{{ $product->meta_title}}" >
          </div>
          @if ($product->avatar)
          <img width="100px" height="100px" src="{{  asset('assets/uploads/products/'.$product->avatar) }} " alt="">
          @endif

          <input type="file" name="avatar" id="">



          <div class="form-group">
            <input type="submit" class="form-control" >
          </div>
      </form>

   </div>

</div>


@endsection
