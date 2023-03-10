@extends('layouts.dashboard')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Add New Event</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="">Event Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="">Event Time Start</label>
                                <input type="text" class="form-control" name="time_start">
                            </div>
                            <div class="mb-3">
                                <label for="">Event Start Date</label>
                                <input type="text" class="form-control" name="start_date">
                            </div>
                            <div class="mb-3">
                                <label for="">Short Description</label>
                                <input type="text" class="form-control" name="short_description">
                            </div>
                            <div class="mb-3">
                                <label for="">Long Description</label>
                                <textarea name="description" class="form-control" cols="30" id="summernote" rows="20"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for=""> Image</label>
                                <div class="md-3" style="display: inline-flex">
                                    <input type="file" class="form-control" name="image" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                                    <img id="img" src="" alt="" style="height: 50px; width: 50px">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 m-auto">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary form-control">Add Post</button>
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
