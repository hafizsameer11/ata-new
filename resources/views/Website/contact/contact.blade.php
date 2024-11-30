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
@section('css')
<style>
    /* Filter Bar Container */
.filter-bar {
    background-color: #f8f9fa; /* Light background */
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 8px;
}

/* Filter Item */
.filter {
    display: flex;
    align-items: center;
    flex: 1;
    gap: 10px;
    border-right: 1px solid #ddd; /* Divider between filters */
    padding: 10px;
}

.filter:last-child {
    border-right: none; /* Remove border for the last filter */
}


/* Filter Title */
.filter-title {
    font-size: 20px !important;
    font-weight: 900 !important;
    color: #333;
    margin-bottom: 2px;
}

/* Dropdowns and Inputs */
.filter select,
.filter input {
    border: none;
    outline: none;
    font-size: 0.85rem;
    color: #999;
    width: 100%;
}

.filter select:focus,
.filter input:focus {
    box-shadow: none;
}

/* Guests Counter */
#guest_quantity {
    font-size: 0.85rem;
    font-weight: bold;
    color: #333;
}

/* Search Button */
.filter-btn {
    flex-shrink: 0;
}
.filter-bar .form-control {
    outline: none !important; /* Removes the outline property */
}
.bol{
    border-top-right-radius: 10px!important;  /* Top-right corner */
  border-bottom-right-radius: 10px!important;  /* Bottom-right corner */
}
</style>
@endsection

@section('content')
    
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                Contact Us
            </h1>
        </div>
    </div>

{{-- section 2 --}}
<div class="filter-bar container mb-4 shadow-lg p-3 rounded">
    <!-- Destinations -->
    <div class="filter d-flex justify-content-center align-items-center">
        <i style="color: #EE1C25" class="fa-solid fs-5 fa-location-dot icon-red"></i>
        <div class="ms-3">
            <h6 class="filter-title fs-5 fw-bold">Destinations</h6>
            <select name="destination" id="destination" class="form-control pe-5 ps-1 py-2 border-0 p-0">
                <option value="">Where are you going?</option>
                <option value="japan">Japan</option>
                <option value="uk">UK</option>
                <option value="china">China</option>
            </select>
        </div>
    </div>

    <!-- Price Range -->
    <div class="filter d-flex align-items-center">
        <i style="color: #EE1C25" class="fa-solid fs-5 ps-3 fa-dollar-sign icon-red"></i>
        <div class="ms-3">
            <h6 class="filter-title fs-5 fw-bold">Price Range</h6>
            <select name="price" id="price" class="form-control ps-1 pe-5 py-2 border-0 p-0">
                <option value="">All Prices</option>
                <option value="1000-2000">1000-2000</option>
                <option value="5000-10000">5000-10000</option>
            </select>
        </div>
    </div>

    <!-- When -->
    <div class="filter d-flex align-items-center">
        <i style="color: #EE1C25" class="fa-solid fs-5 ps-3 fa-calendar-days icon-red"></i>
        <div class="ms-3">
            <h6 class="filter-title fs-5 fw-bold">When</h6>
            <input type="date" name="when" id="when" class="form-control pe-5 ps-1 py-2  border-0 p-0">
        </div>
    </div>

    <!-- Guests -->
    <div class=" d-flex align-items-center filter-dropdown" id="dropdown1">
        <h3 class="filter-title fs-5 fw-bold gap-1">
            <a class="btn fs-5 fw-bold" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                aria-controls="collapseExample">
                <i style="color: #EE1C25" class="fa-solid fs-5 fa-user-group icon-red"></i>
                Guests <br>
            </a>
        </h3>
        <br>
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

    <!-- Search Button -->
    <div style="background-color:#EE1C25 " class="btn bol d-flex justify-content-center align-items-center py-2">
        <button type="submit" class="btn text-white">
            <i class="fa-solid ps-3 fs-5 fa-magnifying-glass"></i>
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
                <!-- Right Column - Contact Info and Map -->
              
            </div>
        </section>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endpush
