@extends('layouts.admin');
@section('content')

<div class="card">
    <div class="card-header"><h2>{{ $category->name }}</h2></div>
   <div class="card-body">
    <form action="{{ url('category/'. $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $category->slug }}" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">description</label>
            <input type="text" class="form-control" name="description" value="{{ $category->description }}" >
          </div>
          <div class="form-group">
            <input type="checkbox"  name="status"  {{ $category->status == 1 ?'checked' :'' }}> status
            <input type="checkbox" name="popular" {{ $category->popular == 1 ?'checked' :'' }} > popular
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">meta_descrip</label>
            <input type="text" class="form-control" name="meta_descrip" value="{{ $category->meta_descrip }}" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">meta_title</label>
            <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}" >
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">meta_keywords</label>
            <input type="text" class="form-control" name="meta_keywords" value="{{ $category->meta_keywords }}" >
          </div>
          <input type="file" name="file" id="">

   @if ($category->file)
   <img width="100px" height="100px" src="{{  asset('assets/uploads/categories/'.$category->file) }} " alt="">
   @endif

          <div class="form-group">
            <input type="submit" class="form-control" >
          </div>
      </form>

   </div>

</div>


@endsection
