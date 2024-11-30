@extends('Website.Layout.layout')

@section('content')
    {{-- The first page --}}
    <div class="container hero-page" id="hero-page">
        <div class="hero-heading">
            <h2 class="italic-font">natural beauty</h1>
                <h1>Go for a holiday package, or just travel free and easy!</h1>
                <a href="" class="btn btn-lg d-flex align-items-center gap-2 hero-btn">
                    Explore
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
        </div>
        <img src="{{ asset('website/images/hero-image-1.jpg') }}" alt="hero-image-1" class="hero-img-1">
    </div>

    {{-- section 2 --}}
    @include('Website.Layout.components.filter')
    {{-- section 3 --}}
    <div class="container m-100">
        <div class="member-can">
            <img src="{{ asset('website/images/people_with_moble.png') }}" alt="login/signup">
            <div class="member-headings">
                <h3>Not a Member Yet?</h3>
                <h5>Join us! Our members can get Multiple Benefits and enjoy a Trip in a very reasonable price</h5>
                <div class="d-flex align-items-center gap-2 mt-4">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#signupModal"
                        class="btn btn-lg d-flex align-items-center gap-2 signup">
                        Sign up <i class="fa-solid fa-arrow-right"></i>
                    </button>
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#loginModal"
                        class="btn btn-lg d-flex align-items-center gap-2 bg-none login">
                        Login <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- section 4 --}}
    <div class="container section-4">
        <h3 class="text-center italic-font theme-text">What’s new</h3>
        <h1 class="text-center">Popular Tours</h1>
        <div class="tour-gallery mt-5">
            <div class="row g-3">
                {{-- {{ Str::words($description, 20, '...') }} for description --}}
                <div class="col-12 col-lg-8 p-1">
                    <div class="shadow d-flex gap-2 rounded overflow-hidden" id="first-tour">
                        <div class="">
                            <img src="https://fakeimg.pl/150x150/" alt="Custom Placeholder Image"
                                class="tour-first-img w-100 h-100 tour-coverimg" style="object-fit: cover;">
                        </div>
                        <div class="p-2">
                            {{-- people , camera and calendar --}}
                            <div class="d-flex align-items-center justify-content-between">
                                <div class='left d-flex align-items-center gap-2'>
                                    <p>
                                        <i class="fa-regular fa-calendar-days theme-text"></i>
                                        <span class="san">1 Day</span>
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-user-group theme-text"></i>
                                        <span class="san">5</span>
                                    </p>
                                </div>
                                <div class="right">
                                    <p>
                                        <i class="fa-solid fa-camera text-secondary"></i>
                                        <span class="san">5</span>
                                    </p>
                                </div>
                            </div>

                            {{-- login  --}}
                            <div class="modal fade {{ $errors->has('username') || $errors->has('password') ? 'show' : '' }}"
                                id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true"
                                style="{{ $errors->has('username') || $errors->has('password') ? 'display: block;' : '' }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="loginModalLabel">Login</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('user.login') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="usernameOrEmail" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="usernameOrEmail"
                                                        name="email" value="{{ old('username') }}" required>
                                                    @error('username')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" required>
                                                    @error('password')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-danger w-100">Login</button>
                                            </form>
                                            <div class="mt-3 text-center">
                                                <a href="" class="text-decoration-none">Forgot password?</a>
                                            </div>
                                            <div class="mt-3 text-center">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#signupModal"
                                                    class="text-decoration-none">Don't have a account?Sign up now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- end --}}
                            {{-- sign up --}}
                            <div class="modal fade {{ $errors->has('name') || $errors->has('email') || $errors->has('password') ? 'show' : '' }}"
                                id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true"
                                style="{{ $errors->has('name') || $errors->has('email') || $errors->has('password') ? 'display: block;' : '' }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('user.signup') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" value="{{ old('name') }}" required>
                                                    @error('name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" value="{{ old('email') }}" required>
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" required>
                                                    @error('password')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password_confirmation" class="form-label">Confirm
                                                        Password</label>
                                                    <input type="password" class="form-control"
                                                        id="password_confirmation" name="password_confirmation" required>
                                                </div>
                                                <button type="submit" class="btn btn-danger w-100">Sign Up</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- end --}}

                            {{-- Heading --}}
                            <div>
                                <h4 class="heading">
                                    <a href="">
                                        Kyoto and Nara: Fawn Experience A-Line
                                    </a>
                                </h4>
                                <p class="d-flex align-items-center gap-2 text-secondary">
                                    <i class="fa-solid fa-location-dot"></i>
                                    Kansai
                                </p>
                                <h6>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur rem, nihil saepe
                                    qui enim sequi aut quod placeat odit obcaecati.
                                </h6>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between px-2">
                                    <div>
                                        <h6 class="text-secondary">From</h6>
                                        <h5 class="price theme-text" style="font-weight: 800">$65,000</h5>
                                    </div>
                                    <a href="" class="d-flex align-items-center gap-1 explore-tour"
                                        style="width: fit-content">
                                        Explore
                                        <i class="fa-solid fa-arrow-right theme-text"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 p-1  col-md-6 col-lg-4">
                    <div class="rounded-lg shadow tour-card">
                        <img src="https://fakeimg.pl/150x150/" alt="Custom Placeholder Image"
                            class="w-100 h-100 tour-coverimg" style="object-fit: cover;max-height: 200px">
                        <div class="d-flex align-items-center justify-content-between shadow p-2 rounded tour-desc">
                            <div class="d-flex align-items-center gap-2">
                                <p class="p-0 m-0">
                                    <i class="fa-regular fa-calendar-days theme-text"></i>
                                    <span class="san">4 Days</span>
                                </p>
                                <p class="p-0 m-0">
                                    <i class="fa-solid fa-user-group theme-text"></i>
                                    <span class="san">5</span>
                                </p>
                            </div>
                            <div class="right">
                                <p class="p-0 m-0">
                                    <i class="fa-solid fa-camera text-secondary"></i>
                                    <span class="san">5</span>
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 px-4 py-2 tour-info">
                            <h4 class="heading">
                                <a href="">
                                    The Sea of Kyoto E-Line
                                </a>
                                </h1>
                                <p class="d-flex align-items-center gap-2 text-secondary tour-location">
                                    <i class="fa-solid fa-location-dot"></i>
                                    Kansai
                                </p>
                                <hr class="my-2" />
                                <div class="d-flex align-items-center justify-content-between px-2 tour-price-desc">
                                    <div>
                                        <h6 class="text-secondary">From</h6>
                                        <h5 class="price theme-text" style="font-weight: 800">$65,000</h5>
                                    </div>
                                    <a href="" class="d-flex align-items-center gap-1 explore-tour"
                                        style="width: fit-content">
                                        Explore
                                        <i class="fa-solid fa-arrow-right theme-text"></i>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 p-1  col-md-6 col-lg-4">
                    <div class="rounded-lg shadow tour-card">
                        <img src="https://fakeimg.pl/150x150/" alt="Custom Placeholder Image"
                            class="w-100 h-100 tour-coverimg" style="object-fit: cover;max-height: 200px">
                        <div class="d-flex align-items-center justify-content-between shadow p-2 rounded tour-desc">
                            <div class="d-flex align-items-center gap-2">
                                <p class="p-0 m-0">
                                    <i class="fa-regular fa-calendar-days theme-text"></i>
                                    <span class="san">4 Days</span>
                                </p>
                                <p class="p-0 m-0">
                                    <i class="fa-solid fa-user-group theme-text"></i>
                                    <span class="san">5</span>
                                </p>
                            </div>
                            <div class="right">
                                <p class="p-0 m-0">
                                    <i class="fa-solid fa-camera text-secondary"></i>
                                    <span class="san">5</span>
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 px-4 py-2 tour-info">
                            <h4 class="heading">
                                <a href="">
                                    The Sea of Kyoto E-Line
                                </a>
                                </h1>
                                <p class="d-flex align-items-center gap-2 text-secondary tour-location">
                                    <i class="fa-solid fa-location-dot"></i>
                                    Kansai
                                </p>
                                <hr class="my-2" />
                                <div class="d-flex align-items-center justify-content-between px-2 tour-price-desc">
                                    <div>
                                        <h6 class="text-secondary">From</h6>
                                        <h5 class="price theme-text" style="font-weight: 800">$65,000</h5>
                                    </div>
                                    <a href="" class="d-flex align-items-center gap-1 explore-tour"
                                        style="width: fit-content">
                                        Explore
                                        <i class="fa-solid fa-arrow-right theme-text"></i>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 p-1  col-md-6 col-lg-4">
                    <div class="rounded-lg shadow tour-card">
                        <img src="https://fakeimg.pl/150x150/" alt="Custom Placeholder Image"
                            class="w-100 h-100 tour-coverimg" style="object-fit: cover;max-height:200px;">
                        <div class="d-flex align-items-center justify-content-between shadow p-2 rounded tour-desc">
                            <div class="d-flex align-items-center gap-2">
                                <p class="p-0 m-0">
                                    <i class="fa-regular fa-calendar-days theme-text"></i>
                                    <span class="san">4 Days</span>
                                </p>
                                <p class="p-0 m-0">
                                    <i class="fa-solid fa-user-group theme-text"></i>
                                    <span class="san">5</span>
                                </p>
                            </div>
                            <div class="right">
                                <p class="p-0 m-0">
                                    <i class="fa-solid fa-camera text-secondary"></i>
                                    <span class="san">5</span>
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 px-4 py-2 tour-info">
                            <h4 class="heading">
                                <a href="">
                                    The Sea of Kyoto E-Line
                                </a>
                                </h1>
                                <p class="d-flex align-items-center gap-2 text-secondary tour-location">
                                    <i class="fa-solid fa-location-dot"></i>
                                    Kansai
                                </p>
                                <hr class="my-2" />
                                <div class="d-flex align-items-center justify-content-between px-2 tour-price-desc">
                                    <div>
                                        <h6 class="text-secondary">From</h6>
                                        <h5 class="price theme-text" style="font-weight: 800">$65,000</h5>
                                    </div>
                                    <a href="" class="d-flex align-items-center gap-1 explore-tour"
                                        style="width: fit-content">
                                        Explore
                                        <i class="fa-solid fa-arrow-right theme-text"></i>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 p-1  col-md-6 col-lg-4">
                    <div class="rounded-lg shadow tour-card">
                        <img src="https://fakeimg.pl/150x150/" alt="Custom Placeholder Image"
                            class="w-100 h-100 tour-coverimg" style="object-fit: cover;max-height: 200px">
                        <div class="d-flex align-items-center justify-content-between shadow p-2 rounded tour-desc">
                            <div class="d-flex align-items-center gap-2">
                                <p class="p-0 m-0">
                                    <i class="fa-regular fa-calendar-days theme-text"></i>
                                    <span class="san">4 Days</span>
                                </p>
                                <p class="p-0 m-0">
                                    <i class="fa-solid fa-user-group theme-text"></i>
                                    <span class="san">5</span>
                                </p>
                            </div>
                            <div class="right">
                                <p class="p-0 m-0">
                                    <i class="fa-solid fa-camera text-secondary"></i>
                                    <span class="san">5</span>
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 px-4 py-2 tour-info">
                            <h4 class="heading">
                                <a href="">
                                    The Sea of Kyoto E-Line
                                </a>
                                </h1>
                                <p class="d-flex align-items-center gap-2 text-secondary tour-location">
                                    <i class="fa-solid fa-location-dot"></i>
                                    Kansai
                                </p>
                                <hr class="my-2" />
                                <div class="d-flex align-items-center justify-content-between px-2 tour-price-desc">
                                    <div>
                                        <h6 class="text-secondary">From</h6>
                                        <h5 class="price theme-text" style="font-weight: 800">$65,000</h5>
                                    </div>
                                    <a href="" class="d-flex align-items-center gap-1 explore-tour"
                                        style="width: fit-content">
                                        Explore
                                        <i class="fa-solid fa-arrow-right theme-text"></i>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- section 5 --}}
    <div class="container section-4">
        <h3 class="text-center italic-font theme-text">Places to go</h3>
        <h1 class="text-center">Perfect Destination</h1>
        <div class="w-75 row g-4 mx-auto mt-4 tour-destinations">
            @php
                $places = [
                    'Japan',
                    'Thailand',
                    'Vietnam',
                    'Cambodia',
                    'Laos',
                    'Uk',
                    'China',
                    'america',
                    'Australia',
                    'Pakistan',
                    'india',
                    'afghanistan',
                ];
            @endphp
            @foreach ($places as $item)
                <div class=" col-4 col-md-3 ">
                    <h4 class="d-flex align-items-center gap-2">
                        <span style="font-weight: 700">{{ $item }}</span>
                        <span class="tour_no text-secondary">(5)</span>
                    </h4>
                </div>
            @endforeach
        </div>
        <div class="swiper mt-4">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($places as $item)
                    <div class="swiper-slide" style="background-image: url(https://fakeimg.pl/150x150/)">
                        <a href="">
                            <h1>{{ $item }}</h1>
                        </a>
                        <div class="swiper-line">

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    {{-- section 5 --}}
    <div class="container section-4">
        <h3 class="text-center italic-font theme-text">Brilliant reasons</h3>
        <h1 class="text-center">Why Choose Us</h1>
        <div class="mt-5 choose-us">
            <div class='d-flex align-items-center justify-content-center flex-column gap-4'>
                <img src="{{ asset('website/images/ticket.png') }}" width="80">
                <h4 class="text-center" style="font-weight: 900">Competitive Pricing</h4>
            </div>
            <div class='d-flex align-items-center justify-content-center flex-column gap-4'>
                <img src="{{ asset('website/images/position.png') }}" width="80">
                <h4 class="text-center" style="font-weight: 900">Worldwide Coverage</h4>
            </div>
            <div class='d-flex align-items-center justify-content-center flex-column gap-4'>
                <img src="{{ asset('website/images/calendar.png') }}" width="50">
                <h4 class="text-center" style="font-weight: 900">Fast Booking</h4>
            </div>
            <div class='d-flex align-items-center justify-content-center flex-column gap-4'>
                <img src="{{ asset('website/images/tour-guide.png') }}" width="50">
                <h4 class="text-center" style="font-weight: 900">Guided Tours</h4>
            </div>
        </div>
    </div>

    {{-- section 6 --}}
    <div class="container section-6 m-100 ">
        <div>
            <img src="{{ asset('website/images/Kiyomizu-1.jpg') }}" alt="" class="w-100 h-100"
                style="object-fit: cover">
        </div>
        <div class="bg-dark d-flex flex-column align-items-center justify-content-between pt-5 latest-deal text-light">
            <div class="">
                <h4 class="italic-font text-center theme-text">latest deal</h4>
                <h1 class="heading w-75 text-center mx-auto">Book this upcoming holiday package, tickets are selling fast!
                </h1>
            </div>
            <div class="w-50">
                <h6 class="text-center">It’s limited seating! Hurry up</h6>
                <div class="remaining-timing my-2 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <h2 class="theme-text text-center"
                            style="font-weight: 900;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
                            29</h2>
                        <h6>Days</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <h2 class="theme-text text-center"
                            style="font-weight: 900;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
                            2</h2>
                        <h6>Hours</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <h2 class="theme-text text-center"
                            style="font-weight: 900;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
                            29</h2>
                        <h6>Mins</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <h2 class="theme-text text-center"
                            style="font-weight: 900;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
                            29</h2>
                        <h6>Secs</h6>
                    </div>
                </div>
                <div class="hover-line"></div>
            </div>
        </div>
    </div>


    {{-- section 7 --}}
    <div class="container section-4">
        <h3 class="text-center italic-font theme-text">Get Updates</h3>
        <h1 class="text-center">Get In Touch</h1>
        <div class="d-flex align-items-center justify-content-center flex-column gap-4 mt-5">
            <input type="text" class="outlint-none rounded-sm w-50 h6 p-2 subcribe" placeholder="Example@gmail.com">
            <button type="submit" class="btn sub-btn">Subcribe</button>
        </div>
    </div>
@endsection
