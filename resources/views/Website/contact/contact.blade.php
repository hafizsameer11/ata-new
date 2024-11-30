@extends('Website.Layout.layout')

@push('css')
<!-- Optionally add custom CSS here if needed -->
<style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
    .contact-info-item {
        margin-bottom: 15px;
        border-bottom: 1px solid #e5e5e5;
    }
    .contact-info-item i {
        color: red;
        margin-right: 10px;
    }
    .contact-info-item .info-text {
        color: #333;
        font-size: 16px;
        padding-left: 30px
    }
    .fas{
        font-size: 28px
    }
</style>
@endpush

@section('content')
    
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                Contact Us
            </h1>
        </div>
    </div>

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

        <!-- Main Section -->
        <section class="container py-5">
            <div class="row">     
                    <div class="col-lg-4  card p-4">
                        <div class="contact-info-item mb-5">
                           
                            <h4 class="heading d-flex align-items-center  gap-2"> <i class="fas fa-map-marker-alt"></i>Address:</h4>
                            <span class="info-text">12 Woodlands Square Tower 1 #08-85, Singapore 737715</span>
                        </div>
                        <div class="contact-info-item mb-5">
                            <h4 class="heading d-flex align-items-center  gap-2"> <i class="fas fa-phone-alt"></i>Phone No:</h4>
                            <span class="info-text">+65 9233 6029</span>
                        </div>
                        <div class="contact-info-item mb-5">
                           
                            <h4 class="heading d-flex align-items-center  gap-2"> <i class="fas fa-envelope"></i>Email:</h4>
                            <span class="info-text">sales@ataeventvacation.com</span>
                        </div>
                        <div class="contact-info-item mb-5">
                            
                            <h4 class="heading d-flex align-items-center  gap-2"><i class="fas fa-clock"></i>Time:</h4>
                            <span class="info-text">Mon - Sat: 09:30am-06:30pm</span>
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
                <input type="text" name="FirstName" class="form-control @error('FirstName') is-invalid @enderror" id="FirstName" value="{{ old('FirstName') }}">
                @error('FirstName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3 w-50 p-1">
                <label for="LastName" class="form-label">Last Name</label>
                <input type="text" name="LastName" class="form-control @error('LastName') is-invalid @enderror" id="LastName" value="{{ old('LastName') }}">
                @error('LastName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3 w-50 p-1">
                <label for="Email" class="form-label">Email Address</label>
                <input type="email" name="Email" class="form-control @error('Email') is-invalid @enderror" id="Email" value="{{ old('Email') }}">
                @error('Email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3 w-50 p-1">
                <label for="PhoneNo" class="form-label">Phone Number</label>
                <input type="text" name="PhoneNo" class="form-control @error('PhoneNo') is-invalid @enderror" id="PhoneNo" value="{{ old('PhoneNo') }}">
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
                <div class="col-lg-12 m-4">
                    <div id="map" style="width: 100%; height: 500px;"></div>
                </div>
                <!-- Right Column - Contact Info and Map -->
              
            </div>
        </section>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function initMap() {
        const location = { lat: 1.4367, lng: 103.7855 }; // Example coordinates
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: location
        });
        const marker = new google.maps.Marker({
            position: location,
            map: map,
            title: "ATA Travel"
        });
    }
    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>



@endpush
