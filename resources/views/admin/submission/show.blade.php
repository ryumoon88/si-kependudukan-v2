@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                Submission Detail <br>
                                <span>{{ $submission->ulid }}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="data-field">
                                <span class="fw-bold text-start">Sender</span>
                                <span class="text-muted ">{{ $submission->submitter->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start pe-5">Service</span>
                                <span class="text-muted">
                                    {{ $submission->service->category->name }}: {{ $submission->service->name }}
                                </span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start pe-5">Status</span>
                                <span class="text-muted">
                                    {{ $submission->status }}
                                </span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start pe-5">Requirements</span>
                                <ul>
                                    @foreach ($submission->service->requirements as $requirement)
                                        <li>
                                            <div class="d-flex flex-column">
                                                <span>{{ $requirement->name }}</span>
                                                <span class="fw-bold">File</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <form id="delete-form" class="button-field text-end" method="POST"
                                action="{{ route('admin.service.category.destroy', ['service_category' => $serviceCategory->slug]) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit" id="delete-btn">Delete</button>
                                <a
                                    class="btn btn-sm btn-primary"href="{{ route('admin.service.category.edit', ['service_category' => $serviceCategory->slug]) }}">Edit</a>
                            </form> --}}
                            @push('scripts')
                                <script type="module">
                                    $(function(){
                                        var hapus = false;
                                        $('#delete-form').submit(function(e){
                                            if(!hapus) {
                                                e.preventDefault();
                                                setModal('Delete Service', "Are you sure want to delete this service category?<br/>This action cannot be undone!", 'yesno');
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
    </div>
@endsection
