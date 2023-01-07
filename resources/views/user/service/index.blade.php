@extends('user.layout.main')

@section('content')
    <div class="services" id="services">
        <div class="container">
            @if (isset($service))
                <div class="card shadow border-0 mb-3">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Service</h5>
                        <div class="container d-flex flex-column gap-3" style="font-size: 14px;">
                            <div class="data-field">
                                <span class="fw-bold text-secondary">Category Name</span>
                                <div>
                                    {{ $service->category->name }}
                                </div>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-secondary">Service Name</span>
                                <div>
                                    {{ $service->name }}
                                </div>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-secondary">Description</span>
                                <div>
                                    {!! $service->description !!}
                                </div>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-secondary">Requirements</span>
                                <ul>
                                    @foreach ($service->requirements as $requirement)
                                        <li>{{ $requirement->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="button-field text-end">
                                <a href="{{ route('user.submission.create', ['service' => $service->slug]) }}"
                                    class="btn btn-primary btn-sm">Make Submission</a>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(isset($service_category))
                <div class="card shadow border-0 mb-3">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Service Category</h5>
                        <div class="form-floating mb-1 fw-semibold">
                            <input type="email" readonly class="form-control-plaintext" id="category_name"
                                placeholder="Category Name" value="{{ $service_category->name }}">
                            <label for="category_name">Category Name</label>
                        </div>
                        <div class="form-floating mb-1 fw-semibold">
                            <input type="email" readonly class="form-control-plaintext" id="category_name"
                                placeholder="Category Name" value="{!! $service_category->description !!}">
                            <label for="category_name">Description</label>
                        </div>

                        <div class="form-floating mb-1 fw-semibold">
                            <input type="text" readonly class="form-control-plaintext" id="services"
                                placeholder="Services">
                            <div class="row container fw-normal">
                                @foreach ($service_category->services as $service)
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="icon-box" data-aos="zoom-in-left">
                                            <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i>
                                            </div>
                                            <h4 class="title"><a
                                                    href="{{ route('user.service.index', ['service' => $service->slug]) }}">{{ $service->name }}</a>
                                            </h4>
                                            <p class="description">
                                                {{ Str::limit($service->excerpt, 300) }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <label for="services">Services</label>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    @foreach ($categories as $service_category)
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="icon-box" data-aos="zoom-in-left">
                                <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
                                <h4 class="title"><a
                                        href="{{ route('user.service.index', ['category' => $service_category->slug]) }}">{{ $service_category->name }}</a>
                                </h4>
                                {{-- <p class="description">Layanan penerbitan dokumen KTP-El bagi yang belum pernah memiliki
                            KTP El (baru perekaman), hilang atau rusak/patah/tidak terbaca.
                            Layanan ini tanpa PERUBAHAN DATA PADA ELEMEN KTP-El. Jika sudah selesai dicetak KTP El
                            diambil di Dukcapil Ogan Ilir.</p> --}}
                                <p class="description">
                                    {{ Str::limit($service_category->description, 300) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="services mt-3" id="services">
        <div class="container">

        </div>
    </div>
@endsection
