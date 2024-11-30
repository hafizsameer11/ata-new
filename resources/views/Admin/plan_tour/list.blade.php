@extends('Admin.index')

@section('content')
    <div class="container p-4 card mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Planed Tours List</h1>
            <a href="{{ route('plan_tours.create') }}" class="btn btn-primary">Plan Tour</a>
        </div>
    </div>
    <div class="container card mt-4 p-4">
        <h1>list</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tour name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plantours as $plantour)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('tours.show', $plantour->tour_id) }}">{{ $plantour->tours->name }}</a>
                            </td>
                            <td>{{ $plantour->price }}</td>
                            <td>{{ $plantour->discount }}</td>
                            <td>{{ $plantour->date }}</td>
                            <td>{{ $plantour->time }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('plan_tours.edit', $plantour->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <button data-id="{{ $plantour->id }}" class="btn btn-danger btn-sm del-btn">Del</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
                            url: "{{ route('plan_tours.destroy', ':id') }}".replace(":id",
                                id),
                            beforeSend: function() {
                                Swal.showLoading()
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Planing',
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
