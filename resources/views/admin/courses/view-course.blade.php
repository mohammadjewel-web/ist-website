@extends('layouts.dashboard')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course View</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>View Course</h3>
                    </div>
                    <div class="card-body">
                        <h6>Name : {{ $course->courses_name }}</h6>
                        <h6>Year : {{ $course->courses_year }}</h6>
                        <h6>Semester : {{ $course->semester }}</h6>
                        <h6>Short Description : {{ $course->short_desp }}</h6>
                        <div class="my-5">
                            <img src="{{ asset('admin-assets/courses-image') }}/{{ $course->image }}" alt="">
                        </div>
                        <h6>Description : </h6>
                        <p>{!! $course->description !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
