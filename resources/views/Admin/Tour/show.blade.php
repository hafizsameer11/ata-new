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
                    <img src="{{ asset('storage/' . $image->image) }}" alt="gallery img" class="rounded img">
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
            <div class="d-flex justify-content-between align-items-center card flex-row p-2  mt-4">
                <h4><span class="text-danger">Name:</span> {{ $tour->name }}</h4>
                <h4><span class="text-danger">Tour type:</span> {{ $tour->tour_type }}</h4>
            </div>
            <div class="d-flex align-items-center gap-2 w-100">
                <h6 class="w-100"><span class="text-danger">Country:</span> {{ $tour->country->name }} </h6>
                <h6 class="w-100"><span class="text-danger">Duration:</span> {{ $tour->duration }} </h6>
                <h6 class="w-100"><span class="text-danger">Max Member:</span> {{ $tour->max_member }} </h6>
                <h6 class="w-100"><span class="text-danger">Min age:</span> {{ $tour->min_age }} </h6>
            </div>
            <div class="mt-4">
                <h3 class="text-danger">Description</h3>
                {!! $tour->description !!}
            </div>
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
                                <td>{{ $plan->cities->name }}</td>
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
