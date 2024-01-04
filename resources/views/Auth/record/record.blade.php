@extends('App')

@section('title', 'home')

@section('contents')
@endsection

<div class="d-flex align-items-start bg-body-tertiary mb-3" style="height: 100vh;">
    <div class="col border-end h-100">
        <div class="d-flex flex-column bg-light flex-shrink-0 p-3" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto link-dark text-decoration-none mb-3">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Money logger</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Income
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Customers
                    </a>
                </li>
            </ul>
            <hr>


        </div>
    </div>
    <div class="col border-end h-100">
        <div class="col border-end h-100">
            <form method="POST" action="/category/store">
                @csrf
                <!-- Email input -->


                <!-- Password input -->
                <div data-mdb-input-init="" class="form-outline mb-4">
                    <input name="category_name" type="text" id="form1Example2" class="form-control">
                    <label class="form-label" for="form1Example2">category name</label>
                </div>

                <!-- 2 column grid layout for inline styling -->


                <!-- Submit button -->
                <button data-mdb-ripple-init="" type="submit" class="btn btn-primary btn-block">create</button>
            </form>
        </div>
    </div>
</div>
