@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <form class="card-body" method="POST" action="{{ route('admin.resident.registered.store') }}">
                        @csrf
                        @method('POST')
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                New Resident
                            </div>
                        </div>
                        <div class="d-flex data-field flex-column" id="birth_select">
                            <label for="basic-url" class="form-label fw-bold">Birth Detail</label>
                            <select
                                class="select-picker form-control form-control-sm btn-white border @error('resident_birth_id')
                                is-invalid
                            @enderror"
                                name="resident_birth_id" data-live-search="true" id="resident_birth_id" title="Birth ID">
                            </select>
                            @error('resident_birth_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @push('scripts')
                                <script type="module">
                                    $(function(){
                                        var fatherSelectCont =$('div#birth_select');
                                        var fSelect = fatherSelectCont.find('select');
                                        fSelect = fSelect.selectpicker();
                                        var fSearch = fatherSelectCont.find('input');
                                        fSearch.bind('keyup', onKeyUp)

                                        function onKeyUp(e){
                                            var val = $(this).val()
                                            console.log(!isNaN(String.fromCharCode(e.which)));
                                            if(val.length == 1 && !isNaN(String.fromCharCode(e.which))){
                                                $.ajax({
                                                    url: '{{ route("api.resident-birth") }}',
                                                    method: 'post',
                                                    data: {
                                                        id: val,
                                                        _token: '{{ csrf_token() }}'
                                                    },
                                                    dataType:'json',
                                                }).done(function(response){
                                                    fSelect.selectpicker('destroy');
                                                    fSelect.empty();
                                                    $.each(response, function(k, v){
                                                        fSelect.append(`<option value="${v.id}" data-subtext="${v.id}">${v.name}</option>`);
                                                    });
                                                    fSelect.selectpicker();
                                                    fSearch = fatherSelectCont.find('input');
                                                    fSearch.bind('keyup', onKeyUp)
                                                })
                                            }
                                        }
                                    });
                                </script>
                            @endpush
                        </div>
                        <div class="mb-3 data-field d-flex flex-column">
                            <label for="name" class="form-label fw-bold">Email</label>
                            <div class="input-group">
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control form-control-sm @error('email')
                                        is-invalid
                                    @enderror"
                                    id="name" aria-describedby="basic-addon3">
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 data-field d-flex flex-column">
                            <label for="phone_number" class="form-label fw-bold">Phone Number</label>
                            <div class="input-group">
                                <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                    class="form-control form-control-sm @error('phone_number')
                                        is-invalid
                                    @enderror"
                                    id="phone_number" aria-describedby="basic-addon3">
                            </div>
                            @error('phone_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 data-field d-flex flex-column">
                            <label for="religion" class="form-label fw-bold">Religion</label>
                            <select name="blood_type" class="form-control form-control-sm selectpicker border"
                                id="blood_type" title="Religion">
                                @foreach (['Islam', 'Kristen', 'Hindu', 'Buddha', 'Khonghucu', 'Khatolik'] as $religion)
                                    <option value="{{ $religion }}">{{ $religion }}</option>
                                @endforeach
                            </select>
                            @error('religion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 data-field d-flex flex-column">
                            <label for="basic-url" class="form-label fw-bold">Blood Type</label>
                            <select name="blood_type" class="form-control form-control-sm selectpicker border"
                                id="blood_type" title="Blood Type">
                                @foreach (['A', 'B', 'AB', 'O'] as $blood_type)
                                    <option value="{{ $blood_type }}">{{ $blood_type }}</option>
                                @endforeach
                            </select>
                            @error('blood_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 data-field d-flex flex-column">
                            <label for="basic-url" class="form-label fw-bold">Address</label>
                            <textarea name="address" class="form-control form-control-sm" id="address" title="Blood Type"></textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="button-field
                                        text-end">
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
