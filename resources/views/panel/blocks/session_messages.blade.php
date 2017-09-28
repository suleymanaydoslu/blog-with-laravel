@if(Session::has('success'))
  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    </div>
  </div>
@endif

@if(Session::has('error'))
  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger">
        {{ Session::get('error') }}
      </div>
    </div>
  </div>
@endif

