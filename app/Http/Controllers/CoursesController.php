<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Courses;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class CoursesController extends Controller
{
    function addCourses()
    {
        return view('admin.courses.add-courses');
    }
    function coursesStore(Request $request)
    {
        $course_id = Courses::insertGetId([
            'author_id' => Auth::id(),
            'courses_name' => $request->courses_name,
            'courses_year' => $request->courses_year,
            'semester' => $request->semester,
            'short_desp' => $request->short_desp,
            'description' => $request->description,
            'image' => $request->image,
            'slug' => Str::lower(str_replace(' ', '-', $request->courses_name)).'-'.rand(100000,999999),
            'created_at' => Carbon::now(),
        ]);
        $uploaded_file = $request->image;
        $extension = $uploaded_file->getClientOriginalExtension();
        $file_name = Str::lower(str_replace(' ', '-', Auth::user()->name)).'-'.rand(100000,999999).'.'.$extension;

        Image::make($uploaded_file)->save(public_path('admin-assets/courses-image/'.$file_name));

        $update = Courses::find($course_id)->update([
            'image' => $file_name,
        ]);
        return back();
    }
    function manageCourses(){
        $courses = Courses::all();
        return view('admin.courses.manage-courses', [
            'courses'=>$courses,
        ]);
    }
    function courseView($course_id){
        $course = Courses::find($course_id);
        return view('admin.courses.view-course',[
            'course'=>$course,
        ]);
    }
    function courseDelete($course_id){
        $course_image = Courses::find($course_id);
        $delete_from = public_path('admin-assets/courses-image/'.$course_image->image);
        unlink($delete_from);
        Courses::find($course_id)->delete();
        return back()->with('delete', 'Course Delete Successfully..');
    }
    function courseEdit($course_id){
        $course_info = Courses::find($course_id);
        return view('admin.courses.edit',[
            'course_info'=>$course_info,
        ]);
    }
    function courseUpdate(Request $request){

        if($request->image ==''){
            Courses::find($request->course_id)->update([
                'courses_name' => $request->courses_name,
                'courses_year' => $request->courses_year,
                'semester' => $request->semester,
                'short_desp' => $request->short_desp,
                'description' => $request->description,
            ]);
        }
        else{
            $course_image = Courses::find($request->course_id);
            $delete_from = public_path('admin-assets/courses-image/'.$course_image->image);
            unlink($delete_from);
            $uploaded_file = $request->image;
            $extension = $uploaded_file->getClientOriginalExtension();
            $file_name = Str::lower(Auth::user()->name).'-'.rand(1000000000,9999999999).'.'.$extension;

            Image::make($uploaded_file)->save(public_path('admin-assets/courses-image/'.$file_name));

            Courses::find($request->course_id)->update([
                'courses_name' => $request->courses_name,
                'courses_year' => $request->courses_year,
                'semester' => $request->semester,
                'short_desp' => $request->short_desp,
                'description' => $request->description,
                'image'=>$file_name,
            ]);

            return back();
        }
    }
}
