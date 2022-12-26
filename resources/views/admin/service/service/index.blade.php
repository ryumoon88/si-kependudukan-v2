@extends('admin.layout.main')
@section('content')
    <div class="section">
        <div class="card">
            <div class="card-body w-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-title">Resident Birth</div>
                    <div><a href="{{ route('admin.service.service.create') }}" class="btn btn-primary btn-sm px-3">New</a>
                        {{-- <div><a href="{{ route('admin.dashboard.resident.create') }}" class="btn btn-primary btn-sm px-3">New</a> --}}
                    </div>
                </div>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(function(){
            setTimeout(() => {

                $('form#delete-form').each((i, d) => {
                    var hapus = false;
                    $(d).submit(function(e) {
                        if(!hapus) {
                            e.preventDefault();
                            setModal('Delete Service', "Are you sure want to delete this service?<br/>This action cannot be undone!", 'yesno');
                            var modal = getModal();
                            setModalAction(function(e) {
                                hapus = true;
                                modal.hide();
                                setTimeout(() => {
                                    $(d).submit();
                                }, 500);
                            })
                            modal.show()
                        }
                    })
                })
            }, 500);
        })
    </script>
@endpush
