<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Event;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class EventController extends Controller
{
    function addEvent()
    {
        return view('admin.event.add-event');
    }
    function eventStore(Request $request)
    {
        $event_id = Event::insertGetId([
            'author_id' => Auth::id(),
            'title' => $request->title,
            'start_date' => $request->start_date,
            'time_start' => $request->time_start,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $request->image,
            'slug' => Str::lower(str_replace(' ', '-', $request->title)).'-'.rand(100000,999999),
            'created_at' => Carbon::now(),
        ]);
        $uploaded_file = $request->image;
        $extension = $uploaded_file->getClientOriginalExtension();
        $file_name = Str::lower(str_replace(' ', '-', Auth::user()->name)).'-'.rand(100000,999999).'.'.$extension;
        Image::make($uploaded_file)->save(public_path('admin-assets/event-image/'.$file_name));
        $update = Event::find($event_id)->update([
            'image' => $file_name,
        ]);
        return back();
    }
    function manageEvent()
    {
        $event_post = Event::all();
        return view('admin.event.manage-event', [
            'event_post'=>$event_post,
        ]);
    }

    function eventView($event_id)
    {
        $event = Event::find($event_id);
        return view('admin.event.view-event',[
            'event'=>$event,
        ]);
    }
    function eventDelete($event_id)
    {
        $post_imge = Event::find($event_id);
        $delete_from = public_path('admin-assets/event-image/'.$post_imge->image);
        unlink($delete_from);
        Event::find($event_id)->delete();
        return back();
    }
    function eventEdit($event_id)
    {
        $event_info = Event::find($event_id);
        return view('admin.event.edit',[
            'event_info'=>$event_info,
        ]);
    }
    function eventUpdate(Request $request)
    {
        if ($request->image == '') {
            Event::find($request->event_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
            ]);
        } else {
            $post_imge = Event::find($request->event_id);
            $delete_from = public_path('admin-assets/event-image/' . $post_imge->image);
            unlink($delete_from);
            $uploaded_file = $request->image;
            $extension = $uploaded_file->getClientOriginalExtension();
            $file_name = Str::lower(Auth::user()->name) . '-' . rand(1000000000, 9999999999) . '.' . $extension;
            Image::make($uploaded_file)->save(public_path('admin-assets/event-image/' . $file_name));
            Event::find($request->event_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'image' => $file_name,
            ]);
            return back();
        }
    }

}
