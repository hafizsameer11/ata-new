@extends('admin.index')

@section('css')
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .container {
            max-width: 1200px;
        }

        .table-container {
            margin-top: 30px;
        }
        th{
            background-color: #1b82ec !important;
               color: white !important;
           
           }

        .table thead {
            background-color: #EE1C25;
            color: white;
        }

        .status-active {
            color: green;
            font-weight: bold;
        }

        .status-inactive {
            color: red;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1 style="color: #EE1C25" class="text-center mb-4">City Status Overview</h1>
        @if (session('success'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{ session('success') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
           @endif
        <div>
            <a style="background-color: #EE1C25" class="fs-5 btn btn-primary p-2" href="{{ route('city.create') }}">Add
                City</a>
        </div>
        <div class="table-container table-responsive">
            <table class="table table-responsive table-bordered table-striped">
                <thead>
                    <tr>
                        <th>City Names</th>
                        <th>City Status</th>
                        <th>Country Name</th>
                        <th class="text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td class="status-active"> <span class="badge btn-{{ $item->status ? 'success' : 'danger' }}">
                            {{ $item->status ? 'Active' : 'Inactive' }}
                        </span></td>
                        <td><div class="d-flex align-items-center gap-2">
                            {{ $item->country->name }}
                            
                        </div></td> <!-- Access country directly -->
                        <!-- Access country status -->
                        <td><a class="btn btn-warning" href="{{ route('city.edit', $item->id) }}">Update</a></td>
                        <td>
                            <form action="{{ route('city.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="pagination  justify-content-center mt-4">
            {{ $cities->links('pagination::bootstrap-5') }}
        </div>
    </div>
  @endsection