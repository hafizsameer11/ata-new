@extends('admin.index')
@section('css')
    <style>
        body {
            background-color: #f8f9fa;
            /* Light gray background */
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="form-container">
            <h2 style="color: #EE1C25" class="form-header">Plan Tour</h2>

            <form id="planForm">
                <div class="form-group mb-4">
                    <label for="name">Tour Name:</label>
                    <select name="tour_id" id="tour_id" class="form-control" required>
                        <option value="">Select Tour</option>
                        @foreach ($tours as $tour)
                            <option value="{{ $tour->id }}">{{ $tour->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="price">Tour price:</label>
                    <input type="number" id="price" name="price" class="form-control" required
                        placeholder="Enter total price per ticket">
                </div>
                <div class="form-group mb-4">
                    <label for="discount">Tour discount:</label>
                    <input type="number" id="discount" name="discount" class="form-control" required
                        placeholder="Enter discount perentage (10%,5%)">
                </div>
                <div class="form-group mb-4">
                    <label for="date">Tour Date:</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="time">Tour Time:</label>
                    <input type="time" id="time" name="time" class="form-control" required>
                </div>
                <button type="submit" id="submit" style="background-color: #EE1C25" class="btn btn-primary">Plan Tour</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#planForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                $.ajax({
                    url: "{{ route('plan_tours.store') }}",
                    method: 'POST',
                    data: formData,
                    beforeSend: function() {
                        $('#submit').prop('disabled', true);
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Plan Added',
                            text: 'The tour plan has been added successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK',
                        }).then(function() {
                            window.location.href =
                            "{{ route('plan_tours.index') }}"; // Redirect to the plans listing page
                        });
                    },
                    error: function(xhr) {
                        $('#submit').prop('disabled', false);

                        // Handle validation errors
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
