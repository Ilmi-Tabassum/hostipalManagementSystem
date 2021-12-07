@extends('layouts.app')

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="AddPatientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="saveform_errList"></ul>
                    <div class="form-group mb-3">
                        <label for ="">Name</label>
                        <input type="text" class="name form-control">
                </div>
                    <div class="form-group mb-3">
                        <label for ="">Email</label>
                        <input type="text" class="email form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for ="">Phone</label>
                        <input type="text" class="phone form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for ="">Address</label>
                        <input type="text" class="address form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_patient">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
        <div class = "col-md-12">
            <div id="success_message"></div>

            <div class="card">
<div class ="card-header">

      <h4>  Patients Data
    <a href="#" data-bs-toggle="modal" data-bs-target="#AddPatientModal" class="btn btn-primary float-end btn-sm">Add Patient</a>
      </h4>
</div>
<div class="card-body">
    <table class = "table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Appointment Taken At</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>


        </thead>
       <tbody>

       </tbody>

    </table>
</div>
</div>
</div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            // fetchstudent();
            //
            // function fetchstudent(){
            //     $.ajax({
            //         type: "GET",
            //         url:"/fetch-patient",
            //
            //         datatype:"json",
            //         success:function (response){
            //             // console.log(response.patient);
            //             $.each(response.patient,function (key,item){
            //                 $('tbody').append(
            //                     '<tr>\
            //                         <td>'+item.id+'</td>\
            //                         <td>'+item.name+'</td>\
            //                         <td>'+item.email+'</td>\
            //                         <td>'+item.phone+'</td>\
            //                         <td>'+item.address+'</td>\
            //                    <td><button type="button" value="'+item.id+'" class="edit_student btn btn-success btn-sm">>Edit</button></td>\
            //                         <td><button type="button" value="'+item.id+'"  class="delete_student btn btn-danger btn-sm">Delete</button></td>\
            //                     </tr>');
            //
            //                 )
            //             })
            //         }
            //     });
            // }

            $(document).on('click','.add_patient',function (e){
                    e.preventDefault();
                    // console.log("hello");

                var data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'phone': $('.phone').val(),
                    'address': $('.address').val(),
                }
               // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url:"/patient",
                    data: data,
                    datatype:"json",
                    success:function (response){
                        // console.log(response.errors.name);
                        if(response.status ==500){
                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-danger')
                            $.each(response.errors,function (key,err_values){
                                $('#saveform_errList').append('<li>'+err_values+'</li>');
                            });
                        }
                        else{
                            $('#saveform_errList').html("");
                            $('#success_message').addClass('alert alert-success')
                            $('#success_message').text(response.message)
                            $('#AddPatientModal').modal('hide');
                            $('#AddPatientModal').find('input').val("");
                        }
                        }


                })
            });
        });

    </script>
@endsection
