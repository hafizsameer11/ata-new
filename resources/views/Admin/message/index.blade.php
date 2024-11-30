@extends('Admin.index')
@section('css')
<style>
    .table th{
    background-color: #1b82ec !important;
       color: white !important;
}
</style>
@endsection
@section('content')
    <h1 class="heading mt-3 mb-3">Contact Messages</h1>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Message</th>
                <th>Status</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->FirstName }}</td>
                    <td>{{ $contact->LastName }}</td>
                    <td>{{ $contact->Email }}</td>
                    <td>{{ $contact->PhoneNo }}</td>
                    <td>{{ $contact->Message }}</td>
                    <td>
                        <span class="badge {{ $contact->read ? 'btn-success' : 'btn-danger' }}">
                            {{ $contact->read ? 'Read' : 'Unread' }}
                        </span>
                    </td>
                    <td><a class="btn btn-warning" href="{{route('message.show',$contact->id)}}">View</a></td>
                    <td>
                        <form action="{{route('message.update',$contact->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">
                                {{ $contact->read ? 'Mark as Unread' : 'Mark as Read' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination  justify-content-center mt-4">
        {{ $contacts->links('pagination::bootstrap-5') }}
    </div>


@endsection