@extends('frontEnd.master')
@section('title')
    About
@endsection
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>About </span>Us</h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- about area start -->
<div class="about-area ptb--120">
    <div class="container">
        <h3 class="text-uppercase" style="text-align: center">About Us</h3>
        @foreach($abouts as $about)
        <div class="row" style="margin: 20px 0">
            <div class="col-lg-6">
            <div class="about-left-content">
                <div class="section-title">
                    <h2 style="color: #e66702">{{$about->title}}</span></h2>
                </div>
                <p>{!! substr($about->description,0,300) !!}</p>

                <a href="{{route('about.details', $about->id)}}" class="btn btn-primary btn-round">Read more</a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="abt-right-thumb">
                <div>
                    <img src="{{asset($about->image)}}" style="width: 460px;height: 300px;" alt="">
                </div>
            </div>
        </div>
            @endforeach
        </div>
    </div>
</div>
<!-- cta area start -->
<div class="container pb--120">
    <div class="cta-area primary-bg has-color ptb--50 pl-5 pr-5">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="cta-content">
                    <p class="mb-2">Click to Join the Advance Workshop</p>
                    <h2>Training in advance networking</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cta-btn">
                    <a class="btn btn-light btn-round" href="#">Join Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cta area end -->

<!-- teacher area start -->
<div class="teacher-area befr-themeoclor pb--70">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="section-title">
                    <span class="text-uppercase">Learn from <span class="primary-color">the best</span></span>
                    <h2>Our Teachers </h2>
                </div>
            </div>
        </div>
        <div class="teacher-carousel owl-carousel card-deck">
            @foreach($teachers as $teacher)
            <div class="card mb-5" style="align-items: center">
                <img src="{{asset('admin-assets/teacher-image')}}/{{ $teacher->image }}" style="border-radius: 50%; height: 230px; width: 230px;" alt="image">
                <div class="card-body teacher-content p-25">
                    <h4 class="card-title mb-4"><a href="{{route('teacher.details', $teacher->slug)}}">{{ $teacher->name }}</a></h4>
                    <span class="primary-color d-block mb-3">{{ $teacher->position }}</span>
                    <ul class="list-inline">
                        <li><a href="{{ $teacher->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $teacher->github }}"><i class="fa fa-github"></i></a></li>
                        <li><a href="{{ $teacher->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                    </ul>
                </div>
            </div><!-- card -->
            @endforeach
        </div>
    </div>
</div>
<!-- teacher area end -->

@endsection
