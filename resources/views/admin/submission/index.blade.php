@extends('admin.layout.main')
@section('content')
    <div class="section">
        <div class="card">
            <div class="card-body w-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-title">Service Requirement</div>
                    <div class="d-flex justify-content-end">
                        <div class="input-group input-group-sm mb-3">
                            {{-- <label class="input-group-text" for="statusFilter">Status Filter</label>
                            <select class="form-select" id="statusFilter">
                                <option value="" selected>All</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Accepted">Reviewing</option>
                                <option value="Accepted">Denied</option>
                            </select> --}}
                            <label class="input-group-text" for="serviceFilter">Service Filter</label>
                            <select class="form-select" id="serviceFilter">
                                <option value="" selected>All</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->category->name }}: {{ $service->name }}">
                                        {{ $service->category->name }}: {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
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

            var dataTable = LaravelDataTables["submission-table"];

            // $('select#statusFilter').change(function(e){
            //     var val = $(this).val()+" "+$('select#serviceFilter').val();
            //     dataTable.search(val).draw();
            // })

            var table = $('#submission-table')

            $('select#serviceFilter').change(function(e){
                table.on('preXhr.dt', function(e, settings, data){
                    data.service_name = $('select#serviceFilter').val();
                })

                table.DataTable().ajax.reload();
            })


            setTimeout(() => {

                $('form#delete-form').each((i, d) => {
                    var hapus = false;
                    $(d).submit(function(e) {
                        if(!hapus) {
                            e.preventDefault();
                            setModal('Delete Service', "Are you sure want to delete this service requirement?<br/>This action cannot be undone!", 'yesno');
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
