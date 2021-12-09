@extends('layouts.master')
@section('content')
 <div class = "container">
     <div class = "row">
         <div class="col-md-12">
             <div class = "card-header">
                 <h4>Doctor Information</h4>
                 <a href="{{url('add-doctor')}}" class = "btn btn-primary float-end">Add Doctor Information</a>
             </div>
             <div class ="card-body"></div>
             <table class = "table table-bordered table-striped">
                 <thead>
                 <tr>
                     <th>ID</th>
                     <th>Doctor Name</th>
                     <th>Email</th>
                     <th>Phone Number</th>
                     <th>Images</th>
                     <th>Edit</th>
                     <th>Take Appointment</th>
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($student as $item)
                     <tr>
                         <td>{{$item->id}}</td>
                         <td>{{$item->name}}</td>
                         <td>{{$item->email}}</td>
                         <td>{{$item->phone}}</td>
                         <td>
                             <img src="{{asset('uploads/students/'.$item->profile_image)}}" width = "70px" height="70px" alt="image">
                         </td>
                         <td>
                             <a href="{{url('edit-doctor/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                         </td>
                         <td>
                             <a href="" class="btn btn-danger btn-sm">Take Appointment</a>
                         </td>
                     </tr>
                 @endforeach
                 </tbody>
             </table>
         </div>
     </div>

 </div>


@endsection
