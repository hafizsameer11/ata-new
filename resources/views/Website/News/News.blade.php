@extends('Website.Layout.layout')

@section('content')
    {{-- section 1 --}}
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                News
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
    <div class="container my-5 row mx-auto">
        <div class="col-6 col-lg-4 p-2">
            <div class="card p-2 d-flex flex-column gap-2 h-100 justify-content-between">
                <div>
                    <img src="{{ asset('website/images/about-pic-1.jpg') }}" alt="news img" class="rounded w-100"
                        style="height: 200px;object-fit: cover;">
                    <h6 class="text-center heading mt-3">Separated they live in Bookmarksgrove</h6>
                </div>
                <div class="card-footer-read rounded">
                    <a href="">
                        Read more
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 p-2">
            <div class="card p-2 d-flex flex-column gap-2 h-100 justify-content-between">
                <div>
                    <img src="{{ asset('website/images/about-pic-1.jpg') }}" alt="news img" class="rounded w-100"
                        style="height: 200px;object-fit: cover;">
                    <h6 class="text-center heading mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem dolorum alias vero quos dolorem laudantium itaque fugit ratione dolores culpa.</h6>
                </div>
                <div class="card-footer-read rounded">
                    <a href="">
                        Read more
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 p-2">
            <div class="card p-2 d-flex flex-column gap-2 h-100 justify-content-between">
                <div>
                    <img src="{{ asset('website/images/about-pic-1.jpg') }}" alt="news img" class="rounded w-100"
                        style="height: 200px;object-fit: cover;">
                    <h6 class="text-center heading mt-3">Separated they live in Bookmarksgrove</h6>
                </div>
                <div class="card-footer-read rounded">
                    <a href="">
                        Read more
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 p-2">
            <div class="card p-2 d-flex flex-column gap-2 h-100 justify-content-between">
                <div>
                    <img src="{{ asset('website/images/about-pic-1.jpg') }}" alt="news img" class="rounded w-100"
                        style="height: 200px;object-fit: cover;">
                    <h6 class="text-center heading mt-3">Separated they live in Bookmarksgrove</h6>
                </div>
                <div class="card-footer-read rounded">
                    <a href="">
                        Read more
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 p-2">
            <div class="card p-2 d-flex flex-column gap-2 h-100 justify-content-between">
                <div>
                    <img src="{{ asset('website/images/about-pic-1.jpg') }}" alt="news img" class="rounded w-100"
                        style="height: 200px;object-fit: cover;">
                    <h6 class="text-center heading mt-3">Separated they live in Bookmarksgrove</h6>
                </div>
                <div class="card-footer-read rounded">
                    <a href="">
                        Read more
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 p-2">
            <div class="card p-2 d-flex flex-column gap-2 h-100 justify-content-between">
                <div>
                    <img src="{{ asset('website/images/about-pic-1.jpg') }}" alt="news img" class="rounded w-100"
                        style="height: 200px;object-fit: cover;">
                    <h6 class="text-center heading mt-3">Separated they live in Bookmarksgrove</h6>
                </div>
                <div class="card-footer-read rounded">
                    <a href="">
                        Read more
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
