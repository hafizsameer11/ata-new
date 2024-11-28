@extends('Website.Layout.layout')

@section('content')
    {{-- section 1 --}}
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                Checkout
            </h1>
        </div>
    </div>
    <div class="container">

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

        <div class="row mt-5">
            <div class="col-lg-8 p-4 tabs-can card">
                <h1 class="vard heading">Checkout</h1>
                <h2 class="vard heading">Order #241128-175849926</h2>
                <hr>
                <div class="book-tour d-flex gap-2 justify-content-between">
                    <div class="d-flex flex-column flex-md-row gap-2">
                        <div class="">
                            <img src="https://fakeimg.pl/150x150/" alt="deals img" width="100" class="rounded">
                        </div>
                        <div>
                            <h6 class="heading">
                                <a href="">The Sea of Kyoto E-Line</a>
                            </h6>
                            <h6><span class="pr-2">Date:</span> <span class="text-secondary">November 29, 2024</span>
                            </h6>
                            <h6><span class="pr-2">Time:</span> <span class="text-secondary">10:00 am</span> </h6>
                            <h6><span class="pr-2">Duration:</span> <span class="text-secondary">1 day</span> </h6>
                            <h6>
                                Tickets:
                                <h5>Youth x3= ¥21,000.00</h5>
                            </h6>

                        </div>
                    </div>
                    <div>
                        <h6 class="heading">Total: <h5>$45,000</h5>
                        </h6>
                    </div>
                </div>
                <hr>
                <div class=" d-flex justify-content-end">
                    <div class="d-flex flex-column gap-2">
                        <h6><span class="heading">Subtotal:</span> ¥21,000.00</h6>
                        <h6><span class="heading">Total:</span> ¥21,000.00</h6>
                        <h6><span class="heading">Amount Paid:</span> ¥0.00</h6>
                        <h6><span class="heading">Amount Due:</span> <span class="theme-text">¥21,000.00</span></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-4 sidebar  mt-2">
                <h1 class="vard heading">Contact info</h1>
                <div class="mt-4">
                    <form action="" class="d-flex flex-column gap-2">
                        <input type="text" placeholder="Name" class="form-control">
                        <input type="text" placeholder="Email" class="form-control">
                        <input type="text" placeholder="phone" class="form-control">
                    </form>
                </div>
                <div class="d-flex align-items-center gap-2 p-1 my-2">
                    <h6 class="text-secondary">Amount to Pay:</h6>
                    <h6 class="theme-text">¥21,000.00</h6>
                </div>
                <hr>
                <div>
                    <h3 class="vard heading">Payment Method</h3>
                    <h6 class="small-text theme-text">Pay Later</h6>
                </div>
                <div class="d-flex align-items-center gap-2 gap-1">
                    <input type="checkbox" id="items_accept" name="items_accept" class="form-checkbox">
                    <label for="items_accept">I read and agree to the terms & conditions</label>
                </div>
                <button class="book-btn btn w-100 my-4">
                    Complete My Order
                </button>
            </div>
        </div>
    </div>
@endsection
