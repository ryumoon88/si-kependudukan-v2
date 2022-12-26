@extends('user.layout.main')

@section('content')
    <section class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    <h2 class="fw-bold text-center mb-3">Registration</h2>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body" style="font-size: 14px;">
                                <h5 class="card-title fw-bold mb-3">Resident Data</h5>
                                <div class="d-flex flex-column mb-3">
                                    <span class="fw-bold">#</span>
                                    <span>{{ $resident->id_card_number }}</span>
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <span class="fw-bold">Name</span>
                                    <span>{{ $resident->birth->name }}</span>
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <span class="fw-bold">Gender</span>
                                    <span>{{ $resident->birth->gender }}</span>
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <span class="fw-bold">Religion</span>
                                    <span>{{ $resident->religion }}</span>
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <span class="fw-bold">Birth Date & Place</span>
                                    <span>{{ $resident->birth->birth_date->toDateString() }},
                                        {{ $resident->birth->birth_place }}</span>
                                </div>

                                <div class="d-flex flex-column mb-3 mt-2">
                                    <span class="fw-bold">Father Name</span>
                                    <span>{{ $resident->birth->father->birth->name }}</span>
                                </div>
                                <div class="d-flex flex-column mb-3 mt-2">
                                    <span class="fw-bold">Mother Name</span>
                                    <span>{{ $resident->birth->mother->birth->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="col-6" action="{{ route('user.auth.registered') }}" method="POST">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="resident_id" value="{{ $resident->id }}">
                        <input type="hidden" name="id_card_number" value="{{ $resident->id_card_number }}">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username"
                                class="form-control @error('username')
                                    is-invalid
                                @enderror"
                                id="username">
                            @error('username')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                id="email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                id="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password"
                                class="form-label @error('password_confirmation')
                                is-invalid
                            @enderror">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="confirm_password">
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
