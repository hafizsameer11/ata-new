@extends('Admin.index')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 mt-4 w-50">
            <h2>Update info</h2>
            <form action="{{route('tour.single.update',$tour->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$tour->price}}" />
                    @error('price')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="discount">Discount</label>
                    <input type="number" class="form-control" id="discount" name="discount" value="{{$tour->price}}" />
                    @error('discount')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{$tour->date}}" />
                    @error('date')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" value="{{$tour->time}}" />
                    @error('time')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary ">Update</button>
            </form>
        </div>
    </div>
@endsection