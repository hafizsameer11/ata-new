@extends('admin.index')
@section('css')
    <style>
        body {
            background-color: #f8f9fa;
            /* Light gray background */
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            /* White background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            border-radius: 10px;
            /* Rounded corners */
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
            <h2 style="color: #EE1C25" class="form-header">Update City</h2>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Update Form -->
            <form action="{{ route('city.update', $city->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="countryID" class="form-label">Country</label>
                    {{-- <input 
                        type="text" 
                        class="form-control @error('countryID') is-invalid @enderror" 
                        id="countryID" 
                        name="countryID" 
                        value="{{ old('countryID', $city->countryID) }}" --}}
                    <select id="countryID" name="countryID"" class="form-control">
                        <option value="{{$city->countryID}}">{{$city->country->name}}</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">City Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $city->name) }}"
                        />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                        </div>

                    <div class="mb-3">
                        <label for="status-1" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status-1" name="status"
                            required>
                            <option value="1" {{$city->status ? 'selected' : ''}}>Active
                            </option>
                            <option value="0" {{!$city->status ? 'selected' : ''}}>
                                Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <button type="submit" style="background-color: #EE1C25" class="btn btn-primary">Update City</button>
            </form>
        </div>
    </div>
@endsection
