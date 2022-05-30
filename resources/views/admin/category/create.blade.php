@extends('layouts.admin');
@section('content')
<div class="card">
    <div class="card-header"><h2>add category</h2></div>
   <div class="card-body">
    <form action="/category" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="text" class="form-control" name="name" >
            @error('name')
               <strong class="text-danger">* {{ $message }}</strong>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlInput1">slug</label>
            <input type="text" class="form-control" name="slug" >
            @error('slug')
             <strong class="text-danger">* {{ $message }}</strong>
          @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">description</label>
            <input type="text" class="form-control" name="description" >
            @error('description')
             <strong class="text-danger">* {{ $message }}</strong>
          @enderror
          </div>
       
          <div class="form-group">
            
            <input type="checkbox"  name="status" ><span class='mr-2'>  status</span>
            <input type="checkbox" name="popular" > popular
          </div>
          {{-- <input type="file" name="file" id=""> --}}
          {{-- @error('file')
           <strong class="text-danger">* {{ $message }}</strong>
        @enderror --}}
        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row row-sm">
                <div class="col-sm-7 col-md-6 col-lg-4">
                  <div class="custom-file">
                    <input class="custom-file-input" id="customFile" type="file" name="file"> 
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
                @error('file')
                <strong class="text-danger">* {{ $message }}</strong>
             @enderror
              </div>
            </div>
          </div>
        </div>
        
          <div class="form-group">
            <input type="submit" class="form-control" >
          </div>
      </form>

      
   
   </div>

</div>


@endsection
