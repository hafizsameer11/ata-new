@extends('Admin.index')

@section('content')
    <div class="container mt-4">
        <div class="card p-4 mb-4 d-flex align-items-center flex-row justify-content-between">
            <h1>News list</h1>
            <a href="{{ route('news.create') }}" class="btn btn-primary">ADD News</a>
        </div>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
         @endif

        <div class="card mt-4 p-4">
            <div class='d-flex align-items-center justify-content-between '>
                <h1>list</h1>
                <div>
                    {{-- filtername --}}
                    <form action="{{ route('news.filterForm') }}" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search by name">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>title</th>
                            <th>description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($news as $new)
                            <tr>
                                <td><img src="{{ asset('storage/' . $new->image) }}" alt="" width="50"
                                        class="rounded" /></td>
                                <td>{{ $new->title }}</td>
                                <td>{!! Str::words($new->description, 10, '...') !!}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('news.edit', $new->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('news.destroy', $new->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div>
                {{$news->links('pagination::bootstrap-5')}}
            </div>
        </div>

    </div>
@endsection
