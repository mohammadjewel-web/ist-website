@extends('frontEnd.master')
@section('title')
    Event Details
@endsection
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Event Details</span></h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- course area start -->
<div class="blog-details-area ptb--120">
    <div class="container">
        <div class="row">
            <!-- course details start -->
            <div class="col-lg-12 col-md-12 align-items-center">
                <div class="course-details">
                    <div class="cs-thumb mb-5" style="text-align: center">
                        <img src="{{ asset('admin-assets/event-image') }}/{{ $event_details->first()->image }}" style="width: 1110px;height: 620px;" alt="image">
                    </div>
                    <div class="cs-content">
                        <h3 class="mb-4"><a href="#" style="color: #e66702">{{$event_details->first()->title}}</a></h3>
                        <p>Start Time : {{ $event_details->first()->time_start }}</p>
                        <p>Start Date : {{ $event_details->first()->start_date }}</p>
                        <p>{!! $event_details->first()->short_description !!}</p>
                        <p>{!! $event_details->first()->description !!}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- course area end -->
@endsection
