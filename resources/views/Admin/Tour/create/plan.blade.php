@extends('Admin.index')
@section('content')
    <div class="container mt-4 d-flex justify-content-end gap-2">
        <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary">Back</a>
        <a href="" class="btn btn-primary">Next</a>
    </div>
    <div class="container mt-4 d-flex align-items-center justify-content-between">
        <h1>Tour Plans {{ $tour->id }}</h1>
        <div class="d-flex align-items-center gap-2">
            <button id="add_plan" class="btn btn-primary">ADD PLAN</button>
        </div>
    </div>
    <div class="container mt-5">
        <form id='plansForm' class="card p-4">
            <input type="hidden" name="id" value="id">
            <input type="hidden" name="tour_id" id="tour_id" value="{{ $tour->id }}">
            <div class="">
                <div class="form-group mb-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="city">City</label>
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="">Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" id="submit">Submit</button>
        </form>
    </div>
    <div class="plans-can mt-5 p-4">
        @foreach ($tour->plans as $plan)
            <div class="my-2 card p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h4><span class="text-danger">Name:</span> <span>{{ $plan->name }}</span></h4>
                    <h4><span class="text-danger">City:</span> <span>{{ $plan->cities->name }}</span></h4>
                </div>
                <div class="">
                    <h4 class="text-danger">Description</h4>
                    <p>
                        {!! $plan->description !!}
                    </p>
                </div>
                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a class="edit-plan btn btn-warning" href="{{ route('tourplans.edit', $plan->id) }}"
                        data-plan="{{ $plan }}">Edit</a>
                    <button class="del-plan btn btn-danger" data-plan="{{ $plan->id }}">DEl</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#plansForm').hide();

            $("#add_plan").on('click', function() {
                $('#plansForm').toggle();
            })
            $('.del-plan').on('click', function() {
                var id = $(this).data('plan');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, do it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: "{{ route('tourplans.destroy',':id') }}".replace(":id",id),
                            beforeSend:function(){
                                Swal.showLoading()
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Tour plan',
                                    text: data.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: "someting went wrong",
                                    icon: 'error',
                                })
                            }

                        });
                    }
                });

            })

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
                let id = $('#id').val();
                let url = id ? "{{ route('tourplans.update', ':id') }}".replace(':id', id) :
                    "{{ route('tourplans.store') }}";
                let method = id ? "PUT" : "POST";
                const formData = {
                    name: $("#name").val(),
                    description: $("#description").val(),
                    tour_id: $('#tour_id').val(),
                    city_id: $('#city_id').val(),
                };


                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    beforeSend: function() {
                        $('#submit').prop('disabled', true)
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Tour',
                            text: 'The tour plan added successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            location.reload();
                        })
                        $('#plansForm').toggle();
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
