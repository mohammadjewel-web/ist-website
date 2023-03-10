@extends('frontEnd.master')
@section('title')
    Home
@endsection
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner slider-image" style="background: black">
        @foreach($sliders as $slider)
            <div class="carousel-item @if($loop->first)active @endif">
                <img src="{{asset($slider->image)}}" style="opacity: 0.6; width: 100%;"
                     alt="">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- slider area end -->

<!-- about area start -->
<div class="about-area pt--120">
    <div class="container">
        <div class="row">
            @foreach($abouts as $about)
                <div class="col-lg-6">
                    <div class="about-left-content">
                        <div class="section-title">
                            <span class="text-uppercase">about us</span>
                            <h2 style="color: #e66702">{{$about->title}}</span></h2>
                        </div>
                        <p>{!! substr($about->description,0,300) !!}</p>
                        <a class="btn btn-primary btn-round" href="{{route('about')}}">Learn more</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="abt-right-thumb">
                        <div class="abt-rt-inner">
                            <img src="{{asset($about->image)}}" style="width: 460px;height: 300px;" alt="">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- about area end -->

<!-- course area start -->
<div class="course-area  pt--120 pb--70">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="section-title-style2 black-title title-tb text-center">
                    <span>build your career</span>
                    <h2 class="primary-color">Our Department</h2>
                </div>
            </div>
        </div>
        <div class="commn-carousel owl-carousel card-deck">
            @foreach($courses as $course )
                <div class="card mb-5">
                    <div class="course-thumb">
                        <img src="{{ asset('admin-assets/courses-image') }}/{{ $course->image }}" style="height: 230px;" alt="image">
                        {{--                        <span class="cs-price primary-bg">$150</span>--}}
                    </div>
                    <div class="card-body p-25">
                        <div class="course-meta-title mb-4">
                            <div class="course-meta-text">
                                <h4><a href="{{route('courses.details', $course->slug)}}" style="font-size: 17px">{{$course->courses_name}}</a></h4>
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
                </div>
            @endforeach<!-- card -->
        </div>
    </div>
</div>
<!-- course area end -->

<!-- take toure area start -->
<div class="take-toure-area ptb--120" style="background: rgba(0, 0, 0, 0.7)url({{asset('frontEndAssets')}}/assets/images/bg/IST_Campus.jpeg.jpeg) center/cover no-repeat; background-blend-mode: darken">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="section-title sec-style-two">
                    <img class="title-top-shape" src="{{asset('frontEndAssets')}}/assets/images/bg/istlogo.png" alt="image">
                    <span class="text-uppercase">Take A Tour</span>
                    <h2>Video Tour on Edification</h2>
                </div>
            </div>
        </div>
        <div class="video-area">
            <a class="expand-video" href="https://www.youtube.com/watch?v=-6Pq4zwAOuc"><i class="fa fa-play"></i></a>
        </div>
    </div>
</div>
<!-- take toure area end -->

<!-- teacher area start -->
<div class="teacher-area pb--70">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="section-title-style2 black-title title-tb text-center">
                    <span>Learn from best</span>
                    <h2 class="primary-color">Our Teacher</h2>
                </div>
            </div>
        </div>
        <div class="commn-carousel owl-carousel card-deck">
            @foreach($teachers as $teacher)
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
                </div>
            @endforeach
            <!-- card -->
        </div>
    </div>
</div>
<!-- teacher area end -->

<!-- events area start -->
<div class="event-area  pt--120 pb--80">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-title">
                    <span class="text-uppercase">Join with us</span>
                    <h2>Upcoming Events to </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($event_post as $post)
                <div class="col-md-6">
                    <div class="media align-items-center mb-5">
                        <div class="media-head primary-bg">
                            <span>{{$post->start_date}}</span>
                        </div>
                        <div class="media-body">
                            <h4><a href="{{route('event')}}">{{$post->title}}</a></h4>
                            <p><i class="fa fa-clock-o"></i>{{$post->time_start}}</p>
                        </div>
                    </div> <!-- media -->
                </div><!-- col-md-6 -->
            @endforeach
        </div><!-- row -->
    </div><!-- container -->
</div><!-- event-area -->
<!-- events area end -->

<!-- testimonial area start -->
<div class="testimonial-area ptb--120">
    <img class="tst-bg" src="{{asset('frontEndAssets')}}/assets/images/bg/tst-bg-shape.png" alt="image">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="tst-carousel owl-carousel">
                    <div class="testimonial-content pb--40">
                        <div class="section-title sec-style-two">
                            <span class="text-uppercase primary-color mb-0">happy students</span>
                            <h2>Testimonial </h2>
                        </div>
                        <h3>‘‘ Vous devez profiter de la vie. Toujours aimez, les personnespositives penser. ‘‘</h3>
                        <h4>Kawsar Ahhamed</h4>
                        <span>App Developer</span>
                    </div>
                    <div class="testimonial-content pb--40">
                        <div class="section-title sec-style-two">
                            <span class="text-uppercase primary-color mb-0">happy students</span>
                            <h2>Testimonial</h2>
                        </div>
                        <h3>‘‘ Vous devez profiter de la vie. Toujours aimez, les personnespositives penser. ‘‘</h3>
                        <h4>Kawsar Ahhamed</h4>
                        <span>App Developer</span>
                    </div>
                    <div class="testimonial-content pb--40">
                        <div class="section-title sec-style-two">
                            <span class="text-uppercase primary-color mb-0">happy students</span>
                            <h2>Testimonial</h2>
                        </div>
                        <h3>‘‘ Vous devez profiter de la vie. Toujours aimez, les personnespositives penser. ‘‘</h3>
                        <h4>Kawsar Ahhamed</h4>
                        <span>App Developer</span>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- testimonial-area -->

<!-- blog area start -->
<div class="feature-blog  pt--120 pb--70">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title">
                    <span class="text-uppercase">Top stories</span>
                    <h2>Blog & news</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog-carousel owl-carousel card-deck">
                @foreach($blogs as $blog)
                    <div class="card mb-5">
                        <img class="card-img-top" src="{{asset('admin-assets/post-image')}}/{{ $blog->image }}" style="width: 348px; height: 216px;" alt="image">
                        <div class="card-body p-25">
                            <ul class="list-inline primary-color mb-3">
                                <li><i class="fa fa-clock-o"></i> {{$blog->created_at->format('M')}} {{$blog->created_at->format('d')}}, {{$blog->created_at->format('Y')}}</li>
                                <li><i class="fa fa-user"></i>{{ $blog->rel_to_user->name}}</li>
                            </ul>
                            <h4 class="card-title mb-4"><a href="{{route('blog.details', $blog->slug)}}">{{ $blog->title }}</a></h4>
                            <p class="card-text">{!! substr($blog->short_desp,0,89) !!}</p>
                            <a class="btn btn-primary btn-round btn-sm" href="{{route('blog.details', $blog->slug)}}"> Read More </a>
                        </div>
                    </div><!-- card -->
                @endforeach
            </div><!-- blog-carousel -->
        </div><!-- blog-carousel -->
    </div>
</div> <!-- blog area end -->

<!-- cta area start -->
<div class="cta-area primary-bg has-color ptb--50">
    <div class="container">
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
@endsection
@section('script')

@endsection
