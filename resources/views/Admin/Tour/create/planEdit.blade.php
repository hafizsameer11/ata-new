@extends('Admin.index')
@section('content')
    <div class="container mt-4 d-flex justify-content-end gap-2">
        <a href="{{ route('tour.plans' , $tourplan->tour_id) }}" class="btn btn-primary">Back</a>
        <a href="" class="btn btn-primary">Next</a>
    </div>
    <div class="container mt-4 d-flex align-items-center justify-content-between">
        <h1>Upload Edit Plans {{ $tourplan->tour_id }}</h1>
    </div>
    <div class="container mt-5">
        <form id='plansForm' class="card p-4">
            <input type="hidden" name="id" value="id" value="{{ $tourplan->id }}">
            <input type="hidden" name="tour_id" id="tour_id" value="{{ $tourplan->tour_id }}">
            <div class="">
                <div class="form-group mb-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required value="{{ $tourplan->name }}">
                </div>
                <div class="form-group mb-2">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $tourplan->description }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="city">City</label>
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="">Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}"  {{ ($city->id = $tourplan->city_id) ? 'selected' : "" }} >{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" id="submit">Submit</button>
        </form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

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

            $('input , textera').on('change', function() {
                $(this).removeClass('is-invalid');
                $(this).next('.invalid-feedback').remove();
            })

            // Handle Form Submission
            $("#plansForm").on("submit", function(e) {
                e.preventDefault();
                const formData = {
                    name: $("#name").val(),
                    description: $("#description").val(),
                    tour_id: $('#tour_id').val(),
                    city_id: $('#city_id').val(),
                };


                $.ajax({
                    url: "{{ route('tourplans.update', $tourplan->id) }}",
                    method: "PUT",
                    data: formData,
                    beforeSend: function() {
                        $('#submit').prop('disabled', true)
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Tour',
                            text: 'The tour plan Updated successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                        // .then(function() {
                        //     location.reload();
                        // })
                        $('#plansForm')[0].reset();
                        $('#submit').prop('disabled', false)
                    },
                    error: function(xhr) {
                        $('#submit').prop('disabled', false)
                        alert("An error occurred. Please try again.");
                        let errors = xhr.responseJSON.errors;
                        Object.keys(errors).forEach(function(key) {
                            $(`#${key}`).addClass('is-invalid');
                            $(`#${key}`).after(
                                `<h6 class='invalid-feedback d-block'>${errors[key][0]}</h6>`
                            );
                        });
                    }
                });
            });
        });
    </script>
@endsection
