@extends('Admin.index')
@section('content')
    <div class="container mt-4 d-flex align-items-center justify-content-between">
        <h1>Upload Tour images {{ $tour->id }}</h1>
        <div class="d-flex justify-content-end gap-2">
            {{-- <a href="{{ route('tour.plans', $tour->id) }}" class="btn btn-primary">Next</a> --}}
        </div>
    </div>
    <div class="container mt-5">
        <form id="tourForm">
            <!-- Dropzone for Images -->
            <div class="form-group mb-4">
                <label for="tourImages">Upload Images</label>
                @if ($tour->images->count() >= 6)
                    <div class="alert alert-danger">
                        <h4>Images limit reached!</h4>
                    </div>
                @else
                    <div id="tourImagesDropzone" class="dropzone"></div>
                @endif
            </div>
        </form>
        <div class="container d-flex align-items-center gap-2 mb-4">
            @foreach ($tour->images as $image)
                <div class="image-can d-flex flex-column align-items-center justify-content-center w-100 gap-2">
                    <img src="{{ asset('storage/' . $image->image) }}" alt=""
                        style="max-width:100px;height: 100px;object-fit: cover;" class="rounded w-100 img">
                    <button class="btn btn-danger btn-sm del-image" data-id="{{ $image->id }}">Del</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('.del-image').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('tours.images.removeUploaded') }}",
                    method: "DELETE",
                    data: {
                        id: id
                    },
                    beforeSend: function() {
                        $(this).prop('disabled', true)
                    },
                    success: function() {
                        Swal.fire({
                            title: 'image',
                            text: 'The images deleted successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function() {
                        $(this).prop('disabled', false)
                        alert('Something went wrong')
                    }
                })
            })

            Dropzone.autoDiscover = false;

            if (Dropzone.forElement("#tourImagesDropzone")) {
                Dropzone.forElement("#tourImagesDropzone").destroy();
            }

            let uploadedImages = [];
            const dropzone = new Dropzone("#tourImagesDropzone", {
                url: "{{ route('tours.images.EditImages') }}",
                method: "POST",
                paramName: "image",
                maxFilesize: 2, // Maximum file size in MB
                maxFiles: 6, // Maximum number of files
                params: {
                    tour_id: '{{ $tour->id }}',
                },
                addRemoveLinks: true, // Add remove links to files
                acceptedFiles: "image/*", // Accept only images
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    $('#submit').prop('disabled', true);
                },
                success: function(file, response) {
                    uploadedImages.push(response.id);
                    file.serverId = response.id;
                },
                removedfile: function(file) {
                    // AJAX call to delete the file
                    if (file.serverId) {
                        $.ajax({
                            url: "{{ route('tours.images.removeUploaded') }}",
                            method: "DELETE",
                            data: {
                                id: file.serverId
                            },
                            success: function(response) {
                                console.log("Image deleted successfully");
                            },
                            error: function(response) {
                                console.error("Error deleting image");
                            }
                        });
                    }
                    file.previewElement.remove(); // Remove the file preview
                },
                error: function(file, response) {
                    // Customize the error display
                    file.previewElement.classList.add('dz-error'); // Add error class
                    let errorMessage = typeof response === "string" ? response : response.error ||
                        "Upload failed";

                    // Add a message to the preview element
                    let errorNode = file.previewElement.querySelector("[data-dz-errormessage]");
                    if (!errorNode) {
                        errorNode = document.createElement("div");
                        errorNode.classList.add("dz-error-message");
                        errorNode.setAttribute("data-dz-errormessage", "");
                        file.previewElement.appendChild(errorNode);
                    }
                    errorNode.textContent = errorMessage;

                    Swal.fire({
                        title: 'Error',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });

        });
    </script>
@endsection
