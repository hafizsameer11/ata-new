@extends('Admin.index')

@section('css')
    <style>
        .gallery-can {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

        .gallery-can>div {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1 0 200px;
        }

        .gallery-can img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card p-4 mt-4">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h1 class="">
                    {{ $tour->name }}
                </h1>
                <a href="{{ route('tours.index') }}" class="btn btn-primary">
                    Go back to list
                </a>
            </div>
        </div>
        <div class="card p-4 mt-4">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h1 class="">Gallery
                </h1>
                <a href="{{ route('tour.imagesUpload', $tour->id) }}" class="btn btn-primary">
                    ADD / Edit Gallery
                </a>
            </div>
            <hr>
            <div class="gallery-can mt-4">
                @forelse ($tour->images as $image)
                    <img src="{{ asset( 'storage/'.$image->image) }}" alt="gallery img" class="rounded img">
                @empty
                    <p>No images uploaded</p>
                @endforelse
            </div>
        </div>
        <div class="detail card p-4 mt-4">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h1 class="">Detail
                </h1>
                <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-primary">
                    Edit Detail
                </a>
            </div>
            <hr>
            <table class="table table-bordered mt-4">
                <thead class="bg-light">
                    <tr>
                        <th colspan="4" class="text-center text-danger h4">Tour Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td>{{ $tour->name }}</td>
                        <td><strong>Tour Type:</strong></td>
                        <td>{{ $tour->tour_type }}</td>
                    </tr>
                    <tr>
                        <td><strong>Destination:</strong></td>
                        <td>{{ $tour->country->name }}</td>
                        <td><strong>Duration:</strong></td>
                        <td>{{ $tour->duration }}</td>
                    </tr>
                    <tr>
                        <td><strong>Max Member:</strong></td>
                        <td>{{ $tour->max_member }}</td>
                        <td><strong>Min Age:</strong></td>
                        <td>{{ $tour->min_age }}</td>
                    </tr>
                    <tr>
                        <td><strong>Single Room:</strong></td>
                        <td>${{ $tour->single_room }}</td>
                        <td><strong>Twin Room:</strong></td>
                        <td>${{ $tour->twin_room }}</td>
                    </tr>
                    <tr>
                        <td><strong>Child Room:</strong></td>
                        <td>${{ $tour->child_room }}</td>
                        <td><strong>Price:</strong></td>
                        <td>${{ $tour->price }}</td>
                    </tr>
                    <tr>
                        <td><strong>Discount:</strong></td>
                        <td>{{ $tour->discount }} %</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-center"><h4><strong>Date and time</strong></h4></td>
                    </tr>
                    @foreach ($tour->planTour as $planDate)
                    <tr>
                        <td><strong>Date:</strong></td>
                        <td>{{ $planDate->date }}</td>
                        <td><strong>Time:</strong></td>
                        <td>{{ $planDate->time }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Description Section -->
            <div class="mt-4">
                <h3 class="text-danger">Description</h3>
                {!! $tour->description !!}
            </div>

            <!-- Include/Exclude Section -->
            <div class="mt-4">
                <h3 class="text-danger">Include/Exclude</h3>
                {!! $tour->include !!}
            </div>

        </div>
        <div class="plans mt-4 card p-4">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h1 class="">Plans
                </h1>
                <a href="{{ route('tour.plans', $tour->id) }}" class="btn btn-primary">
                    View All
                </a>
            </div>
            <hr>
            <div class="mt-4 table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">city</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tour->plans as $plan)
                            <tr>
                                <td>{{ $plan->name }}</td>
                                <td>{!! Str::words($plan->description, 10, '...') !!}</td>
                                <td>{{ $plan->city }}</td>
                                <td>
                                    <a href="{{ route('tourplans.edit', $plan->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <button class="del-plan btn btn-danger btn-sm"
                                        data-plan="{{ $plan->id }}">DEl</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No plans found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
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
                            url: "{{ route('tourplans.destroy', ':id') }}".replace(":id",
                                id),
                            beforeSend: function() {
                                Swal.showLoading()
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Tour plan',
                                    text: data.response,
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
        });
    </script>
@endsection
