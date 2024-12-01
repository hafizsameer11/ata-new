@extends('Website.Layout.layout')
@push('css')
    <style>
        .active>.page-link,
        .page-link.active {
            z-index: 3;
            color: var(--bs-pagination-active-color);
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-item:not(:first-child) .page-link {
            margin-left: 0;
        }

        .page-item:last-child {
            width: fit-content
        }
    </style>
@endpush
@section('content')
    {{-- section 1 --}}
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                {{ $name }}
            </h1>
        </div>
    </div>

    {{-- section 2 --}}
    @include('Website.Layout.components.filter')

    {{-- section 3 --}}
    <div class="my-5 container mx-auto">
        <div class="row">
            @forelse ($tours as $tour)
                <div class="col-6 col-md-6 col-lg-12 my-4 w-100">
                    <div class="shadow d-flex gap-2 rounded overflow-hidden w-100 act-tours">
                        <div class="">
                            <img src="{{ asset('storage/' . $tour->images[0]->image) }}" alt="Custom Placeholder Image"
                                class="tour-first-img w-100 h-100 tour-coverimg act-tour-img" style="object-fit: cover;">
                        </div>
                        <div class="p-2 w-100">
                            {{-- people , camera and calendar --}}
                            <div class="d-flex align-items-center justify-content-between act-day-time">
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
                                <p class="d-flex align-items-center gap-2 text-secondary act-country">
                                    <i class="fa-solid fa-location-dot"></i>
                                    {{ $tour->country->name }}
                                </p>
                                <h6 class="act-tour-description">
                                    {!! Str::words($tour->description, 15, '...') !!}
                                </h6>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between px-2 tour-description-price">
                                    <div>
                                        <h6 class="text-secondary">From</h6>
                                        <h5 class="price theme-text" style="font-weight: 800">$ {{ $tour->price }}</h5>
                                    </div>
                                    <a href="{{ route('product.view', base64_encode($tour->id)) }}"
                                        class="d-flex align-items-center gap-1 explore-tour" style="width: fit-content">
                                        Explore
                                        <i class="fa-solid fa-arrow-right theme-text"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="text-center">
                    <h4 class="text-secondary">No Tours Found</h4>
                </div>
            @endforelse
            <div>
                {{ $tours->links('pagination::simple-bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
