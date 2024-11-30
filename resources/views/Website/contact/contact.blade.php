@extends('Website.Layout.layout')

@push('css')
    <!-- Optionally add custom CSS here if needed -->
    
@endpush

@section('content')
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                Contact Us
            </h1>
        </div>
    </div>

    {{-- section 2 --}}
    @include('Website.Layout.components.filter')


    <!-- Main Section -->
    <section class="container py-5">
        <div class="row">
            <div class="col-lg-4  card p-4">
                <div class="contact-info-item mb-5 d-flex gap-1 pb-4">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h4 class="heading"> Address:</h4>
                        <span class="info-text">12 Woodlands Square Tower 1 #08-85, Singapore 737715</span>
                    </div>
                </div>
                <div class="contact-info-item mb-5 d-flex gap-1 pb-4">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <h4 class="heading">Phone No:</h4>
                        <span class="info-text">+65 9233 6029</span>
                    </div>
                </div>
                <div class="contact-info-item mb-5 d-flex gap-1 pb-4">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h4 class="heading"> Email:</h4>
                        <span class="info-text">sales@ataeventvacation.com</span>
                    </div>
                </div>
                <div class="contact-info-item mb-5 d-flex  gap-2 pb-4">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h4 class="heading">Time:</h4>
                        <span class="info-text">Mon - Sat: 09:30am-06:30pm</span>
                    </div>
                </div>
            </div>

            <!-- Left Column - Contact Form -->
            <div style="padding-left: 60px" class="col-lg-8">
                <h2 class="vard heading ">Send us a message</h2>
                <p>Need extra help with planning? Please get in contact with us!</p>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="flex-wrap d-flex" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 w-50 p-1">
                        <label for="FirstName" class="form-label">First Name</label>
                        <input type="text" name="FirstName"
                            class="form-control @error('FirstName') is-invalid @enderror" id="FirstName"
                            value="{{ old('FirstName') }}">
                        @error('FirstName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 w-50 p-1">
                        <label for="LastName" class="form-label">Last Name</label>
                        <input type="text" name="LastName"
                            class="form-control @error('LastName') is-invalid @enderror" id="LastName"
                            value="{{ old('LastName') }}">
                        @error('LastName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 w-50 p-1">
                        <label for="Email" class="form-label">Email Address</label>
                        <input type="email" name="Email" class="form-control @error('Email') is-invalid @enderror"
                            id="Email" value="{{ old('Email') }}">
                        @error('Email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 w-50 p-1">
                        <label for="PhoneNo" class="form-label">Phone Number</label>
                        <input type="text" name="PhoneNo" class="form-control @error('PhoneNo') is-invalid @enderror"
                            id="PhoneNo" value="{{ old('PhoneNo') }}">
                        @error('PhoneNo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 w-100">
                        <label for="Message" class="form-label">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="Message" rows="4">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->id() : 1 }}">
                    </div>

                    <button type="submit" style="background-color: #EE1C25 ;color:#fff" class="btn">Submit</button>
                </form>

            </div>
            <!-- Right Column - Contact Info and Map -->

        </div>
    </section>
@endsection
@push('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
@endpush
