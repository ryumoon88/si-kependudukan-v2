@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <form class="card-body" method="POST"
                        action="{{ route('admin.service.service.update', ['service' => $service->slug]) }}">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                Service Detail <br>
                                <span>{{ $service->name }}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="basic-url" class="form-label fw-bold">Category</label>
                                <select class="form-select form-select-sm" name="service_category_id"
                                    aria-label="Default select example">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $service->category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="basic-url" class="form-label fw-bold">Name</label>
                                <div class="input-group">
                                    <input type="text" name="name" value="{{ old('name', $service->name) }}"
                                        class="form-control form-control-sm" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="mb-3 data-field d-flex flex-column">
                                <label for="basic-url" class="form-label fw-bold">Description</label>
                                <textarea class="ckeditor form-control" id="ck-editor" name="description">
                                    {{ $service->description }}
                                </textarea>
                                @push('scripts')
                                    <script type="module">
                                        $(function(){
                                            CKEDITOR.replace('ck-editor', {
                                                enterMode: CKEDITOR.ENTER_DIV
                                            });
                                        })
                                    </script>
                                @endpush
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Requirements</span>
                                <ul class="w-auto">
                                    @foreach ($service->requirements as $data)
                                        {{-- <li>{{ dd($data->requirement) }}</li> --}}
                                        <li class="py-1 align-center">
                                            <div class="d-flex justify-content-between">
                                                <span class="h-100 align-self-center">{{ $data->name }}</span>
                                                <a data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Delete" href=""
                                                    class="ms-3 btn-delete-req btn btn-sm btn-outline-danger"><i
                                                        class="bi bi-x"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                    @push('scripts')
                                        <script type="module">
                                            $(function(){
                                                $('a.btn-delete-req').click(function(e){
                                                    e.preventDefault();
                                                    var id = $(this).attr('data-id')
                                                    setModal('Delete Service Requirement', 'Are you sure want to delete this requirement?<br/>This action cannot be undone!', 'yesno')
                                                    var modal = getModal();

                                                    setModalAction(function(){
                                                        $.ajax({
                                                            type: "DELETE",
                                                            url: `{{ url('/a/service/service-has-requirement/${id}') }}`,
                                                            data: {_token: "{{ csrf_token() }}"},
                                                            dataType: 'json',
                                                            success: function(response){
                                                                modal.hide();
                                                                showAlert('success', response.message);

                                                                setTimeout(() => {
                                                                    location.reload();
                                                                }, 1000);
                                                            }

                                                        });
                                                    })

                                                    modal.show();
                                                })
                                            })
                                        </script>
                                    @endpush
                                    @if ($requirements->isNotEmpty())
                                        <select class="form-select form-select-sm mt-2" id="add-requirement"
                                            aria-label="Default select example">
                                            <option selected>Add Requirement</option>
                                            @foreach ($requirements as $req)
                                                <option value="{{ $req->id }}">{{ $req->name }}</option>
                                            @endforeach
                                        </select>
                                        @push('scripts')
                                            <script type="module">
                                            $('#add-requirement').change(function(e) {
                                                var val = $(this).find('option:selected').val();
                                                if(!isNaN(val)){
                                                    $.ajax({
                                                        type: "POST",
                                                        url: `{{ url('/a/service/service-has-requirement') }}`,
                                                        data: {
                                                            service_id: `{{ $service->id }}`,
                                                            service_requirement_id: val,
                                                            _token: '{{ csrf_token() }}'
                                                        },
                                                        dataType: 'json',
                                                        success: function(response){
                                                            location.reload();
                                                        }
                                                    })
                                                }

                                            })
                                            </script>
                                        @endpush
                                    @endif
                                </ul>
                            </div>

                            <div class="button-field
                                        text-end">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
