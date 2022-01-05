@extends('layouts.app')

@section('content')


    <div class = "container">
        <div class = "row">
            <div class="col-md-12">

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
{{--Edit Modal--}}

    <div class="modal fade" id="EditPatientModal" tabindex="-1" aria-labelledby="EditPatientModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditPatientModal">Edit and Update Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="updateform_errList"></ul>
                    <input type="hidden" id = "stud_id">
                    <div class="form-group mb-3">
                        <label for ="">Name</label>
                        <input type="text" id="name" class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for ="">Email</label>
                        <input type="text" id="email"  class="email form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for ="">Phone</label>
                        <input type="text" id="phone" class="phone form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for ="">Address</label>
                        <input type="text"  id="address"  class="address form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_patient">Update</button>
                </div>
            </div>
        </div>
    </div>
{{--    End Edit Modal--}}

    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Patient Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="delete_stud_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_patient">Yes Delete</button>
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            fetchstudent();

            function fetchstudent() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-patient",

                    datatype: "json",
                    success: function (response) {
                        // console.log(response.patient);
                        $('tbody').html("");
                        $.each(response.patient, function (key, item) {
                            $('tbody').append(
                                '<tr>\
                                    <td>' + item.id + '</td>\
                                    <td>' + item.name + '</td>\
                                    <td>' + item.email + '</td>\
                                    <td>' + item.phone + '</td>\
                                    <td>' + item.address + '</td>\
                                     <td>' + item.created_at+ '</td>\
                               <td><button type="button" value="' + item.id + '" class="edit_btn btn btn-success btn-sm">Edit</button></td>\
                                    <td><button type="button" value="' + item.id + '"  class="delete_patient btn btn-danger btn-sm">Delete</button></td>\
                                </tr>');

                        });
                    }
                });
            }

            /// Edit Jquery data ////
            $(document).on('click','.edit_btn',function (e){
                e.preventDefault();
                var stud_id =  $(this).val();
                // alert(stud_id);
                $('#EditPatientModal').modal('show');
                $.ajax({
                    type:"GET",
                    url:"/edit-patient/"+stud_id,

                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#EditPatientModal').modal('hide');
                        } else {
                            // console.log(response.patient.name);
                            $('#edit-name').val(response.patient.name);

                            $('#edit-email').val(response.patient.email);
                            $('#edit-phone').val(response.patient.phone);
                            $('#edit-address').val(response.patient.address);
                            $('#stud_id').val(stud_id);
                        }
                        }

                });
                $('.btn-close').find('input').val('');


            });

            $(document).on('click', '.update_patient', function (e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#stud_id').val();
                // alert(id);

                var data = {
                    'name': $('#name').val(),

                    'email': $('#email').val(),
                    'phone': $('#phone').val(),
                    'address': $('#address').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-patient/" + id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#updateform_errList').html("");
                            $('#updateform_errList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#updateform_errList').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.update_patient').text('Update');
                        } else {
                            $('#updateform_errList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#EditPatientModal').find('input').val('');
                            $('.update_patient').text('Update');
                            $('#EditPatientModal').modal('hide');
                            fetchstudent();
                        }
                    }
                });

            });


///Add Jquery ////
            $(document).on('click','.add_patient',function (e){
                    e.preventDefault();
                    // console.log("hello");
$(this).text('Sending....')
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
                        if(response.status ==400) {
                            $('#saveform_errList').html("");
                            $('#saveform_errList').addClass('alert alert-danger')
                            $.each(response.errors, function (key, err_values) {
                                $('#saveform_errList').append('<li>' + err_values + '</li>');
                            });
                            $('.add_patient').text('Save');
                        }else{
                            $('#saveform_errList').html("");
                            $('#success_message').addClass('alert alert-success')
                            $('#success_message').text(response.message)
                            $('#AddPatientModal').find('input').val("");
                            $('.add_patient').text('Save');
                            $('#AddPatientModal').modal('hide');
                            fetchstudent();

                        }
                        }


                });
            });





        ///Delete Jquery ///

        $(document).on('click','.delete_patient',function (e) {
            e.preventDefault();
            $(this).text('Deleting..');
            var stud_id = $(this).val();
            // alert(stud_id);
            $('#delete_stud_id').val(stud_id);
            $('#DeleteModal').modal('show');

        });
        $(document).on('click','.delete_patient',function (e) {
            e.preventDefault();
            var  id = $('#delete_stud_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $.ajax({
            //     type: "DELETE",
            //     url: "/delete-patient/" + stud_id,
            //
            //     success: function (response) {
            //         // console.log(response);
            //         $('#success_message').addClass('alert alert-success')
            //         $('#success_message').text(response.message);
            //         $('#DeleteModal').modal('hide');
            //         fetchstudent();
            $.ajax({
                type: "DELETE",
                url: "/delete-patient/" + id,

                success: function (response) {
                    // console.log(response);

                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_patient').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        fetchstudent();
                    }

            });



        });






        });

    </script>
@endsection
