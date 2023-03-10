@extends('layouts.dashboard')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tag</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Tag List</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $sl=>$tag)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$tag->tag_name}}</td>
                                        <td>
                                            <a class="btn btn-danger btn-sm delete" data-link="{{route('tag.delete',$tag->id)}}" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
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
                    <h6 class="card-title">Add New Tag</h6>
                    <h4 class="card-title alert-success">{{session('massage')}}</h4>
                    <form class="forms-sample" action="{{route('tag.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tag Name</label>
                            <input type="text" class="form-control" placeholder="Tag Name" id="exampleInputUsername1" name="tag_name">
                            @error('tag_name')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
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
