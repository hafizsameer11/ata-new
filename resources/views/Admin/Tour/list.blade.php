@extends('Admin.index')

@section('content')
    <div class="container p-4 card mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Tours List</h1>
            <a href="{{ route('tours.create') }}" class="btn btn-primary">Add New Tour</a>
        </div>
    </div>
    <div class="container card mt-4 p-4">
        @if (session('success'))
            <div class="alert alert-danger">{{ session('success') }}</div>
        @endif
        <div class='d-flex align-items-center justify-content-between '>
            <h1>list</h1>
            <div>
                {{-- filtername --}}
                <form action="{{ route('tour.filterForm') }}" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Search by name">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Destination</th>
                        <th>Actions</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tours as $tour)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $tour->images[0]->image) }}" alt="" width="50"
                                    height="50" style="object-fit: cover" />
                            </td>
                            <td>{{ $tour->name }}</td>
                            <td>{{ $tour->country->name }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-success btn-sm">View</a>
                                    <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger del-btn btn-sm" data-id="{{ $tour->id }}">Del</button>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-2 ">
                                    <a href="{{ route('tour.imagesUpload', $tour->id) }}"
                                        class="btn btn-sm btn-primary">Update images</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Tours Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            {{ $tours->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.del-btn', function() {
                var id = $(this).data('id');
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
                            url: "{{ route('tours.destroy', ':id') }}".replace(":id",
                                id),
                            beforeSend: function() {
                                Swal.showLoading()
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Tour',
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
        })
    </script>
@endsection
