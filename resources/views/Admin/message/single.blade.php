@extends('Admin.index')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Success message if any -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Contact Message Details Card -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Contact Message Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-4"><strong>First Name:</strong></div>
                            <div class="col-8">{{ $contact->FirstName }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4"><strong>Last Name:</strong></div>
                            <div class="col-8">{{ $contact->LastName }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4"><strong>Email:</strong></div>
                            <div class="col-8">{{ $contact->Email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4"><strong>Phone No:</strong></div>
                            <div class="col-8">{{ $contact->PhoneNo }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4"><strong>Message:</strong></div>
                            <div class="col-8">{{ $contact->Message }}</div>
                        </div>

                        <!-- Status Badge -->
                        <div class="row mb-3">
                            <div class="col-4"><strong>Status:</strong></div>
                            <div class="col-8">
                                <span class="badge {{ $contact->read ? 'bg-success' : 'bg-danger' }}">
                                    {{ $contact->read ? 'Read' : 'Unread' }}
                                </span>
                            </div>
                        </div>

                        <!-- Toggle Read/Unread Status -->
                        <form action="{{ route('message.update', $contact->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary mt-3">
                                {{ $contact->read ? 'Mark as Unread' : 'Mark as Read' }}
                            </button>
                        </form>

                        <!-- Back Button -->
                        <a href="{{ route('message.index') }}" class="btn btn-secondary mt-3">Back to All Messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
