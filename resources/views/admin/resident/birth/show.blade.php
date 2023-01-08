@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title pb-2 m-0">
                            Resident Birth Detail
                            <span>| {{ $residentBirth->ulid }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="data-field">
                                <span class="fw-bold text-start">Name</span>
                                <span class="text-muted ">{{ $residentBirth->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Gender</span>
                                <span class="text-muted ">{{ $residentBirth->gender }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Birth Place</span>
                                <span class="text-muted ">{{ $residentBirth->birth_place }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Birth Date</span>
                                <span class="text-muted ">{{ $residentBirth->birth_date }}</span>
                            </div>
                        </div>
                        <hr class="mb-0 mt-4">
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                                <div class="card-title pb-2 m-0">
                                    Father Detail
                                    <span>| <a href="">{{ $residentBirth->father?->id_card_number }}</a></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Name</span>
                                        <span class="text-muted ">{{ $residentBirth->father?->birth?->name }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Religion</span>
                                        <span class="text-muted ">{{ $residentBirth->father?->religion }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Blood Type</span>
                                        <span class="text-muted ">{{ $residentBirth->father?->blood_type }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Birth Place</span>
                                        <span class="text-muted ">{{ $residentBirth->father?->birth?->birth_place }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Birth Date</span>
                                        <span class="text-muted ">{{ $residentBirth->father?->birth?->birth_date }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Email</span>
                                        <span class="text-muted ">{{ $residentBirth->father?->email }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Address</span>
                                        <span class="text-muted ">{{ $residentBirth->father?->address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-title pb-2 m-0">
                                    Mother Detail
                                    <span>| <a href="">{{ $residentBirth->mother?->id_card_number }}</a></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Name</span>
                                        <span class="text-muted ">{{ $residentBirth->mother?->birth?->name }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Religion</span>
                                        <span class="text-muted ">{{ $residentBirth->mother?->religion }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Blood Type</span>
                                        <span class="text-muted ">{{ $residentBirth->mother?->blood_type }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Birth Place</span>
                                        <span class="text-muted ">{{ $residentBirth->mother?->birth?->birth_place }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Birth Date</span>
                                        <span class="text-muted ">{{ $residentBirth->mother?->birth?->birth_date }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Email</span>
                                        <span class="text-muted ">{{ $residentBirth->mother?->email }}</span>
                                    </div>
                                    <div class="data-field">
                                        <span class="fw-bold text-start">Address</span>
                                        <span class="text-muted ">{{ $residentBirth->mother?->address }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form id="delete-form" class="button-field text-end mt-4" method="POST"
                            action="{{ route('admin.resident.birth.destroy', ['resident_birth' => $residentBirth->ulid]) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit" id="delete-btn">Delete</button>
                            <a
                                class="btn btn-sm btn-primary"href="{{ route('admin.resident.birth.edit', ['resident_birth' => $residentBirth->ulid]) }}">Edit</a>
                        </form>
                        @push('scripts')
                            <script type="module">
                                    $(function(){
                                        var hapus = false;
                                        $('#delete-form').submit(function(e){
                                            if(!hapus) {
                                                e.preventDefault();
                                                setModal('Delete Service', "Are you sure want to delete this service?<br/>This action cannot be undone!", 'yesno');
                                                var modal = getModal();
                                                setModalAction(function(e) {
                                                    hapus = true;
                                                    modal.hide();
                                                    setTimeout(() => {
                                                        $("#delete-form").submit();
                                                    }, 500);
                                                })
                                                modal.show()
                                            }
                                        })
                                    })
                                </script>
                        @endpush
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
