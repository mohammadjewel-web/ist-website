<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    function role()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        $users = User::all();
        return view('admin.role.role',[
            'permissions' => $permissions,
            'roles' => $roles,
            'users' => $users,
        ]);
    }
    function permissionStore(Request $request)
    {
        Permission::create([
            'name' => $request->permission_name
        ]);
        return back();
    }
    function roleStore(Request $request){
        $role = Role::create([
            'name' => $request->role_name
        ]);
        $role->givePermissionTo($request->permission);
        return back();
    }
    function assignRole(Request $request)
    {
        $user = User::find($request->user_id);
        $user->assignRole($request->role_id);
        return back();
    }
    function removeRole($user_id)
    {
        $user = User::find($user_id);
        $user->syncRoles([]);
        $user->syncPermissions([]);
        return back();
    }
    function EditUserRolePermission($user_id){
        $users = User::find($user_id);
        $permissions = Permission::all();
        return view('admin.role.edit-user-permission', [
            'users'=>$users,
            'permissions'=>$permissions,
        ]);
    }

    function permissionUpdate(Request $request){
        $user = User::find($request->user_id);
        $permissions = $request->permission;
        $user->syncPermissions($permissions);
        return redirect('/role');
    }

}
