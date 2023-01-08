@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    {{-- @dd(session('error')) --}}
                    @if (session('error'))
                        @dd(session('error'))
                    @endif
                    <form class="card-body" method="POST"
                        action="{{ route('admin.resident.birth.update', ['resident_birth' => $residentBirth->ulid]) }}">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                New Service
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="mb-3 data-field d-flex flex-column" id="father_select">
                                <label for="basic-url" class="form-label fw-bold">Father</label>
                                <div class="input-group">
                                    <input type="text" value="{{ $residentBirth->father?->birth?->name }}"
                                        class="form-control form-control-sm disabled" disabled id="basic-url">
                                </div>
                            </div>

                            <div class="mb-3 data-field d-flex flex-column" id="father_select">
                                <label for="basic-url" class="form-label fw-bold">Mother</label>
                                <div class="input-group">
                                    <input type="text" value="{{ $residentBirth->mother?->birth?->name }}"
                                        class="form-control form-control-sm disabled" disabled id="basic-url">
                                </div>
                            </div>

                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="basic-url" class="form-label fw-bold">Name</label>
                                <div class="input-group">
                                    <input type="text" name="name" value="{{ old('name', $residentBirth->name) }}"
                                        class="form-control form-control-sm @error('name')
                                        is-invalid
                                    @enderror"
                                        id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="gender" class="form-label fw-bold">Gender</label>
                                <select
                                    class="selectpicker bg-white form-control form-control-sm btn-white border @error('gender')
                                    is-invalid
                                @enderror"
                                    name="gender" id="gender" title="Gender">
                                    <option value="Male"
                                        {{ old('gender', $residentBirth->gender) == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female"
                                        {{ old('gender', $residentBirth->gender) == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="birth_place" class="form-label fw-bold">Birth Place</label>
                                <div class="input-group">
                                    <input type="text" name="birth_place"
                                        value="{{ old('birth_place', $residentBirth->birth_place) }}"
                                        class="form-control form-control-sm @error('birth_place')
                                        is-invalid
                                    @enderror"
                                        id="birth_place" aria-describedby="basic-addon3">
                                </div>
                                @error('birth_place')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="birth_date" class="form-label fw-bold">Birth Date</label>
                                <div class="input-group">
                                    <input type="date" name="birth_date"
                                        value="{{ old('birth_date', $residentBirth->birth_date->format('Y-m-d')) }}"
                                        class="form-control form-control-sm @error('birth_date')
                                        is-invalid
                                    @enderror"
                                        id="birth_date" aria-describedby="basic-addon3">
                                </div>
                                @error('birth_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="button-field
                                        text-end">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
