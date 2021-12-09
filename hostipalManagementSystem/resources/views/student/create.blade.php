
@extends('layouts.master')
@section('content')
    <div class = "container">
        <div class = "row">
            <div class="col-md-12">
                @if(session('status'))
                    <h6 class="alert alert-success">{{session('status')}}</h6>
                @endif
                <div class = "card-header">
                    <h4>Add Doctor with Image</h4>
                    <a href="{{url('doctors')}}" class = "btn btn-danger float-end">Add Doctor Information</a>
                </div>
                <div class ="card-body"></div>
                <form action="{{url('add-doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group mb-3">
                    <label for="">Doctor Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                    <div class="form-group mb-3">
                        <label for="">Doctor Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Doctor Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Doctor Image</label>
                        <input type="file"  name="profile_image" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Save Button</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection
