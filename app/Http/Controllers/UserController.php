<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function deleteCheck(Request $request)
    {
        foreach ($request->check as $check_user){
            User::find($check_user)->delete();
        }
        return back();
    }
    function users()
    {
        $users = User::where('id', '!=', Auth::id())->orderBy('name', 'asc')->get();
        $total_user = User::count();
        return view('admin.users.user', compact('users', 'total_user'));
    }
    function trash()
    {
        $users = User::onlyTrashed()->where('id', '!=', Auth::id())->orderBy('name', 'asc')->get();
        $total_user = User::count();
        return view('admin.users.trash',[
            'users' => $users,
            'total_user' => $total_user,
        ]);
    }
    function restore($user_id){
        User::onlyTrashed()->find($user_id)->restore();
        return back();
    }
    function userDelete($user_id)
    {
        User::find($user_id)->delete();
        return back();
    }
    function userDeleteHard($user_id)
    {
        $image = User::onlyTrashed()->find($user_id);
        if ($image->image == null){
            User::onlyTrashed()->find($user_id)->forceDelete();
            return back();
        }else{
            $delete_from = public_path('admin-assets/user-photo/'.$image->image);
            unlink($delete_from);
            User::onlyTrashed($user_id)->forceDelete();
            return back();
        }
    }
    function profileEdit()
    {
        return view('admin.users.profile');
    }
    function profileUpdate(Request $request)
    {
        if ($request->password == ''){
            User::find(Auth::id())->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }
        else{
            if (Hash::check($request->old_password, Auth::user()->password)){
                User::find(Auth::id())->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
                return back()->with('success', 'User Updated');
            }else{
                return back()->with('massage', 'Old Password Not Match');
            }
        }
    }
    function photoUpdate(Request $request)
    {
        $uploaded_file = $request->photo;
        $extension = $uploaded_file->getclientOriginalExtension();
        $file_name = Auth::id().'.'.$extension;
        Image::make($uploaded_file)->save(public_path('admin-assets/user-photo/'.$file_name));
        User::find(Auth::id())->update([
            'image' => $file_name,
        ]);
        return back()->with('photo', 'Profile Picture Updated..');
    }
    function userCheckDeleteHard(Request $request)
    {
        if ($request->click == 1){
            foreach ($request->check as $user_check){
                User::onlyTrashed()->find($user_check)->restore();
            }
        }
        else{
            foreach($request->check as $user_check){
                $image = User::onlyTrashed()->find($user_check);
                if($image->image == null){
                    User::onlyTrashed()->find($user_check)->forceDelete();
                }
                else{
                    $delete = public_path('admin-assets/user-photo/'.$image->image);
                    unlink($delete);
                    User::onlyTrashed()->find($user_check)->forceDelete();
                }
            }
        }
        return back();
    }
}
