@extends('Website.Layout.layout')
@push('css')
    <style>
        .destinations-can {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .destination {
            flex: 1 0 200px;
            border: 5px solid var(--primary-color);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 200px;
            border-radius: 50%;
            width: 200px;
            height: 200px;
            overflow: hidden;
        }

        .destination a img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .destination:hover a img {
            transform: scale(1.5);
        }
    </style>
@endpush
@section('content')
    {{-- section 1 --}}
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                Destination
            </h1>
        </div>
    </div>
    {{-- section 2 --}}
    @include('Website.Layout.components.filter')

    <div class="container my-5">

        <div class="destinations-can">
            @forelse ($destinations as $destination)
                <div class="destination p-4">
                    <img src="{{ asset('storage/' . $destination->image) }}" alt="">
                    <a href="{{ route('filterTour', base64_encode($destination->id)) }}"
                        style="all:unset;width: fit-content;text-align: center;color: white;font-size: 25px;font-weight:900;cursor: pointer">{{ $destination->name }}
                    </a>
                </div>
            @empty
            @endforelse
        </div>

    </div>
@endsection
