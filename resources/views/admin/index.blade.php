@extends('admin.layout.main')
@section('content')
    <div class="section">
        <div class="card">
            <div class="card-body w-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-title">User</div>
                    <div><a href="" class="btn btn-primary btn-sm px-3">New</a>
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
@endpush
