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
                    <form class="card-body" method="POST" action="{{ route('admin.resident.birth.store') }}">
                        @csrf
                        @method('POST')
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                New Service
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="mb-3 data-field d-flex flex-column" id="father_select">
                                <label for="basic-url" class="form-label fw-bold">Father</label>
                                <select
                                    class="select-picker form-control form-control-sm btn-white border @error('father_id')
                                    is-invalid
                                @enderror"
                                    name="father_id" data-live-search="true" id="father_id" title="Father ID Card Number">
                                </select>
                                @error('father_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                @push('scripts')
                                    <script type="module">
                                        $(function(){
                                            var fatherSelectCont =$('div#father_select');
                                            var fSelect = fatherSelectCont.find('select');
                                            fSelect = fSelect.selectpicker();
                                            var fSearch = fatherSelectCont.find('input');
                                            fSearch.bind('keyup', onKeyUp)

                                            function onKeyUp(e){
                                                var val = $(this).val()
                                                console.log(!isNaN(String.fromCharCode(e.which)));
                                                if(val.length == 16 && !isNaN(String.fromCharCode(e.which))){
                                                    $.ajax({
                                                        url: '{{ route("api.resident") }}',
                                                        method: 'post',
                                                        data: {
                                                            id:val,
                                                            gender: 'Male',
                                                            _token: '{{ csrf_token() }}'
                                                        },
                                                        dataType:'json',
                                                    }).done(function(response){
                                                        fSelect.selectpicker('destroy');
                                                        fSelect.empty();
                                                        $.each(response, function(k, v){
                                                            fSelect.append(`<option value="${v.id}" data-subtext="${v.id_card_number}">${v.birth.name}</option>`);
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
                            <div class="mb-3 data-field d-flex flex-column" id="mother_select">
                                <label for="basic-url" class="form-label fw-bold">Mother</label>
                                <select
                                    class="select-picker form-control form-control-sm btn-white border @error('mother_id')
                                    is-invalid
                                @enderror"
                                    name="mother_id" data-live-search="true" id="mother_id" title="Mother ID Card Number">
                                </select>
                                @error('mother_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                @push('scripts')
                                    <script type="module">
                                        $(function(){
                                            var motherSelectCont =$('div#mother_select');
                                            var mSelect = motherSelectCont.find('select');
                                            mSelect = mSelect.selectpicker();
                                            var mSearch = motherSelectCont.find('input');
                                            mSearch.bind('keyup', onKeyUp)

                                            function onKeyUp(e){
                                                var val = $(this).val()
                                                console.log(!isNaN(String.fromCharCode(e.which)));
                                                if(val.length == 16 && !isNaN(String.fromCharCode(e.which))){
                                                    $.ajax({
                                                        url: '{{ route("api.resident") }}',
                                                        method: 'post',
                                                        data: {
                                                            id:val,
                                                            gender: 'Female',
                                                            _token: '{{ csrf_token() }}'
                                                        },
                                                        dataType:'json',
                                                    }).done(function(response){
                                                        mSelect.selectpicker('destroy');
                                                        mSelect.empty();
                                                        $.each(response, function(k, v){
                                                            mSelect.append(`<option value="${v.id}" data-subtext="${v.id_card_number}">${v.birth.name}</option>`);
                                                        });
                                                        mSelect.selectpicker();
                                                        mSearch = motherSelectCont.find('input');
                                                        mSearch.bind('keyup', onKeyUp)
                                                    })
                                                }
                                            }
                                        });
                                    </script>
                                @endpush
                            </div>
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
                                <label for="gender" class="form-label fw-bold">Gender</label>
                                <select
                                    class="selectpicker bg-white form-control form-control-sm btn-white border @error('gender')
                                    is-invalid
                                @enderror"
                                    name="gender" id="gender" title="Gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="birth_place" class="form-label fw-bold">Birth Place</label>
                                <div class="input-group">
                                    <input type="text" name="birth_place" value="{{ old('birth_place') }}"
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
                                        value="{{ old('birth_date', now()->format('Y-m-d')) }}"
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
