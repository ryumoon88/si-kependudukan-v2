@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                Service Requirement Detail <br>
                                <span>{{ $serviceRequirement->name }}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="data-field">
                                <span class="fw-bold text-start">Name</span>
                                <span class="text-muted ">{{ $serviceRequirement->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Need File</span>
                                <span class="text-muted ">{{ $serviceRequirement->need_file ? 'Yes' : 'No' }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start pe-5">Use in:</span>
                                <span class="text-muted">
                                    <ul>
                                        @if ($serviceRequirement->services->isEmpty())
                                            None
                                        @else
                                            @foreach ($serviceRequirement->services as $service)
                                                <li><a href="{{ route('admin.service.service.show', ['service' => $service->slug]) }}"
                                                        class="text-decoration-none text-muted">{{ $service->name }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </span>
                            </div>
                            <form id="delete-form" class="button-field text-end" method="POST"
                                action="{{ route('admin.service.requirement.destroy', ['service_requirement' => $serviceRequirement->ulid]) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit" id="delete-btn">Delete</button>
                                <a
                                    class="btn btn-sm btn-primary"href="{{ route('admin.service.requirement.edit', ['service_requirement' => $serviceRequirement->ulid]) }}">Edit</a>
                            </form>
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
