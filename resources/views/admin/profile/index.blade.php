@extends('admin.layout.main')

@section('content')
    <div class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img data-old="{{ Auth::user()->getFirstMedia('profile-images') != null? Auth::user()->getFirstMedia('profile-images')->getUrl(): Vite::image('profile-picture-placeholder.png') }}"
                            src="{{ Auth::user()->getFirstMedia('profile-images') != null? Auth::user()->getFirstMedia('profile-images')->getUrl(): Vite::image('profile-picture-placeholder.png') }}"
                            alt="Profile" class="rounded-circle profile-img-preview shadow">
                        <h2>{{ Auth::user()->username }}</h2>
                        <h3>{{ Auth::user()->roles()->first()->name }}</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-settings">Settings</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change
                                    Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">{{ Auth::user()->about }}</p>
                                <h5 class="card-title">Profile Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">ID Number</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->id_number }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->resident->birth->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Role</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ Arr::join(
                                            Auth::user()->roles->map(function ($data) {
                                                    return $data->name;
                                                })->toArray(),
                                            ', ',
                                        ) }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->resident->address }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->phone_number }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>

                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="{{ route('admin.profile.update', ['user' => Auth::user()->ulid]) }}"
                                    enctype="multipart/form-data" method="POST" class="edit-profile">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="pt-2 d-flex">
                                                <input type="hidden" name="remove-image" value="false">
                                                <input type="file" accept=".png,.jpg,.jpeg" class="form-control me-2"
                                                    title="Upload new profile image" name="image"></input>
                                                <button type="button" class="btn btn-danger btn-remove"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    @push('scripts')
                                        <script type="module">
                                    var inputImage = $('input[name=image]')
                                    var imagePlaceholder = $('img.profile-img-preview')

                                    inputImage.change(function(e){
                                        var src = URL.createObjectURL($('input[name=image]')[0].files[0]);
                                        imagePlaceholder.attr('src', src);
                                        $('input[name=remove-image]').val(false)
                                        console.log($('input[name=remove-image]').val())
                                    })

                                    $('button.btn-remove').click(function(e){
                                        $('input[name=remove-image]').val(true)
                                        inputImage.val('')
                                        imagePlaceholder.attr('src', '{{ Vite::image('profile-picture-placeholder.png') }}')
                                        console.log($('input[name=remove-image]').val())
                                    })
                                </script>
                                    @endpush
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">ID Number</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input disabled type="text" class="form-control"
                                                value="{{ Auth::user()->resident->id_number }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-4 col-lg-5">
                                            <input type="text" disabled class="form-control mb-2 mb-md-0 disabled"
                                                id="first_name" placeholder="First Name"
                                                value="{{ old('first_name', Auth::user()->resident->first_name) }}">
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <input disabled type="text" class="form-control disabled" id="last_name"
                                                placeholder="Last Name"
                                                value="{{ old('last_name', Auth::user()->resident->last_name) }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about"
                                                class="form-control @error('about')
                                        is-invalid
                                    @enderror"
                                                id="about" style="height: 100px">{{ old('about', Auth::user()->about) }}</textarea>
                                            @error('about')
                                                <div class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="role" class="col-md-4 col-lg-3 col-form-label">Roles</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input disabled type="text" class="form-control" id="role"
                                                value="{{ Arr::join(
                                                    Auth::user()->roles->map(function ($data) {
                                                            return $data->name;
                                                        })->toArray(),
                                                    ', ',
                                                ) }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input disabled type="text" class="form-control" id="address"
                                                value="{{ Auth::user()->resident->address }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone_number" type="text"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                id="Phone"
                                                value="{{ old('phone_number', Auth::user()->phone_number) }}">
                                            @error('phone_number')
                                                <div class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="Email"
                                                value="{{ old('email', Auth::user()->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="row mb-3">
                                <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                    Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="twitter" type="text" class="form-control" id="Twitter"
                                        value="https://twitter.com/#">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                    Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="facebook" type="text" class="form-control" id="Facebook"
                                        value="https://facebook.com/#">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                    Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="instagram" type="text" class="form-control" id="Instagram"
                                        value="https://instagram.com/#">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                    Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="linkedin" type="text" class="form-control" id="Linkedin"
                                        value="https://linkedin.com/#">
                                </div>
                            </div> --}}

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                            {{-- Settings --}}
                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                            Notifications</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                <label class="form-check-label" for="changesMade">
                                                    Changes made to your account
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                <label class="form-check-label" for="newProducts">
                                                    Information on new products and services
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="proOffers">
                                                <label class="form-check-label" for="proOffers">
                                                    Marketing and promo offers
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="securityNotify"
                                                    checked disabled>
                                                <label class="form-check-label" for="securityNotify">
                                                    Security alerts
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End settings Form -->

                            </div>
                            {{-- @if (!empty($errors->toArray()))
                        @dd($errors)
                    @endif --}}
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="" method="POST">
                                    @method('POST')
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password"
                                                class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                                id="currentPassword">
                                            @error('password')
                                                <div class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password"
                                                class="form-control @error('newpassword')
                                        is-invalid
                                    @enderror"
                                                id="newpassword">
                                            @error('newpassword')
                                                <div class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword_confirmation" type="password"
                                                class="form-control @error('newpassword_confirmation')
                                        is-invalid
                                    @enderror"
                                                id="renewpassword">
                                            @error('newpassword_confirmation')
                                                <div class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                    {{-- @dd(session('alert')) --}}
                                </form><!-- End Change Password Form -->
                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
