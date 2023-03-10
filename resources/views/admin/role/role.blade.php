@extends('layouts.dashboard')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Role</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Role List</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Role</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $sl=>$role)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @foreach($role->getAllPermissions() as $permission)
                                                <span class="badge badge-primary">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
{{--                                            <a class="btn btn-danger btn-sm delete" data-link="{{route('tag.delete',$tag->id)}}" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>--}}
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
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h6 class="card-title">Add Permission</h6>--}}
{{--                        <h4 class="card-title text-success">{{session('massage')}}</h4>--}}
{{--                        <form class="forms-sample" action="{{route('permission.store')}}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputUsername1">Permission Name</label>--}}
{{--                                <input type="text" class="form-control" placeholder="Add Permission" id="exampleInputUsername1" name="permission_name">--}}

{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-primary mr-2">Add Permission</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Role</h6>
                        <h4 class="card-title text-success">{{session('massage')}}</h4>
                        <form class="forms-sample" action="{{route('role.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Permission Name</label>
                                <input type="text" class="form-control" placeholder="Role Name" name="role_name">
                            </div>
                            <h4>Permission</h4>
                            <div class="form-group">
                                @foreach($permissions as $permission)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-label" name="permission[]" value="{{$permission->id}}">
                                        {{$permission->name}}
                                        <i class="input-frame"></i>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Role</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">User List</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $sl=>$user)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            @forelse($user->getRoleNames() as $role)
                                                <span class="badge badge-primary">{{ $role }}</span>
                                            @empty
                                                <span class="badge badge-secondary">Not Assigned</span>
                                            @endforelse
                                        </td>
                                        <td>
                                            @forelse($user->getAllPermissions() as $permission)
                                                <span class="badge badge-warning">{{ $permission->name }}</span>
                                                @empty
                                                    <span class="badge badge-secondary">Not Assigned</span>
                                            @endforelse
                                        </td>
                                        <td>
                                             <a class="btn btn-info btn-sm" href="{{route('edit.user.role.permission',$user->id)}}">Edit</a>
                                             <a class="btn btn-danger btn-sm" href="{{route('remove.role',$user->id)}}">Remove</a>
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
                        <h6 class="card-title">Assign Role</h6>
                        <h4 class="card-title text-success">{{session('massage')}}</h4>
                        <form class="forms-sample" action="{{route('assign.role')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <select name="user_id" class="from-control user_id">
                                    <option value=""> -- Select User -- </option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="role_id" class="from-control">
                                    <option value=""> -- Select Role -- </option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary mr-2">Assign Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
