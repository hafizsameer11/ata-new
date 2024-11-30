@extends('admin.index')
@section('css')
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff; /* White background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            border-radius: 10px; /* Rounded corners */
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
            <h2 style="color: #EE1C25" class="form-header">Update Destination</h2>

            <!-- Success Message -->
            @if (session('success'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{ session('success') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
           @endif

            <!-- Update Form -->
            <form action="{{ route('country.update', $country->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Method spoofing for PUT -->

                <div class="mb-3">
                    <label for="image" class="form-label">Destination Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Destination Name</label>
                    <input 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $country->name) }}" />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status-1" class="form-label">Status</label>
                    <select 
                        class="form-select form-control @error('status') is-invalid @enderror" 
                        id="status-1" 
                        name="status" 
                        required>
                        <option value="1" {{$country->status ? 'selected' : ''}} >Active</option>
                        <option value="0"  {{!$country->status ? 'selected' : ''}}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" style="background-color: #EE1C25" class="btn btn-primary">Update Destination</button>
            </form>
        </div>
    </div>
 @endsection
