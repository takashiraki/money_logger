@extends('App')

@section('title', 'password-reset-complete');

@section('contents')
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="h-100 container py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">完了しました。</h3>

                                <a href="/sign-in">サインインページへ</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection