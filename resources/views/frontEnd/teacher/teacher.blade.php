@extends('frontEnd.master')
@section('title')
    Teacher
@endsection
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Our</span> teachers</h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- teacher area start -->
<div class="all-teachers  pt--120 pb--70">
    <div class="container">
        <h3 style="margin-bottom: 15px; color: #e66702">Our Teacher</h3>
        <div class="row">
            @foreach($teachers as $teacher)
            <div class="col-lg-4 col-md-6">
                <div class="card mb-5" style="align-items: center">
                    <img src="{{asset('admin-assets/teacher-image')}}/{{ $teacher->image }}" style="border-radius: 50%; height: 230px; width: 230px;" alt="image">
                    <div class="card-body teacher-content p-25">
                        <h4 class="card-title mb-1"><a href="{{route('teacher.details', $teacher->slug)}}">{{ $teacher->name }}</a></h4>
                        <span class="primary-color d-block mb-4">{{ $teacher->position }}</span>
                        <ul class="list-inline">
                            <li><a href="{{ $teacher->facebook }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $teacher->github }}"><i class="fa fa-github"></i></a></li>
                            <li><a href="{{ $teacher->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                        </ul>
                    </div>
                </div><!-- card -->
            </div><!-- teacher single end -->
            @endforeach
        </div>
    </div>
</div>
<!-- teacher area end -->
@endsection
