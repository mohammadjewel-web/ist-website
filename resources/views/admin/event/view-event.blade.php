@extends('layouts.dashboard')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Event View</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>View Post</h3>
                    </div>
                    <div class="card-body">
                        <h3>{{ $event->title }}</h3>
                        <h3>{{ $event->short_description }}</h3>
                        <div class="my-5">
                            <img src="{{ asset('admin-assets/event-image') }}/{{ $event->image }}" alt="">
                        </div>
                        <p>{!! $event->description !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
