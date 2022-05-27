@extends('layouts.admin');
@section('content')

<div class="card">
    <div class="card-header"><h2>add category</h2></div>
   <div class="card-body">
    <form action="insert-product" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <select class="form-control" name="cat_id" id="">
                @foreach ($cats as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>

               @endforeach
               </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="text" class="form-control" name="name" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">small_description</label>
            <input type="text" class="form-control" name="small_description" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">description</label>
            <input type="text" class="form-control" name="description" >
          </div>
          <div class="form-group">
            <input type="checkbox"  name="status" > status
            <input type="checkbox" name="popular" > trending
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">original_price</label>
            <input type="number" class="form-control" name="original_price" >
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">selling_price	</label>
            <input type="number" class="form-control" name="selling_price" >
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">tax	</label>
            <input type="number" class="form-control" name="tax" >
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">qty</label>
            <input type="text" class="form-control" name="qty" >
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">meta_descrip</label>
            <input type="text" class="form-control" name="meta_descrip" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">meta_title</label>
            <input type="text" class="form-control" name="meta_title" >
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">meta_keywords</label>
            <input type="text" class="form-control" name="meta_keywords" >
          </div>
          <input type="file" name="avatar" id="">



          <div class="form-group">
            <input type="submit" class="form-control" >
          </div>
      </form>

   </div>

</div>


@endsection
