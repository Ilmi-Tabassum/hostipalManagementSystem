@extends('layouts.app')

@section('content')
<div>
    <div class="content-wrapper">
    <div id="page-content" style="margin-top: 20px;margin-left: 20px">

<section class="content-header" style="margin-right: 1%;height: 50px">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="input-group input-group-sm">
                    <button type="button" class="btn btn-success" style="border-color:#ee1b22">
                        <i class="fa fa-plus" aria-hidden="true"></i> <span style="margin-left:5px">Hospital Management System</span>
                    </button>
            </div>

                </ol>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
</section>


<div style="clear:both; height:10px;"></div>

<div class="card"  style="margin-right:1%">
    <div class="card-header">
        <div class="input-group input-group-sm">
            <button type="button" class="btn btn-primary" style="background-color:#ee1b22;border-color:#ee1b22 ">
                <i class="fa fa-plus" aria-hidden="true"></i> <span style="margin-left:5px">Doctor Records</span>
            </button>

<div class="card"  style="margin-right:1%">
    <div class="card-header">
        <div class="input-group input-group-sm">

            <a href="{{route('doctors')}}" class="btn medium hover-purple bg-red">
                <i class="fa fa-eye" aria-hidden="true"></i> <span style="margin-left: 5px">View Doctors</span>
            </a>
        </div>
    </div>
</div>
        </div>
    </div>
            <div style="clear:both; height:10px;"></div>

            <div class="card"  style="margin-right:1%">
                <div class="card-header">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-primary" style="background-color:#ee1b22;border-color:#ee1b22 ">
                            <i class="fa fa-plus" aria-hidden="true"></i> <span style="margin-left:5px">Patient Records</span>
                        </button>


                <div style="clear:both; height:10px;"></div>
                        <div class="card"  style="margin-right:1%">
                            <div class="card-header">
                                <div class="input-group input-group-sm">
                                    <button type="button" class="btn btn-primary" style="background-color:#ee1b22;border-color:#ee1b22 ">
                                    <a href="{{route('patient')}}" class="btn medium hover-purple bg-red">
                                        <i class="fa fa-eye" aria-hidden="true"></i> <span style="margin-left: 5px">View Patients</span>
                                    </a>
                                    </button>
                                    </a>

                                    <div class="card"  style="margin-right:1%">
                                        <div class="card-header">
                                            <div class="input-group input-group-sm">
                                                <button type="button" class="btn btn-primary" style="background-color:#ee1b22;border-color:#ee1b22 ">
                                                <a href="{{route('dashboard')}}" class="btn medium hover-purple bg-red">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> <span style="margin-left: 5px">View Medicines</span>
                                                </a>
                                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card"  style="margin-right:1%">
                    <div class="card-header">
                        <div class="input-group input-group-lg">
                        <button class="text-white bg-dark"><a href="{{url('/')}}">logOut</a></button>
                        </div>
                    </div>
                </div>

@endsection
