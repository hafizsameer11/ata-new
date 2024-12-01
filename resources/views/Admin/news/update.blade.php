@extends('Admin.index')

@section('content')
    <div class="container mt-4">
        <div class="card p-4 mb-4">
            <h1>Edit Tour</h1>
        </div>
        <div class="mb-4 card p-4">
            <form action="{{ route('news.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $tour->title }}" placeholder="Enter title">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group mb-4">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                        placeholder="Enter description">{{ $tour->description }}</textarea>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group mb-4">
                    <label for="image">Image</label>
                    <input type="file" class="form-control mb-3" id="image" name="image">
                    @if($tour->image)
                        <div>
                            <img src="{{ asset('storage/' . $tour->image) }}" width="100" alt="Tour Image">
                        </div>
                    @endif
                    <span class="text-danger">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // Initialize Summernote on the description textarea
            $('#description').summernote({
                height: 200, // Set the height of the editor
                toolbar: [
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link']],
                    ['view', ['help']],
                ],
            });
        });
    </script>
@endsection