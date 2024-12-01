@extends('Admin.index')
@section('content')
    <div class="container mt-4">
        <h1>Add Tour</h1>
    </div>
    <div class="container my-5">
        <form id="tourForm">
            <!-- Dropzone for Images -->
            <div class="row">
                <div class="col-md-8 p-2">
                    <div class="card p-4">
                        <h1>Images</h1>
                        <hr>
                        <div class="form-group mb-4">
                            <label for="tourImages">Upload Images</label>
                            <div id="tourImagesDropzone" class="dropzone"></div>
                        </div>
                    </div>

                    <!-- Form groups in a row -->
                    <div class="card p-4">
                        <h1>The Detail</h1>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="country_id">Destination</label>
                                    <select class="form-control" id="country_id" name="country_id">
                                        <option value="">Select Destination</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="name">Tour Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter tour name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="tour_type">Tour Type</label>
                                    <input type="text" class="form-control" id="tour_type" name="tour_type"
                                        placeholder="Enter tour type (e.g., Adventure)" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="duration">Duration</label>
                                    <input type="text" class="form-control" id="duration" name="duration"
                                        placeholder="Enter duration (e.g., 3 days)" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="max_member">Max Members</label>
                                    <input type="number" class="form-control" id="max_member" name="max_member"
                                        placeholder="Enter max members" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="min_age">Minimum Age</label>
                                    <input type="number" class="form-control" id="min_age" name="min_age"
                                        placeholder="Enter minimum age" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="description">Description</label>
                            <textarea class="form-control bg-light" id="description" name="description" rows="3"
                                placeholder="Enter tour description" required></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="include">Includes</label>
                            <textarea class="form-control" id="include" name="include" rows="2"
                                placeholder="Enter included features (comma-separated)" required></textarea>
                        </div>
                    </div>

                    <div class="card p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h1>The Plans</h1>
                        </div>
                        <div class="plan-can">
                            <div style="height: 5px; background-color:black;" class="my-4 rounded"></div>
                            <div class="form-group mb-2">
                                <label for="name">Name</label>
                                <input type="text" name="plan_name[]" id="plan_name" class="form-control" required
                                    placeholder="Enter name ( Day 1 , week 1)">
                            </div>
                            <div class="form-group mb-2">
                                <label for="description">Description</label>
                                <textarea name="plan_description[]" id="plan_description" class="form-control" cols="30" rows="10"
                                    placeholder="Enter plan description"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="city">City</label>
                                <input type="text" name="city[]" id="city" class="form-control">
                            </div>
                        </div>
                        <div id="plan-container">

                        </div>
                        <!-- Add Plan Button -->
                        <button type="button" id="add-plan" class="btn btn-primary mt-3 w-100">Add Another
                            Plan</button>
                    </div>
                </div>
                <div class="col-md-4 p-2">
                    <div class="p-4 card mb-4">
                        <h1>Room price</h1>
                        <hr>
                        <div class="form-group my-4">
                            <label for="single_room">Single room</label>
                            <input type="number" name="single_room" id="single_room" class="form-control" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="twin_room">Twin room</label>
                            <input type="number" name="twin_room" id="twin_room" class="form-control" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="child_room">Child room</label>
                            <input type="number" name="child_room" id="child_room" class="form-control" required>
                        </div>
                    </div>
                    <div class="p-4 card mb-4">
                        <h1>Ticket Detail</h1>
                        <hr>
                        <div class="form-group my-4">
                            <label for="price">Tour price:</label>
                            <input type="number" id="price" name="price" class="form-control" required
                                placeholder="Enter total price per ticket">
                        </div>
                        <div class="form-group mb-4">
                            <label for="discount">Tour discount:</label>
                            <input type="number" id="discount" name="discount" class="form-control" required
                                placeholder="Enter discount perentage (10%,5%)">
                        </div>
                    </div>
                    <div class="card p-4 mb-4">
                        <h1 class="">Tour Type</h1>
                        <hr>
                        <div class="">
                            <label for="one_day">Tour Type</label>
                            <select name="one_day" id="one_day" class="form-control">
                                <option value="0">Package Tour</option>
                                <option value="1">Free&Easy tour</option>
                            </select>
                        </div>
                    </div>
                    <div class="card p-4 mb-4">
                        <h1 class="">Tour Dates</h1>
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
                        <div id="date-container">
                            <!-- Additional dates will be appended here -->
                        </div>
                        {{-- if $name is exist and have value 1 then shown buttn --}}
                        @if (!$name && $name != 1)
                            <button id="add-date" type="button" class="btn btn-primary mt-3">Add Date</button>
                        @endif
                    </div>

                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" id="submit" class="btn btn-primary btn-lg mt-3">Create Tour</button>
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

            initializeSummernote('#description');
            initializeSummernote('#include');
            initializeSummernote('#plan_description');

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
                    field.value = ''; // Clear value
                });

                // Remove any previously initialized Summernote instance from the cloned field
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



            // Dropzone configuration
            Dropzone.autoDiscover = false;

            if (Dropzone.forElement("#tourImagesDropzone")) {
                Dropzone.forElement("#tourImagesDropzone").destroy();
            }

            let uploadedImages = [];
            const dropzone = new Dropzone('#tourImagesDropzone', {
                url: "{{ route('tours.images.upload') }}",
                method: 'POST',
                paramName: 'image',
                maxFilesize: 2,
                maxFiles: 6,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(file, response) {
                    uploadedImages.push(response.image_path);
                    file.serverId = response.id;
                },
                removedfile: function(file) {
                    if (file.serverId) {
                        $.ajax({
                            url: "{{ route('tours.images.remove') }}",
                            method: 'DELETE',
                            data: {
                                id: file.serverId
                            },
                            success: function() {
                                console.log('Image deleted successfully');
                            },
                            error: function() {
                                console.error('Error deleting image');
                            },
                        });
                    }
                    file.previewElement.remove();
                },
                error: function() {
                    alert('Image upload failed. Please try again.');
                },
            });

            $('#tourForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                uploadedImages.forEach((imageId) => {
                    formData.append('images[]', imageId);
                });
                $.ajax({
                    url: "{{ route('tours.store') }}",
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#submit').prop('disabled', true);
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Tour Created',
                            text: 'The tour and plans have been added successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK',
                        }).then(function() {
                            window.location.href =
                                "{{ route('tours.show', ':id') }}".replace(':id',
                                    response.tour_id);
                        });
                    },
                    error: function(xhr) {
                        $('#submit').prop('disabled', false);
                        const errors = xhr.responseJSON.errors;
                        Object.keys(errors).forEach(function(key) {
                            const element = $(`[name="${key}"]`);
                            element.addClass('is-invalid');
                            element.after(
                                `<div class="invalid-feedback">${errors[key][0]}</div>`
                            );
                        });
                    },
                });
            });

            // Handle field changes to remove error styling
            $('input, textarea, select').on('change', function() {
                $(this).removeClass('is-invalid');
                $(this).next('.invalid-feedback').remove();
            });
        });
    </script>
@endsection
