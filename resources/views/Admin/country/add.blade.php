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
                <h2 style="color: #EE1C25" class="form-header">Add Country</h2>

                <!-- Success Message -->
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


                <form action="{{ route('country.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Country Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required placeholder="Enter country name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-control @error('status') is-invalid @enderror" id="status-1" name="status"
                            required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" style="background-color: #EE1C25" class="btn btn-primary">Add Country</button>
                </form>
            </div>
        </div>
    @endsection
