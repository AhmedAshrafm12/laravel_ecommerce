@extends('layouts.admin');
@section('content')

<div class="card">
    <div class="card-header"><h2>add category</h2></div>
   <div class="card-body">
    <form action="insert-cat" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="text" class="form-control" name="name" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">slug</label>
            <input type="text" class="form-control" name="slug" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">description</label>
            <input type="text" class="form-control" name="description" >
          </div>
          <div class="form-group">
            <input type="checkbox"  name="status" > status
            <input type="checkbox" name="popular" > popular
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
          <input type="file" name="file" id="">



          <div class="form-group">
            <input type="submit" class="form-control" >
          </div>
      </form>

   </div>

</div>


@endsection
