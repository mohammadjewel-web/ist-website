@extends('layouts.dashboard')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Event Edit</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Edit Post</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('event.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" name="event_id" value="{{ $event_info->id }}">
                            <div class="mb-3">
                                <label for="">Event Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $event_info->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Short Description</label>
                                <input type="text" class="form-control" name="short_description" value="{{ $event_info->short_description }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Long Description</label>
                                <textarea name="description" class="form-control" cols="30" id="summernote" rows="20">
                            {!! $event_info->description !!}
                        </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <div class="my-2">
                                    <img id="blah" width="200" src="{{ asset('admin-assets/event-image') }}/{{ $event_info->image }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 m-auto">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary form-control">Update Event</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
