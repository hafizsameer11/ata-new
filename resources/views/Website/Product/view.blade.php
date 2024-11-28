@extends('Website.Layout.layout')
@section('content')
    <div class="container">
        {{-- heading of product --}}
        <div class="d-flex align-items-center justify-content-between gap-2 p-5">
            <div class="">
                <h1 class="heading">The Sea of Kyoto E-Line</h1>
                <h6 class="d-flex align-items-center gap-2 text-secondary">
                    <i class="fa-solid fa-location-dot"></i>
                    Kansai
                </h6>
            </div>
            <div class="d-flex align-items-center gap-2 text-secondary">
                <i class="fa-solid fa-camera"></i>
                Gallery
            </div>
        </div>

        {{-- gallery images --}}
        <div class="w-100">
            <div class="swiper-product-view mt-4">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @for ($i = 0; $i < 5; $i++)
                        <div class="swiper-slide" style="background-image: url(https://fakeimg.pl/150x150/)">
                        </div>
                    @endfor
                </div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>
        </div>


        {{-- section detail --}}
        <section class="product-detail row p-4">
            <div class="detail d-flex flex-column gap-1 col-6 col-lg-2 my-4">
                <span style="font-weight: 700">Price</span>
                <span class="d-flex align-items-center gap-2"><span>From</span>
                    <h6 class="theme-text p-0 m-0">¥7,000.00</h6>
                </span>
            </div>
            <div class="detail d-flex align-items-center gap-2  col-6 col-lg-2 my-4">
                <div>
                    <i class="fa-regular fa-clock h2 theme-text"></i>
                </div>
                <div class="d-flex flex-column ">
                    <span class="heading">Duration</span>
                    <span class="text-secondary">1 day</span>
                </div>
            </div>
            <div class="detail d-flex align-items-center gap-2  col-6 col-lg-2 my-4">
                <div>
                    <i class="fa-solid fa-people-group h2 theme-text"></i>
                </div>
                <div class="d-flex flex-column ">
                    <span class="heading">Max People</span>
                    <span class="text-secondary">5</span>
                </div>
            </div>
            <div class="detail d-flex align-items-center gap-2  col-6 col-lg-2 my-4">
                <div>
                    <i class="fa-solid fa-child h2 theme-text"></i>
                </div>
                <div class="d-flex flex-column ">
                    <span class="heading">Min Age</span>
                    <span class="text-secondary">5+</span>
                </div>
            </div>
            <div class="detail d-flex align-items-center gap-2 col-6 col-lg-2 my-4 ">
                <div>
                    <i class="fa-solid fa-map h2 theme-text"></i>
                </div>
                <div class="d-flex flex-column ">
                    <span class="heading">Tour Type</span>
                    <span class="text-secondary">Activtity</span>
                </div>
            </div>
            <div class="detail d-flex flex-column gap-1 col-6 col-lg-2 my-4">
                <span style="font-weight: 700">Reviews</span>
                <span class="d-flex align-items-center gap-2">
                    No reviews yet
                </span>
            </div>
        </section>

        {{-- section description --}}
        <div class="row">
            <div class="col-lg-8 p-4 tabs-can">
                <div class="overview">
                    <div class="tabs">
                        <button class="tab-btn active" data-tab="overview">Overview</button>
                        <button class="tab-btn" data-tab="tour-plan">Tour Plan</button>
                        <button class="tab-btn" data-tab="price">Price</button>
                        <button class="tab-btn" data-tab="included-excluded">Included/Excluded</button>
                    </div>
                    <div class="content">
                        <div id="overview" class="tab-content active">
                            <h2>Overview</h2>
                            <p>This is the overview content.</p>
                        </div>
                        <div id="tour-plan" class="tab-content">
                            <h2>Tour Plan</h2>
                            <p>This is the tour plan content.</p>
                        </div>
                        <div id="price" class="tab-content">
                            <h2>Price</h2>
                            <p>This is the price content.</p>
                        </div>
                        <div id="included-excluded" class="tab-content">
                            <h2>Included/Excluded</h2>
                            <p>This is the included/excluded content.</p>
                        </div>
                    </div>
                </div>
                <div class="review-can mt-4">
                    <h1 class="heading">
                        Reviews
                    </h1>
                    <hr />
                    <div class="border user-review-can rounded p-4 mb-4">
                        @for ($i = 0; $i < 10; $i++)
                            <div class="user-review">
                                <div class="review-header" style="display: flex; align-items: center;gap:10px;">
                                    <i class="fa-solid fa-circle-user h3 p-0 m-0 theme-text"></i>
                                    <span class="text-secondary p-0 m-0">User Name</span>
                                </div>
                                <div class="review-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, dolor.
                                </div>
                            </div>
                        @endfor
                        <div class="user-review">
                            <p class="text-secondary">
                                No reviews yet
                            </p>
                        </div>
                    </div>
                    <div class="review-input">
                        <form>
                            <input type="hidden" name="star" id="star" class="star-can">
                            <span>
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </span>
                            <div class="review-inputCan mt-2">
                                <div class="">
                                    <input type="text" id="review" name="review" class="form-control"
                                        placeholder="Give your feedback">
                                </div>
                                <div>
                                    <button class="btn review-btn m-0 " type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-4 sidebar">
                <div class="card">
                    <div class="booking-line"></div>
                    <div class="card-header">
                        <h6 class="heading mt-2">Book This Tour</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="">
                            <input type="hidden" name="tour_id" value="1">
                            <div class="form-group d-flex align-items-center justify-content-between gap-4">
                                <label for="date">From</label>
                                {{-- date input --}}
                                <input type="date" id="date" name="date" class="form-control"
                                    placeholder="Select Date">
                            </div>
                            <hr>
                            <div class=" d-flex align-items-center justify-content-between gap-4">
                                <h6>Time:</h6>
                                <h6 id="timing">10:00 am</h6>
                            </div>
                            <hr />
                            <div class="">
                                <h6>Ticket: <span class="text-secondary">(5)</span></h6>
                                <div class="p-1" id="member-can" data-member-limit="10" data-per-member-price="100">
                                    <div
                                        class="ticket-gender d-flex align-items-center gap-2 justify-content-between my-2">
                                        <div>
                                            <h6 class="small-text">Adult (+18 years)</h6>
                                            <h6 class="small-text text-secondary heading">70,000</h6>
                                        </div>
                                        <select name="adult" id="adult" class="form-control w-25 member-select">

                                        </select>
                                    </div>
                                    <div
                                        class="ticket-gender d-flex align-items-center gap-2 justify-content-between my-2">
                                        <div>
                                            <h6 class="small-text">Youth (13 - 17 years)</h6>
                                            <h6 class="small-text text-secondary heading">70,000</h6>
                                        </div>
                                        <select name="youth" id="youth" class="form-control w-25 member-select">

                                        </select>
                                    </div>
                                    <div
                                        class="ticket-gender d-flex align-items-center gap-2 justify-content-between my-2">
                                        <div>
                                            <h6 class="small-text">Children (0 - 12 years)</h6>
                                            <h6 class="small-text text-secondary heading">70,000</h6>
                                        </div>
                                        <select name="children" id="children" class="form-control w-25 member-select">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between gap-4">
                                <h6>Total:</h6>
                                <h6 id="total-tour-price">0</h6>
                            </div>
                            <div class="mt-2">
                                <button class="btn book-btn w-100">
                                    book now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="heading">Download Itinerary</h4>
                        <button class="btn download-btn">
                            Download
                        </button>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="booking-line"></div>
                    <div class="card-header">
                        <h6 class="heading mt-2">Last Minutes Deals</h6>
                    </div>
                    <div class="card-body p-4">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="deals d-flex align-items-center gap-2">
                                <img src="https://fakeimg.pl/150x150/" alt="deals img" width="60" class="rounded">
                                <div class="deal-content">
                                    <h6 class="heading">Deal {{ $i + 1 }}</h6>
                                    <h5>$34,000</h5>
                                </div>
                            </div>
                            <hr>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.fa-star');
            const starInput = document.getElementById('star');

            stars.forEach((star, index) => {
                star.addEventListener('mouseover', () => {
                    highlightStars(index);
                });

                star.addEventListener('mouseout', () => {
                    resetStars();
                });

                star.addEventListener('click', () => {
                    starInput.value = index + 1; // Set the selected rating
                    highlightStars(index, true); // Persist selection
                });
            });

            function highlightStars(index, persist = false) {
                stars.forEach((star, i) => {
                    if (i <= index) {
                        star.classList.add('highlight');
                    } else {
                        star.classList.remove('highlight');
                    }
                });

                if (persist) {
                    stars.forEach((star, i) => {
                        if (i > index) {
                            star.classList.remove('persist-highlight');
                        } else {
                            star.classList.add('persist-highlight');
                        }
                    });
                }
            }

            function resetStars() {
                stars.forEach(star => {
                    if (!star.classList.contains('persist-highlight')) {
                        star.classList.remove('highlight');
                    }
                });
            }




            const memberContainer = document.getElementById('member-can');
            const totalPriceElement = document.getElementById('total-tour-price');
            const memberLimit = parseInt(memberContainer.dataset.memberLimit, 10); // Max limit for members
            const perMemberPrice = parseInt(memberContainer.dataset.perMemberPrice, 10); // Price per member
            const selects = memberContainer.querySelectorAll('.member-select');

            // Populate all selects with initial options
            function populateOptions() {
                selects.forEach(select => {
                    select.innerHTML = ''; // Clear existing options
                    for (let i = 0; i <= memberLimit; i++) {
                        const option = document.createElement('option');
                        option.value = i;
                        option.textContent = i;
                        select.appendChild(option);
                    }
                });
            }

            // Calculate and update the total price
            function calculateTotalPrice() {
                let totalMembers = 0;
                selects.forEach(select => {
                    totalMembers += parseInt(select.value, 10) || 0;
                });

                const totalPrice = totalMembers * perMemberPrice;
                totalPriceElement.textContent = totalPrice.toLocaleString(); // Format as a readable number
            }

            // Update options in other selects based on current selections
            function updateSelectOptions() {
                const selectedCounts = Array.from(selects).map(select => parseInt(select.value, 10) || 0);
                const totalSelected = selectedCounts.reduce((sum, count) => sum + count, 0);

                selects.forEach(select => {
                    const currentValue = parseInt(select.value, 10) || 0;
                    select.innerHTML = ''; // Clear options

                    const maxOptions = Math.min(memberLimit - (totalSelected - currentValue), memberLimit);

                    for (let i = 0; i <= maxOptions; i++) {
                        const option = document.createElement('option');
                        option.value = i;
                        option.textContent = i;
                        select.appendChild(option);
                    }

                    // Restore the current value if it's still valid
                    if (currentValue <= maxOptions) {
                        select.value = currentValue;
                    }
                });

                calculateTotalPrice(); // Recalculate total after updating options
            }

            // Add event listeners to update options dynamically
            selects.forEach(select => {
                select.addEventListener('change', updateSelectOptions);
            });

            // Initial population of options and total price calculation
            populateOptions();
            calculateTotalPrice();
        });
    </script>
@endpush
