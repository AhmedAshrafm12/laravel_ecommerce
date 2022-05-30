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
          @error('name')
             <strong class="text-danger">* {{ $message }}</strong>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlInput1">slug</label>
          <input type="text" class="form-control" name="slug"  value="{{ $category->slug }}" >
          @error('slug')
           <strong class="text-danger">* {{ $message }}</strong>
        @enderror
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">description</label>
          <input type="text" class="form-control" name="description" value="{{ $category->description }}" >
          @error('description')
           <strong class="text-danger">* {{ $message }}</strong>
        @enderror
        </div>
     
        <div class="form-group">
          
          <input type="checkbox"  name="status" {{ $category->status == 1 ?'checked' :'' }} ><span class='mr-2'>  status</span>
          <input type="checkbox" name="popular" {{ $category->popular == 1 ?'checked' :'' }} > popular
        </div>
        {{-- <input type="file" name="file" id=""> --}}
   
      <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="row row-sm">
              <div class="col-sm-7 col-md-6 col-lg-4">
                <div class="custom-file">
                  <input class="custom-file-input" type="file"  name="file" id="customFile" > 
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @if ($category->file)
      <img width="100px" height="100px" src="/storage/{{ $category->file }}" alt="">
      @endif
      
        <div class="form-group">
          <input type="submit" class="form-control" >
        </div>
    </form>
   </div>

</div>


@endsection
