@extends('Website.Layout.layout')
@push('css')
    <style>
        #rooms-section .input-group button {
            width: 40px;
        }

        .room-details h6 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-check-label {
            font-size: 0.9rem;
        }

        #addToCart {
            margin-top: 10px;
        }

        /* Basic styling for collapsible container */
        .collapsible-container {
            width: 100%;
            /* margin: 20px; */
        }

        .collapsible {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .collapsible-button {
            width: 100%;
            padding: 10px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            text-align: left;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .collapsible-button:hover {
            background-color: var(--primary-color);
        }

        .collapsible-content {
            padding: 15px;
            display: none;
            /* Hide content by default */
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
        }

        /* Style for the active collapsible (when it's expanded) */
        .collapsible.active .collapsible-content {
            display: block;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        {{-- Heading of product --}}
        <div class="d-flex align-items-center justify-content-between gap-2 p-5">
            <div>
                <h1 class="heading">{{ $tour->name }}</h1>
                <h6 class="d-flex align-items-center gap-2 text-secondary">
                    <i class="fa-solid fa-location-dot"></i>
                    {{ $tour->country->name }}
                </h6>
            </div>
            <div class="d-flex align-items-center gap-2 text-secondary" id="openGallery" style="cursor: pointer">
                <i class="fa-solid fa-camera"></i>
                Gallery
            </div>
            <div id="gallery" style="display: none;">
                @foreach ($tour->images as $image)
                    <a href="{{ asset('storage/' . $image->image) }}" data-lightbox="mygallery"
                        data-title="Image {{ $loop->iteration }}">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="Image 1">
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Gallery Images --}}
        <div class="w-100">
            <div class="swiper-product-view mt-4">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($tour->images as $image)
                        <div class="swiper-slide" style="background-image: url({{ asset('storage/' . $image->image) }})">
                        </div>
                    @endforeach
                </div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>
        </div>

        {{-- Section Detail --}}
        <section class="product-detail row p-4">
            <div class="detail d-flex flex-column gap-1 col-6 col-lg-2 my-4">
                <span style="font-weight: 700">Price</span>
                <span class="d-flex align-items-center gap-2"><span>From</span>
                    <h6 class="theme-text p-0 m-0">${{ $tour->price }}</h6>
                </span>
            </div>
            <div class="detail d-flex align-items-center gap-2 col-6 col-lg-2 my-4">
                <div>
                    <i class="fa-regular fa-clock h2 theme-text"></i>
                </div>
                <div class="d-flex flex-column">
                    <span class="heading">Duration</span>
                    <span class="text-secondary">{{ $tour->duration }}</span>
                </div>
            </div>
            <div class="detail d-flex align-items-center gap-2 col-6 col-lg-2 my-4">
                <div>
                    <i class="fa-solid fa-people-group h2 theme-text"></i>
                </div>
                <div class="d-flex flex-column">
                    <span class="heading">Max People</span>
                    <span class="text-secondary">{{ $tour->max_member }}</span>
                </div>
            </div>
            <div class="detail d-flex align-items-center gap-2 col-6 col-lg-2 my-4">
                <div>
                    <i class="fa-solid fa-child h2 theme-text"></i>
                </div>
                <div class="d-flex flex-column">
                    <span class="heading">Min Age</span>
                    <span class="text-secondary">{{ $tour->min_age }}</span>
                </div>
            </div>
            <div class="detail d-flex align-items-center gap-2 col-6 col-lg-2 my-4">
                <div>
                    <i class="fa-solid fa-map h2 theme-text"></i>
                </div>
                <div class="d-flex flex-column">
                    <span class="heading">Tour Type</span>
                    <span class="text-secondary">{{ $tour->tour_type }}</span>
                </div>
            </div>
            <div class="detail d-flex flex-column gap-1 col-6 col-lg-2 my-4">
                <span style="font-weight: 700">Reviews</span>
                <span class="d-flex align-items-center gap-2">
                    5 reviews
                </span>
            </div>
        </section>

        {{-- Description and Sidebar --}}
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
                            <div>
                                {!! $tour->description !!}
                            </div>
                        </div>
                        <div id="tour-plan" class="tab-content">
                            <h2>Tour Plan</h2>
                            <div class="collapsible-container">
                                @foreach ($tour->plans as $plan)
                                    <div class="collapsible">
                                        <button class="collapsible-button">
                                            <span>{{ $plan->name }}</span>
                                            <span>{{ $plan->city }}</span>
                                        </button>
                                        <div class="collapsible-content">
                                            <div>
                                                {!! $plan->description !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="price" class="tab-content">
                            <h2>Price</h2>
                            <p>
                                Price: $ {{ $tour->price }}
                            </p>
                        </div>
                        <div id="included-excluded" class="tab-content">
                            <h2>Included/Excluded</h2>
                            <div>
                                {!! $tour->include !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-can mt-4">
                    <h1 class="heading">
                        Reviews
                    </h1>
                    <hr />
                    <div class="border user-review-can rounded p-4 mb-4">

                        <div class="user-review">
                            <div class="review-header" style="display: flex; align-items: center;gap:10px;">
                                <i class="fa-solid fa-circle-user h3 p-0 m-0 theme-text"></i>
                                <span class="text-secondary p-0 m-0">John Alex</span>
                            </div>
                            <div class="review-body">
                                This tour was absolutely fantastic! The guides were knowledgeable, and the scenery was
                                breathtaking. Highly recommend this experience to anyone looking for an adventure!
                            </div>
                        </div>
                    </div>
                    {{-- <div class="review-input">
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
                    </div> --}}
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4 p-4 sidebar">
                <div class="card">
                    <div class="booking-line"></div>
                    <div class="card-header">
                        <h6 class="heading mt-2">Book This Tour</h6>
                    </div>
                    <div class="card-body p-4">
                        <form>
                            @if ($tour->one_day)
                                <input type="hidden" name="plantour_id" id="plantour_id"
                                    value="{{ $tour->planTour->first()->id }}">
                                <div class="d-flex align-items-center justify-content-between gap-2 mb-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" value="{{ $tour->planTour->first()->date }}"
                                        id="date" required class="form-control">
                                </div>
                                <div class="d-flex align-items-center justify-content-between gap-2 mb-4">
                                    <label for="time">Time</label>
                                    <input type="time" name="time" id="time"
                                        value="{{ $tour->planTour->first()->time }}" readonly required
                                        class="form-control">
                                </div>
                                <hr>
                            @else
                                <div class="date-can">
                                    <div class="d-flex align-items-center justify-content-between gap-2 mb-4">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id="date" required
                                            class="form-control date-of-package">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between gap-2 mb-4">
                                        <label for="time">Time</label>
                                        <input type="time" name="time" id="time" readonly required
                                            class="form-control">
                                    </div>
                                </div>
                                <hr>
                            @endif
                            <input type="hidden" name="tour_id" value="1">

                            {{-- Ticket Section --}}
                            <div>
                                <h6>Ticket: <span class="text-secondary">(Max {{ $tour->max_member }} Members)</span></h6>
                                <div class="p-1" id="member-can" data-adult-price="{{ $tour->price }}"
                                    data-youth-price="{{ $tour->price }}" data-children-price="{{ $tour->price }}"
                                    data-max-members="{{ $tour->max_member }}">
                                    <div
                                        class="ticket-gender d-flex align-items-center gap-2 justify-content-between my-2">
                                        <div>
                                            <h6 class="small-text">Adult (+18 years)</h6>
                                        </div>
                                        <select name="adult" id="adult"
                                            class="form-control w-25 member-select"></select>
                                    </div>
                                    <div
                                        class="ticket-gender d-flex align-items-center gap-2 justify-content-between my-2">
                                        <div>
                                            <h6 class="small-text">Youth (13 - 17 years)</h6>
                                        </div>
                                        <select name="youth" id="youth"
                                            class="form-control w-25 member-select"></select>
                                    </div>
                                    <div
                                        class="ticket-gender d-flex align-items-center gap-2 justify-content-between my-2">
                                        <div>
                                            <h6 class="small-text">Children (0 - 12 years)</h6>
                                        </div>
                                        <select name="children" id="children"
                                            class="form-control w-25 member-select"></select>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            {{-- Room Section --}}
                            <div id="rooms-section">
                                <label class="heading mb-2" for="roomsNeeded">Rooms Needed</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-outline-secondary"
                                        id="decreaseRooms">-</button>
                                    <input type="number" id="roomsNeeded" class="form-control text-center"
                                        value="1" min="1" readonly>
                                    <button type="button" class="btn btn-outline-secondary"
                                        id="increaseRooms">+</button>
                                </div>
                                <div id="roomsDetails" data-adult-single-price="{{ $tour->single_room }}"
                                    data-adult-twin-price="{{ $tour->twin_room }}"
                                    data-child-with-bed-price="{{ $tour->child_room }}">
                                    <div class="room-details mb-3" id="room-1">
                                        <h6 class="heading">Room 1</h6>
                                        <div class="mb-2">
                                            <label for="adultSingle1" class="form-label">Adult (Single)*</label>
                                            <input type="number" class="form-control" id="adultSingle1" placeholder="0"
                                                min="0" value="0">
                                        </div>
                                        <div class="mb-2">
                                            <label for="adultTwin1" class="form-label">Adult
                                                (Twin/Triple/Quad)*</label>
                                            <input type="number" class="form-control" id="adultTwin1" placeholder="0"
                                                min="0" value="0">
                                        </div>
                                        <div class="mb-2">
                                            <label for="childWithBed1" class="form-label">Child with Bed</label>
                                            <input type="number" class="form-control" id="childWithBed1"
                                                placeholder="0" min="0" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex align-items-center justify-content-between gap-4">
                                <h6>Total:</h6>
                                <h6 class="total-tour-price">0</h6>
                                <input type="hidden" name="total" name="total" class="total-tour-price">
                            </div>
                            <div class="mt-2">
                                <button class="btn book-btn w-100">Book Now</button>
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
                        @foreach ($tours as $tour_deal)
                            <a href="{{ route('product.view', $tour_deal->id) }}">
                                <div class="deals d-flex align-items-center gap-2">
                                    <img src="https://fakeimg.pl/150x150/" alt="deals img" width="60"
                                        class="rounded">
                                    <div class="deal-content">
                                        <h6 class="heading">{{ $tour_deal->name }}</h6>
                                        <h5>$ {{ $tour_deal->price }}</h5>
                                    </div>
                                </div>
                            </a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const dateInput = document.querySelector('.date-of-package');
            const timeInput = document.querySelector('#time');

            dateInput.addEventListener('change', () => {
                const selectedDate = dateInput.value;

                if (selectedDate) {
                    // Make an AJAX request to fetch available times
                    fetch(`/get-available-times?date=${selectedDate}`)
                        .then(response => response.json())
                        .then(times => {
                            if (times.length > 0) {
                                // Set the first available time as default
                                timeInput.value = times;
                                console.log('Available times:', times);
                            } else {
                                alert('No available times for the selected date.');
                                timeInput.value = '';
                                // timeInput.setAttribute('readonly', true); // Disable the time input
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching times:', error);
                            alert('Unable to fetch available times. Please try again later.');
                        });
                } else {
                    timeInput.value = '';
                    timeInput.setAttribute('readonly', true); // Disable the time input
                }
            });

            const allowedDates = @json($tour->planTour->pluck('date')->toArray());
            console.log(allowedDates)

            flatpickr(".date-of-package", {
                enable: allowedDates, // Only allow these dates
                dateFormat: "Y-m-d", // Ensure this matches the format of your dates
                onValueUpdate: function(selectedDates, dateStr, instance) {
                    if (!allowedDates.includes(dateStr)) {
                        alert("This date is not available.");
                        instance.clear(); // Clear the invalid date
                    }
                }
            });


            const collapsibles = document.querySelectorAll('.collapsible');

            collapsibles.forEach(collapsible => {
                const button = collapsible.querySelector('.collapsible-button');
                button.addEventListener('click', function() {
                    // Close all collapsibles before opening the clicked one
                    collapsibles.forEach(otherCollapsible => {
                        if (otherCollapsible !== collapsible) {
                            otherCollapsible.classList.remove('active');
                        }
                    });

                    // Toggle the active state of the clicked collapsible
                    collapsible.classList.toggle('active');
                });
            });

            document.getElementById('openGallery').addEventListener('click', () => {
                const galleryLinks = document.querySelectorAll('#gallery a');
                if (galleryLinks.length > 0) {
                    galleryLinks[0].click(); // Opens the first image in the gallery
                }
            });
            lightbox.option({
                resizeDuration: 200,
                wrapAround: true
            });

            const roomsNeededInput = document.getElementById("roomsNeeded");
            const roomsDetails = document.getElementById("roomsDetails");
            const totalTourPriceElement = document.querySelectorAll(".total-tour-price");
            const ticketSelects = document.querySelectorAll(".member-select");
            const memberContainer = document.getElementById("member-can");

            const ticketPrices = {
                adult: parseInt(memberContainer.dataset.adultPrice, 10),
                youth: parseInt(memberContainer.dataset.youthPrice, 10),
                children: parseInt(memberContainer.dataset.childrenPrice, 10),
            };

            const roomPrices = {
                adultSingle: parseInt(roomsDetails.dataset.adultSinglePrice, 10),
                adultTwin: parseInt(roomsDetails.dataset.adultTwinPrice, 10),
                childWithBed: parseInt(roomsDetails.dataset.childWithBedPrice, 10),
            };

            const maxMembers = parseInt(memberContainer.dataset.maxMembers, 10);

            let roomCount = 1;

            const populateTicketOptions = () => {
                ticketSelects.forEach(select => {
                    select.innerHTML = '';
                    for (let i = 0; i <= maxMembers; i++) {
                        const option = document.createElement("option");
                        option.value = i;
                        option.textContent = i;
                        select.appendChild(option);
                    }
                });
            };
            const updateTicketOptions = () => {
                let totalSelected = 0;

                ticketSelects.forEach(select => {
                    totalSelected += parseInt(select.value || 0, 10);
                });

                ticketSelects.forEach(select => {
                    const currentValue = parseInt(select.value || 0, 10);
                    const remainingLimit = maxMembers - (totalSelected - currentValue);

                    select.innerHTML = '';

                    for (let i = 0; i <= remainingLimit; i++) {
                        const option = document.createElement("option");
                        option.value = i;
                        option.textContent = i;
                        select.appendChild(option);
                    }
                    if (currentValue <= remainingLimit) {
                        select.value = currentValue;
                    }
                });
                updateGrandTotal();
            };
            const calculateTicketTotal = () => {
                const adult = parseInt(document.getElementById("adult").value || 0, 10);
                const youth = parseInt(document.getElementById("youth").value || 0, 10);
                const children = parseInt(document.getElementById("children").value || 0, 10);

                return adult * ticketPrices.adult +
                    youth * ticketPrices.youth +
                    children * ticketPrices.children;
            };

            const calculateRoomTotal = () => {
                let total = 0;
                document.querySelectorAll(".room-details").forEach(room => {
                    const single = parseInt(room.querySelector("[id^='adultSingle']").value || 0, 10);
                    const twin = parseInt(room.querySelector("[id^='adultTwin']").value || 0, 10);
                    const childBed = parseInt(room.querySelector("[id^='childWithBed']").value || 0,
                        10);

                    total += single * roomPrices.adultSingle +
                        twin * roomPrices.adultTwin +
                        childBed * roomPrices.childWithBed;
                });
                return total;
            };

            const updateGrandTotal = () => {
                const ticketTotal = calculateTicketTotal();
                const roomTotal = calculateRoomTotal();
                const grandTotal = ticketTotal + roomTotal;
                totalTourPriceElement.forEach(e => {
                    // check if its input or h6
                    if (e.tagName === "INPUT") {
                        e.value = grandTotal;
                    } else {
                        e.textContent = "$ " + grandTotal;
                    }
                })
            };

            const addRoom = () => {
                roomCount++;
                const room = document.createElement("div");
                room.className = "room-details mb-3";
                room.id = `room-${roomCount}`;
                room.innerHTML = `
            <h6 class="heading">Room ${roomCount}</h6>
            <div class="mb-2">
                <label>Adult (Single)*</label>
                <input type="number" class="form-control" id="adultSingle${roomCount}" value="0" min="0">
            </div>
            <div class="mb-2">
                <label>Adult (Twin/Triple/Quad)*</label>
                <input type="number" class="form-control" id="adultTwin${roomCount}" value="0" min="0">
            </div>
            <div class="mb-2">
                <label>Child with Bed</label>
                <input type="number" class="form-control" id="childWithBed${roomCount}" value="0" min="0">
            </div>`;
                roomsDetails.appendChild(room);
                attachListeners(room);
            };

            const attachListeners = (room) => {
                room.querySelectorAll("input[type='number']").forEach(input => {
                    input.addEventListener("input", updateGrandTotal);
                });
            };

            document.getElementById("increaseRooms").addEventListener("click", () => {
                roomsNeededInput.value++;
                addRoom();
            });

            document.getElementById("decreaseRooms").addEventListener("click", () => {
                if (roomCount > 1) {
                    roomsNeededInput.value--;
                    document.getElementById(`room-${roomCount}`).remove();
                    roomCount--;
                    updateGrandTotal();
                }
            });

            ticketSelects.forEach(select => select.addEventListener("change", updateTicketOptions));
            populateTicketOptions();
            attachListeners(document.getElementById("room-1"));
            updateGrandTotal();
        });
    </script>
@endpush
