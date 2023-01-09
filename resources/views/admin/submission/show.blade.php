@extends('admin.layout.main')

@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">
                                Submission Detail <br>
                                <span>{{ $submission->ulid }}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="data-field">
                                <span class="fw-bold text-start">Sender</span>
                                <span class="text-muted ">{{ $submission->submitter->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start pe-5">Service</span>
                                <span class="text-muted">
                                    {{ $submission->service->category->name }}: {{ $submission->service->name }}
                                </span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start pe-5">Status</span>
                                <span class="text-muted">
                                    {{ $submission->status }}
                                </span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start pe-5">Attachment</span>
                                <ul>
                                    {{-- @dd($submission->getFirstMedia(Str::slug('foto selfie'))->name) --}}
                                    @foreach ($submission->service->requirements as $requirement)
                                        <li>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $requirement->name }}</span>
                                                @if ($submission->hasMedia(Str::slug($requirement->name)))
                                                    @php
                                                        $media = $submission->getFirstMedia(Str::slug($requirement->name));
                                                    @endphp
                                                    <a href="{{ $media->getUrl() }}"
                                                        target="_blank">{{ $media->file_name }}</a>
                                                @else
                                                    <span class="text-danger">Missing</span>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if ($submission->status == 'Reviewing')
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.submission.deny', ['submission' => $submission->ulid]) }}"
                                        class="btn btn-danger btn-sm me-2">Deny</a>
                                    <a href="{{ route('admin.submission.accept', ['submission' => $submission->ulid]) }}"
                                        class="btn btn-success btn-sm">Accept</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
