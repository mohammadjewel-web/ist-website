@extends('layouts.dashboard')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Slider</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <h4 class="text-success" style="margin: auto; padding-top: 10px">{{session('massage')}}</h4>
                    <div class="card-body">
                        <h6 class="card-title">Slider List</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Url</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($abouts as $sl=>$about)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$about->title}}</td>
                                        <td>{!! substr($about->url,0,20) !!}</td>
                                        <td>
                                            <img src="{{asset($about->image)}}" alt="">
                                        </td>
                                        <td>{{ $about->publication_status==1?'Published':'Unpublished'}}</td>
                                        <td>
                                            @if($about->publication_status==1)
                                                <a href="{{ route('status.about',['id'=>$about->id])}}" class="btn btn-success" title="Unpublished">
                                                    <i data-feather="arrow-up-circle" class="icon-xl"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('status.about',['id'=>$about->id])}}" class="btn btn-success" title="Published">
                                                    <i data-feather="arrow-down-circle" class="icon-xl"></i>
                                                </a>
                                            @endif

                                            <a href="{{ route('edit.about',['id'=>$about->id])}}" class="btn btn-info">
                                                <i data-feather="edit" class="icon-xl"></i>
                                            </a>
                                            <a href="#" data-link="{{route('delete.about',['id'=>$about->id])}}" class="btn btn-danger delete">
                                                <i data-feather="trash" class="icon-xl"></i>
                                            </a>
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
