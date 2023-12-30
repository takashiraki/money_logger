@extends('App')

@section('title', 'sign-in')

@section('contents')
    <form action="/password-reset/apdate" method="post">
        @csrf
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="h-100 container py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <p>パスワードを入力してください</p>

                                <div class="form-outline mb-4">
                                    <input name="password" type="password" id="typeEmailX-2"
                                        class="form-control form-control-lg">
                                    <label class="form-label" for="typeEmailX-2">Pssword</label>
                                </div>

                                <input type="hidden" name="user_id" value="{{ $user_id }}">

                                <button class="btn btn-primary btn-lg btn-block" type="submit">パスワードをリセット</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

@endsection
