
<div style="text-decoration: underline; margin-top: 60px !important" class="mt-2 w-100% bg-danger p-4 fs-3 text-center text-light" ><i style="color: white;" class="far fa-heart"></i> {{ __('home.welcome') }} <i style="color: white;" class="far fa-heart"></i></div>
<section class="footer text-light">
<div class="container">
<div class="row">
   <div class="col-lg-6">
       <h3>{{ __('home.our links') }}</h3>
   <ul class="list-unstyled">
  <li><i class="fab fa-facebook-square"></i></li>
  <li><i class="fas fa-envelope"></i></li>
  <li><i class="fab fa-twitter-square"></i></li>
   </ul>

   </div>
   <div class="col-lg-6">
    <h2>{{ __('home.contact us ') }}</h2>
    <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">{{ __('checkOut.email') }}</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <textarea style="width: 100%; height: 100px;">
              </textarea>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>

</div>
</div>

</section>
