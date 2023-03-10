@extends('layouts.dashboard')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Category List</h6>
                            <h6 class="text-success">{{session('edit')}}</h6>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $sl=>$category)
                                        <tr>
                                            <td>{{$sl+1}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td><img src="{{asset('/admin-assets/category-image')}}/{{$category->category_image}}" alt=""></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{route('category.edit', $category->id)}}"><i data-feather="edit" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                                <a class="btn btn-danger btn-sm delete" data-link="{{route('category.delete',$category->id)}}" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Add Category</h6>
                            <h4 class="card-title text-success">{{session('massage')}}</h4>
                            <form class="forms-sample" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Category Name</label>
                                    <input type="text" class="form-control" value="{{ old('category_name') }}" id="exampleInputUsername1" autocomplete="off" placeholder="Category Name" name="category_name">
                                    @error('category_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
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
@section('footer_script')
                <script>
                   $('.delete').click(function (){
                       Swal.fire({
                           title: 'Are you sure?',
                           text: "You won't be able to revert this!",
                           icon: 'warning',
                           showCancelButton: true,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           confirmButtonText: 'Yes, delete it!'
                       }).then((result) => {
                           if (result.isConfirmed) {
                               var link = $(this).attr('data-link');
                               window.location.href = link;
                           }
                       })
                   })
                </script>
                @if(session('delete'))
                    <script>
                        Swal.fire(
                            'Deleted',
                            '{{ session('delete') }}',
                            'success'
                        )
                    </script>
    @endif
@endsection
