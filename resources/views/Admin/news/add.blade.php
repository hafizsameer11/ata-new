@extends('Admin.index')

@section('content')
    <div class="container mt-4">
        <div class="card p-4 mb-4">
            <h1>ADD New</h1>
        </div>
        <div class="mb-4 card p-4">
            <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title" placeholder="Enter title">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group mb-4">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                        placeholder="Enter plan description">{{old('description')}}</textarea>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group mb-4">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <span class="text-danger">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                {{-- submit bnt --}}
                <button type="submit" class="btn btn-primary w-100">Submit</button>
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
