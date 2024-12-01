@extends('Website.Layout.layout')
@section('content')
    {{-- section 1 --}}
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                {{ $new->name }}
            </h1>
        </div>
    </div>

    {{-- section 2 --}}
    @include('Website.Layout.components.filter')

    {{-- section 3 --}}
    <div class="container my-5 row mx-auto">
       <img src="{{asset('storage/'.$new->image)}}" alt="iamge" class="w-100">
       <div class="mt-4">
            <h1>{{ $new->title }}</h1>
            <div class="">
                    {!! $new->description !!}
            </div>
       </div>
    </div>
@endsection
