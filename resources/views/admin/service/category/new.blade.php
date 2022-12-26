@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <form class="card-body" method="POST" action="{{ route('admin.service.category.store') }}">
                        @csrf
                        @method('POST')
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                New Service Category
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="basic-url" class="form-label fw-bold">Name</label>
                                <div class="input-group">
                                    <input type="text" name="name" value="{{ old('name') }}"
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
                                <label for="basic-url" class="form-label fw-bold">Description</label>
                                <textarea
                                    class="ckeditor @error('description')
                                is-invalid
                            @enderror form-control"
                                    name="description">
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                @push('scripts')
                                    <script type="module">
                                        $(document).ready(function () {
                                            $('.ckeditor').ckeditor();
                                        });
                                    </script>
                                @endpush
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
