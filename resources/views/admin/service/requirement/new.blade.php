@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <form class="card-body" method="POST" action="{{ route('admin.service.requirement.store') }}">
                        @method('POST')
                        @csrf
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                New Service Requirement
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="name" class="form-label fw-bold">Name</label>
                                <div class="input-group">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-sm @error('name')
                                        is-invalid
                                    @enderror"
                                        id="name" aria-describedby="basic-addon3">
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="" class="form-label fw-bold">Need file</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="need_file" id="need_file1"
                                        value="1" checked>
                                    <label class="form-check-label" for="need_file1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="need_file" id="need_file2"
                                        value="0">
                                    <label class="form-check-label" for="need_file2">
                                        No
                                    </label>
                                </div>
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
