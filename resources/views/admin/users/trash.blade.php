@extends('layouts.dashboard')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Trash</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('hard.delete.check') }}" method="POST">
                                    @csrf
                                <div class="card-header">
                                    <h3>Trash User List
                                        <button type="submit" name="click" value="1" class="btn btn-success ml-5">Restore Checked</button>
                                        <button type="submit" name="click" value="2" class="btn btn-danger ml-5">Delete Checked</button>
                                        <span class="float-right">
                                            Total : {{ $total_user }}
                                        </span>
                                    </h3>
                                </div>
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll">Check All</th>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $sl=>$user)
                                        <tr>
                                            <td><input type="checkbox" name="check[]" value="{{$user->id}}"></td>
                                            <td>{{ $sl+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->image == null)
                                                    <img src="{{ Avatar::create($user->name)->toBase64() }}" />
                                                @else
                                                    <img width="50" src="{{asset('admin-assets/user-photo')}}/{{ $user->image }}" alt="profile">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('user.restore', $user->id)}}" class="btn btn-success">Restore</a>
                                                <a href="{{route('user.delete.hard', $user->id)}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        $("#checkAll").click(function (){
            $('input:checkbox').not(this).prop('checked', this.checked);
        })
    </script>

@endsection
