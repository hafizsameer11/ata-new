@extends('Website.Layout.layout')
@section('content')
    <div class="w-100 about-section-1" style="background-image: url({{ asset('website/images/about-pic-1.jpg') }})">
        <div class="container d-flex align-items-center justify-content-center">
            <h1 class="text-light">
                My Tours
            </h1>
        </div>
    </div>
    <div class="container p-4 my-4">
        <h1 class="my-4">My tour list</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tour Name</th>
                        <th scope="col">Country</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>My Tour</td>
                        <td>Japan</td>
                        <td>12 dec,2024</td>
                        <td>12:00</td>
                        <td>
                            pending
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
