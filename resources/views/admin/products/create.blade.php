@extends('layouts.admin');
@section('content')

<div class="card">
    <div class="card-header"><h2>add category</h2></div>
   <div class="card-body">
    <form action="/product" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <select class="form-control" name="cat_id" id="">
                @foreach ($categorie as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>

               @endforeach
               </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="text" class="form-control" name="name" required >
            @error('name')
            <strong class="text-danger">* {{ $message }}</strong>
         @enderror
          </div>
      
          <div class="form-group">
            <label for="exampleFormControlInput1">description</label>
            <input type="text" class="form-control" name="description" required >
            @error('description')
            <strong class="text-danger">* {{ $message }}</strong>
         @enderror
          </div>
          <div class="form-group">
            <input type="checkbox"  name="status" id='status'><label for="status"> <span class='mr-2'>status</span></label>
            <input type="checkbox" name="trending" id='trending' > <label for="trending"> <span class='mr-2'>trending</span></label>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">original_price</label>
            <input type="number" class="form-control" name="original_price" required>
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">selling_price	</label>
            <input type="number" class="form-control" name="selling_price"  required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">tax	</label>
            <input type="number" class="form-control" name="tax"  required>
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">qty</label>
            <input type="text" class="form-control" name="qty" required >
          </div>

             <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="row row-sm">
                  <div class="col-sm-7 col-md-6 col-lg-4">
                    <div class="custom-file">
                      <input class="custom-file-input" id="customFile" name="avatar" type="file"> 
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  @error('avatar')
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
