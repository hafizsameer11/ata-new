@extends('Admin.index')
@section('content')
    <div class="container mt-4">
        <h1>Edit Tour</h1>
    </div>
    <div class="container my-5">
        <form id="tourForm" action="{{ route('tours.update', $tour->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 p-2">
                    <div class="card p-4">
                        <h1>The Detail</h1>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="country_id">Destination</label>
                                    <select class="form-control @error('country_id') is-invalid @enderror" id="country_id"
                                        name="country_id">
                                        <option value="">Select Destination</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id', $tour->country_id) == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="name">Tour Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $tour->name) }}"
                                        placeholder="Enter tour name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="tour_type">Tour Type</label>
                                    <input type="text" class="form-control @error('tour_type') is-invalid @enderror"
                                        id="tour_type" name="tour_type" value="{{ old('tour_type', $tour->tour_type) }}"
                                        placeholder="Enter tour type (e.g., Adventure)" required>
                                    @error('tour_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="duration">Duration</label>
                                    <input type="text" class="form-control @error('duration') is-invalid @enderror"
                                        id="duration" name="duration" value="{{ old('duration', $tour->duration) }}"
                                        placeholder="Enter duration (e.g., 3 days)" required>
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="max_member">Max Members</label>
                                    <input type="number" class="form-control @error('max_member') is-invalid @enderror"
                                        id="max_member" name="max_member"
                                        value="{{ old('max_member', $tour->max_member) }}" placeholder="Enter max members"
                                        required>
                                    @error('max_member')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="min_age">Minimum Age</label>
                                    <input type="number" class="form-control @error('min_age') is-invalid @enderror"
                                        id="min_age" name="min_age" value="{{ old('min_age', $tour->min_age) }}"
                                        placeholder="Enter minimum age" required>
                                    @error('min_age')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="description">Description</label>
                            <textarea class="form-control bg-light @error('description') is-invalid @enderror" id="description" name="description"
                                rows="3" required>{{ old('description', $tour->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="include">Includes</label>
                            <textarea class="form-control @error('include') is-invalid @enderror" id="include" name="include" rows="2"
                                required>{{ old('include', $tour->include) }}</textarea>
                            @error('include')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card p-4">
                        <h1>The Plans</h1>
                        <div id="plan-container">
                            @foreach ($tour->plans as $index => $plan)
                                <input type="hidden" name="plan_id[]" id="plan_id" value="{{ $plan->id }}">
                                <div class="plan-can">
                                    <div class="form-group mb-2">
                                        <label for="plan_name_{{ $index }}">Plan Name</label>
                                        <input type="text" name="plan_name[]" id="plan_name_{{ $index }}"
                                            class="form-control @error('plan_name.' . $index) is-invalid @enderror"
                                            value="{{ old('plan_name.' . $index, $plan->name) }}" required>
                                        @error('plan_name.' . $index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="plan_description_{{ $index }}">Plan Description</label>
                                        <textarea name="plan_description[]" id="plan_description_{{ $index }}"
                                            class="form-control @error('plan_description.' . $index) is-invalid @enderror" rows="3" required>{{ old('plan_description.' . $index, $plan->description) }}</textarea>
                                        @error('plan_description.' . $index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="city_{{ $index }}">City</label>
                                        <input type="text" name="city[]" id="city_{{ $index }}"
                                            class="form-control @error('city.' . $index) is-invalid @enderror"
                                            value="{{ old('city.' . $index, $plan->city) }}" required>
                                        @error('city.' . $index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-plan" class="btn btn-primary mt-3 w-100">Add Another
                            Plan</button>
                    </div>
                </div>

                <div class="col-md-4 p-2">
                    <div class="p-4 card mb-4">
                        <h1>Room Price</h1>
                        <div class="form-group mb-4">
                            <label for="single_room">Single Room</label>
                            <input type="number" name="single_room" id="single_room"
                                class="form-control @error('single_room') is-invalid @enderror"
                                value="{{ old('single_room', $tour->single_room) }}" required>
                            @error('single_room')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="twin_room">Twin Room</label>
                            <input type="number" name="twin_room" id="twin_room"
                                class="form-control @error('twin_room') is-invalid @enderror"
                                value="{{ old('twin_room', $tour->twin_room) }}" required>
                            @error('twin_room')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="child_room">Child Room</label>
                            <input type="number" name="child_room" id="child_room"
                                class="form-control @error('child_room') is-invalid @enderror"
                                value="{{ old('child_room', $tour->child_room) }}" required>
                            @error('child_room')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="p-4 card mb-4">
                        <h1>Ticket Detail</h1>
                        <hr>
                        <div class="form-group my-4">
                            <label for="price">Tour price:</label>
                            <input type="number" id="price" name="price" class="form-control"
                                value="{{ $tour->price }}" required placeholder="Enter total price per ticket">
                        </div>
                        <div class="form-group mb-4">
                            <label for="discount">Tour discount:</label>
                            <input type="number" id="discount" name="discount" class="form-control"
                                value="{{ $tour->discount }}" required placeholder="Enter discount perentage (10%,5%)">
                        </div>
                        {{-- <div class="form-group mb-4">
                            <label for="date">Tour Date:</label>
                            <input type="date" id="date" name="date" class="form-control"
                                value="{{ $tour->date }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="time">Tour Time:</label>
                            <input type="time" id="time" name="time" class="form-control"
                                value="{{ $tour->time }}" required>
                        </div> --}}
                    </div>
                    <div class="card p-4 mb-4">
                        <h1 class="">Tour Type</h1>
                        <hr>
                        <div class="">
                            <label for="one_day">Tour Type</label>
                            <select name="one_day" id="one_day" class="form-control">
                                <option value="0" {{ $tour->one_day ? '' : 'selected' }}>Package Tour</option>
                                <option value="1" {{ $tour->one_day ? 'selected' : '' }}>Free&Easy tour</option>
                            </select>
                        </div>
                    </div>
                    <div class="card p-4 mb-4">
                        <h1 class="mb-4">Tour Dates</h1>
                        @forelse ($tour->planTour as $planDate)
                        <input type="hidden" name="plantour_id[]" id="plantour_id" value="{{$planDate->id}}">
                            <h6 class="mt-4">Date {{ $loop->iteration }}</h6>
                            <div class="date-can {{ $loop->first ? '' : 'mt-4' }}">
                                <div class="">
                                    <label for="date">Date</label>
                                    <input type="date" name="date[]" value="{{ $planDate->date }}"
                                        class="date form-control">
                                </div>
                                <div class="">
                                    <label for="time">Time</label>
                                    <input type="time" name="time[]" value="{{ $planDate->time }}"
                                        class="time form-control">
                                </div>
                            </div>
                        @empty
                            <div class="date-can mt-4">
                                <div class="">
                                    <label for="date">Date</label>
                                    <input type="date" name="date[]" class="date form-control">
                                </div>
                                <div class="">
                                    <label for="time">Time</label>
                                    <input type="time" name="time[]" class="time form-control">
                                </div>
                            </div>
                        @endforelse
                        <div id="date-container">
                            <!-- Additional dates will be appended here -->
                        </div>
                        <button id="add-date" type="button" class="btn btn-primary mt-3">Add Date</button>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg mt-3">Update Tour</button>
            </div>
        </form>
    </div>
@endsection



@section('js')
    <script>
        $(document).ready(function() {
            // Initialize Summernote
            function initializeSummernote(element) {
                $(element).summernote({
                    height: 200,
                    toolbar: [
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['para', ['ul', 'ol']],
                        ['insert', ['link']],
                        ['view', ['help']],
                    ],
                });
            }

            initializeSummernote('textarea');

            // Handle adding new plans
            const addPlanButton = document.getElementById('add-plan');
            const planContainer = document.getElementById('plan-container');

            addPlanButton.addEventListener('click', () => {
                // Get the first plan as a template
                const firstPlan = document.querySelector('.plan-can');

                // Clone the first plan
                const newPlan = firstPlan.cloneNode(true);

                // Clear all input, select, and textarea fields in the cloned plan
                newPlan.querySelectorAll('input, select, textarea').forEach((field) => {
                    field.value = '';
                });

                const clonedDescription = newPlan.querySelector("textarea[name='plan_description[]']");
                $(clonedDescription).next('.note-editor').remove(); // Remove any existing Summernote editor
                clonedDescription.innerHTML = ''; // Clear any existing content in the cloned textarea

                // Reinitialize Summernote for the cloned description field
                $(clonedDescription).summernote({
                    height: 200,
                    toolbar: [
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['para', ['ul', 'ol']],
                        ['insert', ['link']],
                        ['view', ['help']],
                    ],
                });

                // Append the cloned plan to the container
                planContainer.appendChild(newPlan);
            });
            // Get the "Add Date" button (you need to add this button in your HTML)
            const addDateButton = document.getElementById('add-date');

            // Get the container where new date sections will be appended
            const dateContainer = document.getElementById('date-container');

            // Add click event listener to the "Add Date" button
            addDateButton.addEventListener('click', () => {
                // Get the first date-can element as a template
                const firstDate = document.querySelector('.date-can');

                // Clone the first date-can element
                const newDate = firstDate.cloneNode(true);

                // Clear all input fields in the cloned date-can element
                newDate.querySelectorAll('input').forEach((field) => {
                    field.value = ''; // Clear value
                });

                // Append the cloned date-can element to the date-container
                dateContainer.appendChild(newDate);
            });

        });
    </script>
@endsection
