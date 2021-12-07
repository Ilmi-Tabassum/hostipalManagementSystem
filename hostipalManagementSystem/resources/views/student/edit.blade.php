@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row">
            <div class="col-md-12">
                @if(session('status'))
                    <h6 class="alert alert-success">{{session('status')}}</h6>
                @endif
                <div class = "card-header">
                    <h4>Edit Doctor with Image</h4>
                    <a href="{{url('doctors')}}" class = "btn btn-danger float-end">Add Doctor Information</a>
                </div>
                <div class ="card-body"></div>
                <form action="{{url('update-doctor/'.$student->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="">Doctor Name</label>
                        <input type="text" name="name" value="{{$student->name}}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Doctor Email</label>
                        <input type="text" name="email" value="{{$student->email}}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Doctor Phone</label>
                        <input type="text" name="phone" value="{{$student->phone}}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Doctor Image</label>
                        <input type="file"  name="profile_image" class="form-control">
                        <img src="{{asset('uploads/students/'.$student->profile_image)}}" width = "70px" height="70px" alt="image">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Update Button</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection
