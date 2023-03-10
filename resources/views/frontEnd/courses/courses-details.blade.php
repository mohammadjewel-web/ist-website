@extends('frontEnd.master')
@section('title')
    Courses Details
@endsection
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Single</span> Course DeatilS</h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- course area start -->
<div class="course-area">
    <div class="container">
        <div class="row">
            <!-- course details start -->
            <div class="col-lg-12 col-md-12 ptb--120">
                <div class="course-details">
                    <div class="cs-thumb mb-5">
                        <img src="{{ asset('admin-assets/courses-image') }}/{{ $course_details->first()->image }}" style="width: 1110px;height: 620px;" alt="image">
                        <div class="csd-hv-info has-color align-items-center">
                            <div class="course-dt-info">
                                <ul class="course-meta-details list-inline  w-100">
                                    <li>
                                        <p>Course</p>
                                        <span>{{$course_details->first()->courses_year}} Year</span>
                                    </li>
                                    <li>
                                        <p>Semester</p>
                                        <span>{{$course_details->first()->semester}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="cs-content">
                        <h3 class="mb-4">{{$course_details->first()->courses_name}}</h3>
                        <p>{{$course_details->first()->short_desp}}</p>
                        <p>{!! $course_details->first()->description !!}</p>
                    </div>
                </div>
            <!-- course details end -->
        </div>
    </div>
</div>
<!-- course area end -->
@endsection
