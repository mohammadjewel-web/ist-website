<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\category;
use App\Models\Comment;
use App\Models\Courses;
use App\Models\Event;
use App\Models\PopularPost;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Teacher;
use Carbon\Carbon;

class FrontendController extends Controller
{
    function index()
    {
        $slider_post = Post::latest('created_at')->take(3)->get();

        return view('frontEnd.home.index',[
            'slider_post' => $slider_post,
            'abouts' => About::latest('created_at')->where('publication_status',1)->take(1)->get(),
            'sliders'=>Slider::latest('created_at')->where('publication_status',1)->take(3)->get(),
            'courses' => Courses::all(),
            'teachers' => Teacher::all(),
            'blogs' => Post::all(),
            'event_post' => Event::where('status',1)->take(4)->get(),
        ]);
    }
    function about()
    {
        return view('frontEnd.about.about',[
            'abouts' => About::where('publication_status',1)->get(),
            'teachers' => Teacher::all(),
        ]);
    }
    function aboutDetails($id)
    {
        $about_details = About::where('id', $id)->get();
        return view('frontEnd.about.about-detail',[
            'about_details' => $about_details,
        ]);
    }
    function courses()
    {
        return view('frontEnd.courses.courses',[
            'courses' => Courses::all(),
        ]);
    }
    function coursesDetails($slug)
    {
        $course_details = Courses::where('slug', $slug)->get();
        return view('frontEnd.courses.courses-details',[
            'course_details' => $course_details,
        ]);
    }
    function teacher()
    {
        return view('frontEnd.teacher.teacher',[
            'teachers' => Teacher::all(),
        ]);
    }
    function teacherDetails($slug)
    {
        $teacher_details = Teacher::where('slug', $slug)->get();
        return view('frontEnd.teacher.teacher-details',[
            'teacher_details' => $teacher_details,
        ]);
    }
    function contact()
    {
        return view('frontEnd.contact.contact');
    }
    function event()
    {
        return view('frontEnd.event.event',[
            'all_event' => Event::where('status',1)->get(),

        ]);
    }
    function eventDetails($id)
    {
        $event_details = Event::where('id', $id)->get();
        return view('frontEnd.event.event-detail',[
            'event_details' => $event_details,
        ]);


    }
    function blogs()
    {
        return view('frontEnd.blog.blog',[
            'blogs' => Post::all(),
        ]);
    }
    function blogDetails($slug)
    {
        $blog_details = Post::where('slug', $slug)->get();

        $ip = getHostByName(getHostName());

        if(PopularPost::where('post_id', $blog_details->first()->id)->exists()){
            PopularPost::where('post_id', $blog_details->first()->id)->increment('total_view', 1);
        }
        else{
            PopularPost::insert([
                'post_id' => $blog_details->first()->id,
                'total_view' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $comments = Comment::with('replies')->where('post_id', $blog_details->first()->id)->whereNull('parent_id')->get();
        return view('frontEnd.blog.blog-details', [
            'blog_details' => $blog_details,
            'categories' => category::all(),
            'comments' => $comments,
        ]);
    }


}
