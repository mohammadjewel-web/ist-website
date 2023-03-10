@extends('frontEnd.master')
@section('title')
    Event
@endsection
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Events </span></h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->

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
            @foreach($all_event as $event)
                <div class="col-md-6">
                    <div class="media align-items-center mb-5">
                        <div class="media-head primary-bg">
                            <span>{{$event->start_date}}</span>
                        </div>
                        <div class="media-body">
                            <h4><a href="{{route('event.details', $event->id)}}">{{$event->title}}</a></h4>
                            <p><i class="fa fa-clock-o"></i>{{$event->time_start}}</p>
                        </div>
                    </div> <!-- media -->
                </div><!-- col-md-6 -->
            @endforeach
        </div><!-- row -->
    </div><!-- container -->
</div><!-- event-area -->
<!-- events area end -->


@endsection
