@extends('App')

@section('title','sign-in')

@section('contents')
<form action="/sign-in" method="post">
  @csrf
  <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-5">Sign in</h3>

              <div class="form-outline mb-4">
                <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-lg">
                <label class="form-label" for="typeEmailX-2">Email</label>
              </div>

              <div class="form-outline mb-4">
                <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg">
                <label class="form-label" for="typePasswordX-2">Password</label>
              </div>

              <div class="forget-password">
                <a href="/password-reset-request">
                  パスワードを忘れた方はこちら
                </a>
              </div>

              <button class="btn btn-primary btn-lg btn-block" type="submit">サインイン</button>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>

@endsection