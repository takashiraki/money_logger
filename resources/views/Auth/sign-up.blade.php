@extends('App')

@section('title','sign-up');

@section('contents')
<form action="/sign-up" method="post">
  @csrf
  <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-5">Sign up</h3>

              <div class="form-outline mb-4">
                <input type="text" name="name" id="typeEmailX-2" class="form-control form-control-lg">
                <label class="form-label" for="typeEmailX-2">name</label>
              </div>

              <div class="form-outline mb-4">
                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg">
                <label class="form-label" for="typeEmailX-2">Email</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg">
                <label class="form-label" for="typePasswordX-2">Password</label>
              </div>

              <button class="btn btn-primary btn-lg btn-block" type="submit">登録</button>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
@endsection