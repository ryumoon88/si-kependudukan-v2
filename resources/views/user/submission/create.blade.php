@extends('user.layout.main')

@section('content')
    <section class="inner-page">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Resident Detail</h5>
                            <h6 class="card-subtitle mb-2 text-muted mb-3">#{{ Auth::user()->id_card_number }}</h6>

                            <div class="image-holder text-center mb-3 col-3 mx-auto" style="min-width: 100px;">
                                <img src="{{ Vite::image('profile-picture-placeholder.png') }}"
                                    class="rounded-circle img-fluid img-thumbnail mb-2 w-100" alt="">
                                <span class="fw-bold">{{ Auth::user()->resident_birth->name }}</span>
                            </div>

                            <div class="data-field d-flex justify-content-between mb-3" style="font-size: 14px;">
                                <span class="fw-bold">Name</span>
                                <span class="text-end">{{ Auth::user()->resident_birth->name }}</span>
                            </div>
                            <div class="data-field d-flex justify-content-between mb-3" style="font-size: 14px;">
                                <span class="fw-bold">Gender</span>
                                <span class="text-end">{{ Auth::user()->resident_birth->gender }}</span>
                            </div>
                            <div class="data-field d-flex justify-content-between mb-3" style="font-size: 14px;">
                                <span class="fw-bold">Religion</span>
                                <span class="text-end">{{ Auth::user()->resident->religion }}</span>
                            </div>
                            <div class="data-field d-flex justify-content-between mb-3" style="font-size: 14px;">
                                <span class="fw-bold">Blood Type</span>
                                <span class="text-end">{{ Auth::user()->resident->blood_type }}</span>
                            </div>
                            <div class="data-field d-flex justify-content-between mb-3" style="font-size: 14px;">
                                <span class="fw-bold">Birth</span>
                                <span class="text-end">{{ Auth::user()->resident_birth->birth_place }},
                                    {{ Auth::user()->resident_birth->birth_date->format('d-m-Y') }}</span>
                            </div>
                            <div class="data-field d-flex justify-content-between mb-3" style="font-size: 14px;">
                                <span class="fw-bold">Email Address</span>
                                <span class="text-end">{{ Auth::user()->resident->email }}</span>
                            </div>
                            <div class="data-field d-flex justify-content-between mb-3" style="font-size: 14px;">
                                <span class="fw-bold">Phone Number</span>
                                <span class="text-end">{{ Auth::user()->resident->phone_number }}</span>
                            </div>
                            <div class="data-field d-flex justify-content-between mb-3" style="font-size: 14px;">
                                <span class="fw-bold">Address</span>
                                <span class="text-end">{{ Auth::user()->resident->address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow">
                        <form class="card-body" method="POST" action="{{ route('user.submission.store') }}"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <h5 class="card-title fw-bold">Submission</h5>
                            <div class="mb-3">
                                <label for="service_id" class="form-label">Service</label>
                                <select class="form-select" name="service_id" id="service_id">
                                    <option value="">Select service...</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            {{ $selected_service?->id == $service->id ? 'selected' : '' }}>
                                            {{ $service->category->name . ': ' . $service->name }}</option>
                                    @endforeach
                                </select>

                                @push('js')
                                    <script type="module">
                                        var serviceSelect = $('select#service_id');
                                        var inputContainer = $('.dynamic-input');

                                        serviceSelect.change(function(e){
                                            var url = "{{ route('api.service.index') }}"
                                            var service_id = serviceSelect.val();
                                            if(service_id != "" || service_id != null)
                                            {
                                                updateRequirement();
                                            }


                                        })

                                        function convertToSlug(Text) {
                                            return Text.toLowerCase()
                                                    .replace(/[^\w ]+/g, '')
                                                    .replace(/ +/g, '-');
                                        }

                                        function updateRequirement() {
                                            var url = "{{ route('api.service.index') }}"
                                            var service_id = serviceSelect.val();
                                            if(service_id != "" || service_id != null)
                                            {
                                                $.get(url+"?service_id="+serviceSelect.val())
                                                .done(function(response){
                                                    inputContainer.html("");
                                                    $.each(response.data.requirements, function(k, v){
                                                        inputContainer.append(
                                                            `
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">${v.name}</label>
                                                                <input class="form-control" name="${convertToSlug(v.name)}" type="file" id="formFile">
                                                            </div>
                                                            `
                                                        );
                                                    })
                                                })
                                                .fail(function(){
                                                    inputContainer.html("");
                                                });
                                            }
                                        }

                                        @if (isset($selected_service))
                                            updateRequirement()
                                        @endif
                                    </script>
                                @endpush
                            </div>

                            <div class="dynamic-input">

                            </div>
                            <div class="buttons text-end">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
