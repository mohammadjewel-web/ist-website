@extends('layouts.dashboard')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Teacher View</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card" style="text-align: center; align-items: center; padding-top: 10px">
                    <img src="{{asset('admin-assets/teacher-image')}}/{{ $teachers->image }}" style="width: 150px; height: 150px; border-radius: 50%" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4>{{$teachers->name}}</h4>
                        <h5 style="color:#000000a1;">{{$teachers->position}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->name}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->email}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Mobile Number</label>
                                <div class="col-sm-9">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->phone}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->address}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Position</label>
                                <div class="col-sm-9">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->position}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nationality</label>
                                <div class="col-sm-9">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->nationality}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Blood</label>
                                <div class="col-sm-9">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->blood}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Blood</label>
                                <div class="col-sm-9">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->marital_status}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Social Media Links</label>
                                <div class="col-sm-9">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->facebook}}</label>
                                    <label style="margin-left: 60px" for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->github}}</label>
                                    <label style="margin-left: 60px" for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$teachers->linkedin}}</label>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
