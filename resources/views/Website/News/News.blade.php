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
    @include('Website.Layout.components.filter')

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
                    <h6 class="text-center heading mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem
                        dolorum alias vero quos dolorem laudantium itaque fugit ratione dolores culpa.</h6>
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
