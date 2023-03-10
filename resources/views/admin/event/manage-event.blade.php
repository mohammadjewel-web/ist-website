@extends('layouts.dashboard')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Event</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Event List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($event_post as $sl=>$post)
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <img width="100" src="{{ asset('admin-assets/event-image') }}/{{ $post->image }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('event.view', $post->id) }}" class="btn btn-success">View</a>
                                        <a href="{{ route('event.edit', $post->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('event.delete', $post->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
