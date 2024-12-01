@extends('Website.Layout.layout')

@section('content')
<div class="p-4">
    @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
</div>
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

    {{-- show error session --}    {{-- section 2 --}}
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

    {{-- login  --}}
    <div class="modal fade {{ $errors->has('username') || $errors->has('password') ? 'show' : '' }}" id="loginModal"
        tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true"
        style="{{ $errors->has('username') || $errors->has('password') ? 'display: block;' : '' }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="usernameOrEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="usernameOrEmail" name="email"
                                value="{{ old('username') }}" required>
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
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
                            class="text-decoration-none">Don't
                            have a account?Sign up now</a>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.signup') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm
                                Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Sign
                            Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- end --}}

    {{-- section 4 --}}
    <div class="container section-4">
        <h3 class="text-center italic-font theme-text">What’s new</h3>
        <h1 class="text-center">Popular Tours</h1>
        <div class="tour-gallery mt-5">
            <div class="row g-3">
                {{-- {{ Str::words($description, 20, '...') }} for description --}}
                @foreach ($tours as $tour)
                    {{-- if the loop is first --}}
                    @if ($loop->first)
                        <div class="col-12 col-lg-8 p-1">
                            <div class="shadow d-flex gap-2 rounded overflow-hidden" id="first-tour">
                                <div class="">
                                    <img src="{{ asset('storage/' . $tour->images[0]->image) }}"
                                        alt="Custom Placeholder Image" class="tour-first-img w-100 h-100 tour-coverimg"
                                        style="object-fit: cover;">
                                </div>
                                <div class="p-2">
                                    {{-- people , camera and calendar --}}
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class='left d-flex align-items-center gap-2'>
                                            <p>
                                                <i class="fa-regular fa-calendar-days theme-text"></i>
                                                <span class="san">{{ $tour->duration }}</span>
                                            </p>
                                            <p>
                                                <i class="fa-solid fa-user-group theme-text"></i>
                                                <span class="san">{{ $tour->max_member }}</span>
                                            </p>
                                        </div>
                                        <div class="right">
                                            <p>
                                                <i class="fa-solid fa-camera text-secondary"></i>
                                                <span class="san">{{ $tour->images->count() }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Heading --}}
                                    <div>
                                        <h4 class="heading">
                                            <a href="">
                                                {{ $tour->name }}
                                            </a>
                                        </h4>
                                        <p class="d-flex align-items-center gap-2 text-secondary">
                                            <i class="fa-solid fa-location-dot"></i>
                                            {{ $tour->country->name }}
                                        </p>
                                        <h6>
                                            {!! Str::words($tour->description, 10, '...') !!}
                                        </h6>
                                        <hr>
                                        <div class="d-flex align-items-center justify-content-between px-2">
                                            <div>
                                                <h6 class="text-secondary">From</h6>
                                                <h5 class="price theme-text" style="font-weight: 800">
                                                    ${{ $tour->price }}</h5>
                                            </div>
                                            <a href="{{ route('product.view', base64_encode($tour->id)) }}"
                                                class="d-flex align-items-center gap-1 explore-tour"
                                                style="width: fit-content">
                                                Explore
                                                <i class="fa-solid fa-arrow-right theme-text"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-6 p-1  col-md-6 col-lg-4">
                            <div class="rounded-lg shadow tour-card">
                                <img src="{{ asset('storage/' . $tour->images[0]->image) }}"
                                    alt="Custom Placeholder Image" class="w-100 h-100 tour-coverimg"
                                    style="object-fit: cover;max-height: 200px">
                                <div
                                    class="d-flex align-items-center justify-content-between shadow p-2 rounded tour-desc">
                                    <div class="d-flex align-items-center gap-2">
                                        <p class="p-0 m-0">
                                            <i class="fa-regular fa-calendar-days theme-text"></i>
                                            <span class="san">{{ $tour->duration }}</span>
                                        </p>
                                        <p class="p-0 m-0">
                                            <i class="fa-solid fa-user-group theme-text"></i>
                                            <span class="san">{{ $tour->max_member }}</span>
                                        </p>
                                    </div>
                                    <div class="right">
                                        <p class="p-0 m-0">
                                            <i class="fa-solid fa-camera text-secondary"></i>
                                            <span class="san">{{ $tour->images->count() }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 px-4 py-2 tour-info">
                                    <h4 class="heading">
                                        <a href="">
                                            {{ $tour->name }}
                                        </a>
                                        </h1>
                                        <p class="d-flex align-items-center gap-2 text-secondary tour-location">
                                            <i class="fa-solid fa-location-dot"></i>
                                            {{ $tour->country->name }}
                                        </p>
                                        <hr class="my-2" />
                                        <div
                                            class="d-flex align-items-center justify-content-between px-2 tour-price-desc">
                                            <div>
                                                <h6 class="text-secondary">From</h6>
                                                <h5 class="price theme-text" style="font-weight: 800">
                                                    ${{ $tour->price }}</h5>
                                            </div>
                                            <a href="{{ route('product.view', base64_encode($tour->id)) }}"
                                                class="d-flex align-items-center gap-1 explore-tour"
                                                style="width: fit-content">
                                                Explore
                                                <i class="fa-solid fa-arrow-right theme-text"></i>
                                            </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- <div class="col-6 p-1  col-md-6 col-lg-4">
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
                </div> --}}
            </div>

        </div>
    </div>

    {{-- section 5 --}}
    <div class="container section-4">
        <h3 class="text-center italic-font theme-text">Places to go</h3>
        <h1 class="text-center">Perfect Destination</h1>
        <div class="w-75 row g-4 mx-auto mt-4 tour-destinations">
            {{-- get only 6 from array foreach --}}
            @foreach ($destinations->take(8) as $item)
                <div class=" col-4 col-md-3 ">
                    <h6 class="d-flex align-items-center gap-2">
                        <span style="font-weight: 700">{{ $item->name }}</span>
                        <span class="tour_no text-secondary">({{ $item->tours->count() }})</span>
                    </h6>
                </div>
            @endforeach
        </div>
        <div class="swiper mt-4">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($destinations as $item)
                    <div class="swiper-slide" style="background-image: url({{ asset('storage/' . $item->image) }})">
                        <a href="">
                            <h1>{{ $item->name }}</h1>
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
            <div class="w-50" data-last-date="{{ $latest_tour->date }}" data-time={{ $latest_tour->time }}>
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
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const countdownContainer = document.querySelector('.w-50');
            const lastDate = countdownContainer.getAttribute('data-last-date'); // Get the date
            const lastTime = countdownContainer.getAttribute('data-time'); // Get the time

            // Combine date and time into a single datetime string
            const targetDateTime = new Date(`${lastDate}T${lastTime}`);

            // Function to calculate and update the countdown
            function updateCountdown() {
                const now = new Date();
                const timeRemaining = targetDateTime - now;

                if (timeRemaining <= 0) {
                    // If time is up, stop the timer
                    clearInterval(timer);
                    countdownContainer.querySelector('.remaining-timing').innerHTML = `
                <h2 class="text-center text-danger">Time's Up!</h2>
            `;
                    return;
                }

                // Calculate days, hours, minutes, and seconds
                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                // Update the DOM with the calculated values
                const timeElements = countdownContainer.querySelectorAll('.remaining-timing .theme-text');
                const labels = countdownContainer.querySelectorAll('.remaining-timing h6');

                timeElements[0].textContent = days;
                labels[0].textContent = days === 1 ? "Day" : "Days";

                timeElements[1].textContent = hours;
                labels[1].textContent = hours === 1 ? "Hour" : "Hours";

                timeElements[2].textContent = minutes;
                labels[2].textContent = minutes === 1 ? "Min" : "Mins";

                timeElements[3].textContent = seconds;
                labels[3].textContent = seconds === 1 ? "Sec" : "Secs";
            }

            // Run the updateCountdown function every second
            const timer = setInterval(updateCountdown, 1000);

            // Initial call to display the timer immediately
            updateCountdown();
        });
    </script>
@endpush
