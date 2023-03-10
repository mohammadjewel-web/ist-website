@extends('layouts.dashboard')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Slider</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="col-md-12 col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Slider Post</h6>
                    <form class="forms-sample" action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="id" value="{{ $slider->id }}" id="" placeholder="Title">
                                <input type="text" name="title" value="{{ $slider->title }}" class="form-control" id="exampleInputUsername2" placeholder="Title">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Heading</label>
                            <div class="col-sm-9">
                                <textarea name="heading"  id="summernote2" cols="30" rows="10">{!! $slider->heading !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="summernote" cols="30" rows="10">{!! $slider->description !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Url</label>
                            <div class="col-sm-9">
                                <input type="text" name="url" class="form-control" value="{{ $slider->url }}"  id="exampleInputUsername2" placeholder="Url">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                                <img id="img" src="{{asset($slider->image)}}" alt="" style="height: 50px; width: 50px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" checked name="publication_status" id="optionsRadios5" value="1">
                                        Published
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="publication_status" id="optionsRadios6" value="0">
                                        Unpublished
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
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
    <script>
        $(document).ready(function() {
            $('#summernote2').summernote();
        });
    </script>
@endsection
