@extends('admin.layout.main')
@section('content')
    <div class="row">
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Resident Births <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $resident_birth_count }}</h6>
                            {{-- <span class="text-success small pt-1 fw-bold">100%</span> --}}
                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Residents <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $resident_count }}</h6>
                            {{-- <span class="text-success small pt-1 fw-bold">100%</span> --}}
                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Submissions <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-arrow-down"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $submission_count }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-body">
                    <h5 class="card-title">Latest Submission</h5>
                    <table class="table table-borderless">
                        <thead class="table-primary">
                            <th style="width: 0px">#</th>
                            <th>Submitter</th>
                            <th>Service</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($latestSubmission as $submission)
                                <tr>
                                    <td class="fw-bold">{{ $loop->iteration }}</td>
                                    <td>{{ $submission->submitter->name }}</td>
                                    <td>{{ $submission->serviceCategory->name }}: {{ $submission->serviceCategory->name }}
                                    </td>
                                    <td>{{ $submission->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.submission.show', ['submission' => $submission->ulid]) }}"
                                            class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
