@extends('Website.Layout.layout')
@section('content')
    {{-- section 1 --}}
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                Activities
            </h1>
        </div>
    </div>

    {{-- section 2 --}}
    @include('Website.Layout.components.filter')

    {{-- section 3 --}}
    <div class="my-5 container mx-auto">
        <div class="row">
            @for ($i = 0; $i < 5; $i++)
                <div class="col-6 col-md-6 col-lg-12 my-4">
                    <div class="shadow d-flex gap-2 rounded overflow-hidden w-100 act-tours">
                        <div class="">
                            <img src="https://fakeimg.pl/150x150/" alt="Custom Placeholder Image"
                                class="tour-first-img w-100 h-100 tour-coverimg act-tour-img" style="object-fit: cover;">
                        </div>
                        <div class="p-2">
                            {{-- people , camera and calendar --}}
                            <div class="d-flex align-items-center justify-content-between act-day-time">
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
                            {{-- Heading --}}
                            <div>
                                <h4 class="heading">
                                    <a href="">
                                        Kyoto and Nara: Fawn Experience A-Line
                                    </a>
                                </h4>
                                <p class="d-flex align-items-center gap-2 text-secondary act-country">
                                    <i class="fa-solid fa-location-dot"></i>
                                    Kansai
                                </p>
                                <h6 class="act-tour-description">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur rem, nihil saepe
                                    qui enim sequi aut quod placeat odit obcaecati.
                                </h6>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between px-2 tour-description-price">
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
            @endfor
        </div>
    </div>
@endsection
