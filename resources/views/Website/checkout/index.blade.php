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
                        <input type="text" placeholder="Name" name="name" class="form-control">
                        <input type="text" placeholder="Email"name="email" class="form-control">
                        <input type="text" placeholder="phone" name="phone" class="form-control">
                        <input type="text" placeholder="Region" name="region" class="form-control">
                        <input type="text" placeholder="Postal/Zip" name="region" class="form-control">
                        <textarea name="address" class="form-control" placeholder="Address"></textarea>
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
