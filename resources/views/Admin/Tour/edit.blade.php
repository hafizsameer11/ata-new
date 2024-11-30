@extends('Admin.index')
@section('content')
    <div class="container mt-4">
        <h1>Edit Tour Detail</h1>
    </div>
    <div class="container my-5">
        <form id="tourForm">

            <!-- Form groups in a row -->
            <div class="row">
                <div class="col-md-8 p-2">
                    <div class="card p-4">
                        <h1>The Detail</h1>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="country_id">Country</label>
                                    <select class="form-control" id="country_id" name="country_id">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ ($country->id = $tour->country_id) ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="name">Tour Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter tour name" required value="{{ $tour->name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="tour_type">Tour Type</label>
                                    <input type="text" class="form-control" id="tour_type" name="tour_type"
                                        placeholder="Enter tour type (e.g., Adventure)" required
                                        value="{{ $tour->tour_type }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="duration">Duration</label>
                                    <input type="text" class="form-control" id="duration" name="duration"
                                        placeholder="Enter duration (e.g., 3 days)" required value="{{ $tour->duration }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="max_member">Max Members</label>
                                    <input type="number" class="form-control" id="max_member" name="max_member"
                                        placeholder="Enter max members" required value="{{ $tour->max_member }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="min_age">Minimum Age</label>
                                    <input type="number" class="form-control" id="min_age" name="min_age"
                                        placeholder="Enter minimum age" required value="{{ $tour->min_age }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="description">Description</label>
                            <textarea class="form-control bg-light" id="description" name="description" rows="3"
                                placeholder="Enter tour description" required>{{ $tour->description }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="include">Includes</label>
                            <textarea class="form-control" id="include" name="include" rows="2"
                                placeholder="Enter included features (comma-separated)" required>{{ $tour->include }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-2">
                    <div class="p-4 card mb-4">
                        <h1>Room price</h1>
                        <div class="form-group">
                            <label for="single_room">Single room</label>
                            <input type="text" name="single_room" id="single_room" class="form-control" value="{{$tour->single_room}}" required>
                        </div>
                        <div class="form-group">
                            <label for="twin_room">Twin room</label>
                            <input type="text" name="twin_room" id="twin_room" class="form-control" value="{{$tour->twin_room}}" required>
                        </div>
                        <div class="form-group">
                            <label for="child_room">Child room</label>
                            <input type="text" name="child_room" id="child_room" class="form-control" value="{{$tour->child_room}}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" id="submit" class="btn btn-primary btn-lg mt-3">Update Detail</button>
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

            // Handle form submission
            $('#tourForm').on('submit', function(e) {
                e.preventDefault();

                const formData = {
                    country_id: $('#country_id').val(),
                    name: $('#name').val(),
                    tour_type: $('#tour_type').val(),
                    duration: $('#duration').val(),
                    max_member: $('#max_member').val(),
                    min_age: $('#min_age').val(),
                    description: $('#description').val(),
                    include: $('#include').val(),
                    single_room: $('#single_room').val(),
                    twin_room: $('#twin_room').val(),
                    child_room: $('#child_room').val(),
                    

                };

                // Send AJAX request
                $.ajax({
                    url: "{{ route('tours.update', $tour->id) }}",
                    method: 'PUT', // Use POST with _method: PUT for Laravel compatibility
                    data: formData,
                    beforeSend: function() {
                        $('#submit').prop('disabled', true);
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Tour Updated',
                            text: 'The tour details have been updated successfully!',
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
                        const errors = xhr.responseJSON.errors || {};
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
