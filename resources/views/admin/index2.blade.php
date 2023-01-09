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
                            <h6>100</h6>
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
                            <h6>100</h6>
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
                            <h6>100</h6>
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
                    <table class="table table-borderless table-primary">
                        <thead>
                            <th style="width: 0px">#</th>
                            <th>Submitter</th>
                            <th>Service</th>
                            <th>Created At</th>
                        </thead>
                        <tbody>
                            <tr>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
