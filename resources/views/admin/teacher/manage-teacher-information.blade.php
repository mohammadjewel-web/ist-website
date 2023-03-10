@extends('layouts.dashboard')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Courses</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Courses List</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Teacher Name</th>
                                    <th>Position</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $sl=>$teacher)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>
                                            <img src="{{asset('/admin-assets/teacher-image')}}/{{$teacher->image}}" alt="">
                                        </td>
                                        <td>{{$teacher->name}}</td>
                                        <td>{{$teacher->position}}</td>
                                        <td>{{$teacher->phone}}</td>
                                        <td>
                                            <a href="{{ route('teacher.view', $teacher->id) }}" class="btn btn-success">View</a>
                                            <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-primary">Edit</a>
                                            <a data-link="{{route('teacher.delete',$teacher->id)}}" href="#" class="btn btn-danger delete">Delete</a>

{{--                                            <a class="btn btn-danger btn-sm delete" data-link="{{route('tag.delete',$tag->id)}}" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>--}}
{{--                                            <a class="btn btn-danger btn-sm delete" data-link="" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
