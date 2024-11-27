@extends('Website.Layout.layout')
@push('css')
@endpush
@section('content')
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                About Us
            </h1>
        </div>
    </div>

    {{-- section 2 --}}
    <div class="filter-bar container mb-4 shadow-lg p-0 overflow-hidden rounded">
        <div class="p-3 filter">
            <h3>
                <i class="fa-solid fa-location-dot"></i>
                Destinations
            </h3>
            <select name="destination" id="destination" class="form-control rounded-none">
                <option value="">All Destinations</option>
                <option value="japan">Japan</option>
                <option value="uk">Uk</option>
                <option value="china">China</option>
            </select>
        </div>
        <div class="p-3 filter">
            <h3>
                <i class="fa-solid fa-dollar-sign"></i>
                Price
            </h3>
            <select name="price" id="price" class="form-control rounded-none">
                <option value="">All Price</option>
                <option value="1000-2000">1000-2000</option>
                <option value="5000-10000">5000-10000</option>
            </select>
        </div>
        <div class="p-3 filter">
            <h3>
                <i class="fa-solid fa-calendar-days"></i>
                When
            </h3>
            <input type="date" name="when" id="when" class="form-control">
        </div>
        <div class="p-3 filter filter-dropdown" id="dropdown1">
            <h3 class="d-inline-flex gap-1">
                <a class="btn" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fa-solid fa-user-group"></i>
                    Guests <br>
                </a>
            </h3>
            <h6 id="guest_quantity" class="p-2 text-secondary">0</h6>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="d-flex align-items-center justify-content-between gap-2 w-100 mb-2">
                        <label for="male">Male</label>
                        <div class="d-flex align-items-center gap-1">
                            <button class="btn-minus" data-target="male">-</button>
                            <input type="text" id="male" class="number-input" readonly disabled value="0"
                                min="0" max="10">
                            <button class="btn-plus" data-target="male">+</button>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-2 w-100 mb-2">
                        <label for="female">Female</label>
                        <div class="d-flex align-items-center gap-1">
                            <button class="btn-minus" data-target="female">-</button>
                            <input type="text" id="female" class="number-input" readonly disabled value="0"
                                min="0" max="10">
                            <button class="btn-plus" data-target="female">+</button>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-2 w-100 mb-2">
                        <label for="children">Children</label>
                        <div class="d-flex align-items-center gap-1">
                            <button class="btn-minus" data-target="children">-</button>
                            <input type="text" id="children" class="number-input" readonly disabled value="0"
                                min="0" max="10">
                            <button class="btn-plus" data-target="children">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center filter filter-btn gap-2 p-3 mx-2 rounded">
            <button type="submit" style="all: unset">
                <i class="fa-solid fa-magnifying-glass"></i>
                Search
            </button>
        </div>
    </div>

    {{-- section 3 --}}
    <div class="container m-100 about-section-3">
        <div class="p-2">
            <img src="{{ asset('website/images/about_image-1.1.png') }}" alt="people img" class="mx-auto w-75 d-block">
        </div>
        <div class="">
            <h4 class="italic-font theme-text">About</h4>
            <h1 class="heading">We are a travel company in Singapore</h1>
            <p>
                ATA EVENT & VACATION HUB PaTE. LTD. is a registered company for events and vacations planning in Singapore.
                We
                provide customize and creative events and tours arrangement to our clients. We are one of the most
                established
                and reliable Travel Agencies in Singapore.Our company’s mission is to provide the best service and highest
                quality of events and travels services to our customers. We are a full-service agency, catering to everyone
                from
                backpackers to luxury travellers. Our greatest happiness comes from serving our customers who have
                experienced
                joys and satisfaction with our events and tours.ATA Event & Vacation Hub to expand its network to provide
                direct
                service contact in an ever-widening range of destination including outbound Worldwide events and vacation
                services as Event Planning Package, MICE, Tour Package, Free & Easy Tour, Air Ticketing, Hotel Booking,
                Transportation Services, Cruise and much more.
            </p>
        </div>
    </div>

    {{-- section 4 --}}
    <div class="container m-100 about-section-4">
        <h4 class="theme-text text-center italic-font">Why us</h4>
        <h1 class="heading text-center">We Make All The <br> Process Easy</h1>
        <div class="my-4 row g-3">
            <div class="d-flex flex-column gap-2 align-items-center justify-content-center text-center col-6 col-md-4 mt-5">
                <i class="h1 theme-text why-us-icon fa-solid fa-umbrella-beach"></i>
                <h4 class="heading">Attractive Tour Packages</h4>
            </div>
            <div
                class="d-flex flex-column gap-2 align-items-center justify-content-center text-center col-6 col-md-4 mt-5">
                <i class="h1 theme-text why-us-icon fa-solid fa-vault"></i>
                <h4 class="heading">Free & Easy</h4>
            </div>
            <div
                class="d-flex flex-column gap-2 align-items-center justify-content-center text-center col-6 col-md-4 mt-5">
                <i class="h1 theme-text why-us-icon fa-solid fa-ticket"></i>
                <h4 class="heading">Trust & Safety</h4>
            </div>
            <div
                class="d-flex flex-column gap-2 align-items-center justify-content-center text-center col-6 col-md-4 mt-5">
                <i class="h1 theme-text why-us-icon fa-regular fa-thumbs-up"></i>
                <h4 class="heading">Event Planning</h4>
            </div>
            <div
                class="d-flex flex-column gap-2 align-items-center justify-content-center text-center col-6 col-md-4 mt-5">
                <i class="h1 theme-text why-us-icon fa-solid fa-calendar-days"></i>
                <h4 class="heading">Deals & Promotions</h4>
            </div>
            <div
                class="d-flex flex-column gap-2 align-items-center justify-content-center text-center col-6 col-md-4 mt-5">
                <i class="h1 theme-text why-us-icon fa-solid fa-plane-departure"></i>
                <h4 class="heading">Transport Services</h4>
            </div>
        </div>
    </div>

    {{-- section 5 --}}
    <div class="w-100 m-100 mx-auto about-section-5"
        style="background-image: url({{ asset('website/images/about_image-1.2.jpg') }})">
        <div class="container row g-3 justify-content-center">
            <div
                class="d-flex flex-column text-light gap-2 align-items-center justify-content-center text-center col-6 col-md-3 mt-5">
                <i class="h1 fa-solid fa-paper-plane"></i>
                <h5 class="italic-font">Universal Studios Japan in Osaka</h5>
            </div>
            <div
                class="d-flex flex-column text-light gap-2 align-items-center justify-content-center text-center col-6 col-md-3 mt-5">
                <i class="h1 fa-solid fa-route"></i>
                <h5 class="italic-font">The Sea of Kyoto E-Line</h5>
            </div>
            <div
                class="d-flex flex-column text-light gap-2 align-items-center justify-content-center text-center col-6 col-md-3 mt-5">
                <i class="h1 fa-solid fa-suitcase-rolling"></i>
                <h5 class="italic-font">Nara and Uji</h5>
            </div>
            <div
                class="d-flex flex-column text-light gap-2 align-items-center justify-content-center text-center col-6 col-md-3 mt-5">
                <i class="h1 fa-solid fa-earth-americas"></i>
                <h5 class="italic-font">Tour of Shirahama Hot Springs</h5>
            </div>
        </div>
    </div>


    {{-- section 6 review --}}
    <div class="container m-100 about-section-6">
        <h4 class="theme-text text-center italic-font">Testimonials</h4>
        <h1 class="heading text-center">Customer Reviews</h1>
        <div class="w-50 mx-auto review-swiper">
            <div class="swiper about-swiper mt-4">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide d-flex flex-column align-items-center gap-2">
                        <h5>
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                            @endfor
                        </h5>
                        <p class="text-center px-4 heading">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, in alias, neque itaque amet
                            perspiciatis deserunt corporis iste voluptas, rem accusantium explicabo. Rerum provident
                            consequatur vero ipsa veniam fuga atque.
                        </p>
                        <p class="text-secondary">
                            3 months ago
                        </p>
                        <p class="text-center">
                            John wick
                        </p>
                    </div>
                    <div class="swiper-slide d-flex flex-column align-items-center gap-2">
                        <h5>
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                            @endfor
                        </h5>
                        <p class="text-center px-4 heading">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, in alias, neque itaque amet
                            perspiciatis deserunt corporis iste voluptas, rem accusantium explicabo. Rerum provident
                            consequatur vero ipsa veniam fuga atque.
                        </p>
                        <p class="text-secondary">
                            3 months ago
                        </p>
                        <p class="text-center">
                            John wick
                        </p>
                    </div>
                    <div class="swiper-slide d-flex flex-column align-items-center gap-2">
                        <h5>
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                            @endfor
                        </h5>
                        <p class="text-center px-4 heading">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, in alias, neque itaque amet
                            perspiciatis deserunt corporis iste voluptas, rem accusantium explicabo. Rerum provident
                            consequatur vero ipsa veniam fuga atque.
                        </p>
                        <p class="text-secondary">
                            3 months ago
                        </p>
                        <p class="text-center">
                            John wick
                        </p>
                    </div>
                    <div class="swiper-slide d-flex flex-column align-items-center gap-2">
                        <h5>
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star" style="color: yellow;"></i>
                            @endfor
                        </h5>
                        <p class="text-center px-4 heading">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, in alias, neque itaque amet
                            perspiciatis deserunt corporis iste voluptas, rem accusantium explicabo. Rerum provident
                            consequatur vero ipsa veniam fuga atque.
                        </p>
                        <p class="text-secondary">
                            3 months ago
                        </p>
                        <p class="text-center">
                            John wick
                        </p>
                    </div>
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
@endsection
