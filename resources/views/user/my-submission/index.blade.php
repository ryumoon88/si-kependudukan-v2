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

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-2">
                <ul class="side-menu">
                    <li class="active"><a href="">My Submission</a></li>
                    <li class=""><a href="">Submission History</a></li>
                </ul>
            </div>
            <div class="col">
                <div class="d-flex flex-column gap-3">
                    @foreach ($submissions as $submission)
                        <a class="card"
                            href="{{ route('user.my-submission.show', ['submission' => $submission->ulid]) }}">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">#{{ $submission->id }}</h5>
                                <h6 class="card-subtitle fw-semibold text-muted">{{ $submission->serviceCategory->name }}:
                                    {{ $submission->service->name }}</h6>
                                <div class="d-flex justify-content-between mt-4" style="font-size: 14px;">
                                    <span class="text-muted">Status: {{ $submission->status }}</span>
                                    <span class="text-muted">{{ $submission->created_at }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
