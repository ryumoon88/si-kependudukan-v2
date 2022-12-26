@extends('user.layout.main')

@push('css')
    <style>
        input[type="number"] {
            -moz-appearance: textfield;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endpush

@section('content')
    <section id="registration" class="vh-100 container-fluid">
        <div class="row mt-3 justify-content-center">
            <div class="col-12 text-center mb-3">
                <span class="fw-bold fs-2">Registration</span>
            </div>
            <form class="col-12 col-md-6" action="{{ route('user.auth.validate') }}" method="POST">
                @if (session('alert') != null)
                    <div class="alert alert-{{ session('alert')['type'] }} alert-dismissible fade show mt-1" role="alert">
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
                        id="mother_name" placeholder="Tanggal Lahir">
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
    </section>
@endsection
