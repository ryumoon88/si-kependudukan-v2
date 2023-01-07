@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                Service Detail <br>
                                <span>{{ $service->name }}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="data-field">
                                <span class="fw-bold text-start">Category</span>
                                <span class="text-muted ">{{ $service->category->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Name</span>
                                <span class="text-muted ">{{ $service->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start pe-5">Description</span>
                                <span class="text-muted">
                                    {!! $service->description !!}
                                </span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Requirements</span>
                                @if ($service->requirements->isNotEmpty())
                                    <ul class="w-auto">
                                        @foreach ($service->requirements as $requirement)
                                            {{-- <li>{{ dd($data->requirement) }}</li> --}}
                                            <li class="py-1 align-center">
                                                <div class="d-flex justify-content-between">
                                                    <span class="h-100 align-self-center">{{ $requirement->name }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">Doesn't have any requirements yet!</span>
                                @endif
                            </div>

                            <form id="delete-form" class="button-field text-end" method="POST"
                                action="{{ route('admin.service.service.destroy', ['service' => $service->slug]) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit" id="delete-btn">Delete</button>
                                <a
                                    class="btn btn-sm btn-primary"href="{{ route('admin.service.service.edit', ['service' => $service->slug]) }}">Edit</a>
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
    </div>
@endsection
