@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title pb-2 m-0">
                            Resident Detail
                            <span>| {{ $resident->ulid }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="data-field">
                                <span class="fw-bold text-start">ID Card Number</span>
                                <span class="text-muted ">{{ $resident->id_card_number }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Email</span>
                                <span class="text-muted ">{{ $resident->email }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Phone Number</span>
                                <span class="text-muted ">{{ $resident->phone_number }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Religion</span>
                                <span class="text-muted ">{{ $resident->religion }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Blood Type</span>
                                <span class="text-muted ">{{ $resident->blood_type }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Address</span>
                                <span class="text-muted ">{{ $resident->address }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Registered At</span>
                                <span class="text-muted ">{{ $resident->created_at }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Last Update</span>
                                <span class="text-muted ">{{ $resident->updated_at }}</span>
                            </div>
                        </div>
                        <div class="card-title pb-2 m-0">
                            Resident Birth Detail
                            <span>| {{ $resident->birth->ulid }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="data-field">
                                <span class="fw-bold text-start">Name</span>
                                <span class="text-muted ">{{ $resident->birth->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Gender</span>
                                <span class="text-muted ">{{ $resident->birth->gender }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Birth Place</span>
                                <span class="text-muted ">{{ $resident->birth->birth_place }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Birth Date</span>
                                <span class="text-muted ">{{ $resident->birth->birth_date }}</span>
                            </div>
                        </div>
                        <form id="delete-form" class="button-field text-end mt-4" method="POST"
                            action="{{ route('admin.resident.registered.destroy', ['resident' => $resident->ulid]) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit" id="delete-btn">Delete</button>
                            <a
                                class="btn btn-sm btn-primary"href="{{ route('admin.resident.registered.edit', ['resident' => $resident->ulid]) }}">Edit</a>
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
