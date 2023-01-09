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
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Phone image">
                </div>
                <form class="col-12 col-md-6" action="{{ route('user.auth.validate') }}" method="POST">
                    <div class="mb-3">
                        <h3 class="fw-bold text-center">Sign Up</h3>
                    </div>
                    @if (session('alert') != null)
                        <div class="alert alert-{{ session('alert')['type'] }} alert-dismissible fade show mt-1"
                            role="alert">
                            <i
                                class="bi {{ isset(session('alert')['class']) ? session('alert')['class'] : 'bi-check-circle' }} me-1"></i>
                            {{ session('alert')['message'] }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="id_card_number" class="form-label">NIK</label>
                        <input type="number" name="id_card_number"
                            class="form-control @error('id_card_number')
                            is-invalid
                        @enderror"
                            id="id_card_number" placeholder="NIK">
                        @error('id_card_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="birth_date"
                            class="form-control @error('birth_date')
                        is-invalid
                    @enderror"
                            id="birth_date" placeholder="Tanggal Lahir">
                        @error('birth_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mother_name" class="form-label">Nama Ibu</label>
                        <input type="text" name="mother_name"
                            class="form-control @error('mother_name')
                        is-invalid
                    @enderror"
                            id="mother_name" placeholder="Nama Ibu">
                        @error('mother_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mother_birth_date" class="form-label">Tanggal Lahir Ibu</label>
                        <input type="date" name="mother_birth_date"
                            class="form-control @error('mother_birth_date')
                        is-invalid
                    @enderror"
                            id="mother_birth_date" placeholder="Tanggal Lahir">
                        @error('mother_birth_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-sm btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
