@extends('user.layout.main')

@push('css')
    <style>
        ul.side-menu:not(ul.active) {
            list-style: none;
            font-size: 14px;
        }

        ul.side-menu li::before {
            content: "\2022";
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        ul.side-menu li,
        ul.side-menu li:not(.active) a {
            color: black;
        }

        ul.side-menu li.active {
            color: #ef6603;
        }
    </style>
@endpush

@push('css')
    <style>
        .data-field {
            font-size: 14px;
        }
    </style>
@endpush

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-2">
                <ul class="side-menu">
                    <li class="active"><a href="{{ route('user.my-submission.index') }}">My Submission</a></li>
                    <li class=""><a href="">Submission History</a></li>
                </ul>
            </div>
            <div class="col" style="min-height: 100vh;">
                <div class="d-flex flex-column gap-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">#{{ $submission->id }}</h5>
                            <div class="d-flex justify-content-between data-field">
                                <span>Submitter</span>
                                {{-- @dd($submission) --}}
                                <span>{{ $submission->submitter->name }}</span>
                            </div>
                            <div class="d-flex justify-content-between data-field mt-2">
                                <span>Service</span>
                                <span>{{ $submission->serviceCategory->name }}: {{ $submission->service->name }}</span>
                            </div>
                            <div class="d-flex justify-content-between data-field mt-2">
                                <span>Attachment</span>
                                <ul>
                                    @foreach ($submission->media as $media)
                                        <li><a target="_" href="{{ $media->getUrl() }}">{{ $media->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between data-field mt-2">
                                <span>Status</span>
                                <span>{{ $submission->status }}</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
