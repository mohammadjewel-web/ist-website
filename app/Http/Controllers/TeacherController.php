<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
Use Image;

class TeacherController extends Controller
{
    function addTeacherInformation()
    {
        return view('admin.teacher.add-teacher-information');
    }
    function teacherInformationStore(Request $request)
    {
        $teacher_id = Teacher::insertGetId([
            'author_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'position' => $request->position,
            'nationality' => $request->nationality,
            'blood' => $request->blood,
            'marital_status' => $request->marital_status,
            'facebook' => $request->facebook,
            'github' => $request->github,
            'linkedin' => $request->linkedin,
            'image' => $request->image,
            'slug' => Str::lower(str_replace(' ', '-', $request->name)).'-'.rand(100000,999999),
            'created_at' => Carbon::now(),
        ]);
        $uploaded_file = $request->image;
        $extension = $uploaded_file->getClientOriginalExtension();
        $file_name = Str::lower(str_replace(' ', '-', Auth::user()->name)).'-'.rand(100000,999999).'.'.$extension;
        Image::make($uploaded_file)->save(public_path('admin-assets/teacher-image/'.$file_name));
        $update = Teacher::find($teacher_id)->update([
            'image' => $file_name,
        ]);
        return redirect('/manage/teacher/information/store');
    }
    function manageTeacherInformation(){
        $teachers = Teacher::all();
        return view('admin.teacher.manage-teacher-information', [
            'teachers'=>$teachers,
        ]);
    }
    function teacherDelete($teacher_id){
        $teacher_image = Teacher::find($teacher_id);
        $delete_from = public_path('admin-assets/teacher-image/'.$teacher_image->image);
        unlink($delete_from);
        Teacher::find($teacher_id)->delete();
        return back()->with('delete', 'Course Delete Successfully..');
    }
    function teacherView($teacher_id)
    {
        $teachers = Teacher::find($teacher_id);
        return view('admin.teacher.view-teacher',[
            'teachers'=>$teachers,
        ]);
    }
    function teacherEdit($teacher_id){
        $teacher_info = Teacher::find($teacher_id);
        return view('admin.teacher.edit',[
            'teacher_info'=>$teacher_info,
        ]);
    }
    function teacherUpdate(Request $request)
    {
        if($request->image ==''){
            Teacher::find($request->teacher_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'position' => $request->position,
                'nationality' => $request->nationality,
                'blood' => $request->blood,
                'marital_status' => $request->marital_status,
                'facebook' => $request->facebook,
                'github' => $request->github,
                'linkedin' => $request->linkedin,
            ]);
            return redirect('/manage/teacher/information/store');
        }
        else{
            $teacher_image = Teacher::find($request->teacher_id);
            $delete_from = public_path('admin-assets/teacher-image/'.$teacher_image->image);
            unlink($delete_from);
            $uploaded_file = $request->image;
            $extension = $uploaded_file->getClientOriginalExtension();
            $file_name = Str::lower(Auth::user()->name).'-'.rand(1000000000,9999999999).'.'.$extension;
            Image::make($uploaded_file)->save(public_path('admin-assets/teacher-image/'.$file_name));
            Teacher::find($request->teacher_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'position' => $request->position,
                'nationality' => $request->nationality,
                'blood' => $request->blood,
                'marital_status' => $request->marital_status,
                'facebook' => $request->facebook,
                'github' => $request->github,
                'linkedin' => $request->linkedin,
                'image'=>$file_name,
            ]);
            return redirect('/manage/teacher/information/store');
        }
    }
}
