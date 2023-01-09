@extends('user.layout.main')
@push('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }

        .content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            color: #fff;
        }

        h1 {
            font-size: 70px;
            margin-bottom: 10px;
            text-shadow: 0 10px 50px #000;
        }

        h2 {
            font-size: 30px;
            text-shadow: 0 10px 50px #000;
        }

        header {
            z-index: 2;
            background-color: #000
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
@endpush
@section('content')
    <section class="vh-100 pt-0">
        <div class="container h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="{{ route('user.auth.authenticate') }}" class="text-center" method="post">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="id_card_number" id="form1Example13"
                                class="form-control form-control-lg
                                @error('id_card_number')
                            is-invalid
                        @enderror"
                                name="id_card_number" placeholder="NIK" autofocus />
                            {{-- <label class="form-label" for="form1Example13">Email address</label> --}}
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="form1Example23"
                                class="form-control form-control-lg @error('password')
                            is-invalid
                        @enderror"
                                name="password" placeholder="Password" />
                            {{-- <label class="form-label" for="form1Example23">Password</label> --}}
                        </div>
                        @if (session()->has('error'))
                            <span class="text-danger">{{ session('error') }}</span>
                        @endif

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <p>Not a member? <a href="/register">Register</a></p>
                            <button type="submit" class="btn btn-sm btn-primary">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
