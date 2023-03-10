@extends('layouts.dashboard')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="col-md-8 col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Category</h6>
                    <h4 class="card-title alert-success">{{session('massage')}}</h4>
                    <form class="forms-sample" action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Category Name</label>
                            <input type="hidden" class="form-control" value="{{ $category->id }}" name="category_id">
                            <input type="text" class="form-control" value="{{ $category->category_name }}" id="exampleInputUsername1" autocomplete="off" placeholder="Category Name" name="category_name">
                            @error('category_name')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <div class="mt-2">
                                <img src="{{asset('admin-assets/category-image')}}/{{$category->category_image}}" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Image</label>
                            <input type="file" name="category_image" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password">
                            @error('category_image')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
