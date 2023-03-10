@extends('frontEnd.master')
@section('title')
    Courses
@endsection
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Our</span> Courses</h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- course area start -->
<div class="course-area  pt--120 pb--70">
    <div class="container">
        <div class="row">
            <!-- course single start -->
            @foreach($courses as $course )
            <div class="col-lg-4 col-md-6">
                <div class="card mb-5">
                    <div class="course-thumb">
                        <img src="{{ asset('admin-assets/courses-image') }}/{{ $course->image }}" style="height: 230px;" alt="image">
                    </div>
                    <div class="card-body  p-25">
                        <div class="course-meta-title mb-4">
                            <div class="course-meta-text">
                                <h4><a href="{{route('courses.details', $course->slug)}}" style="font-size: 17px">{{$course->courses_name}}</h4>
                                <ul class="course-meta-stats">
                                    <li><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></li>
                                    <li>36 <i class="fa fa-comment"></i></li>
                                    <li>85 <i class="fa fa-heart"></i></li>
                                </ul>
                            </div>
                        </div>
                        <p>{!! substr($course->short_desp,0,100) !!}</p>
                        <ul class="course-meta-details list-inline  w-100">
                            <li>
                                <p>Course</p>
                                <span>{{$course->courses_year}} Year</span>
                            </li>
                            <li>
                                <p>Semester</p>
                                <span>{{$course->semester}}</span>
                            </li>
                        </ul>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- course area end -->


@endsection
