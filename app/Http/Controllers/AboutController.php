<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    function about()
    {
        return view('admin.about.about');
    }
    function addAboutUs(Request $request)
    {
        $about =new About();
        $about->title = $request->title;
        $about->description = $request->description;
        $about->image = $this->image($request);
        $about->url = $request->url;
        $about->publication_status = $request->publication_status;
        $about->save();
        return redirect('/about/manage')->with('massage', 'About Save Successfully...');
    }
    function image(Request $request){
        $image = $request->file('image');
        $imageName ='about'.'-'.rand().'.'.$image->extension();
        $directory = 'admin-assets/about-file/';
        $imageurl = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageurl;

    }
    function manageAbout(){
        return view('admin.about.manage-about',[
            'abouts' => About::all(),
        ]);
    }
    function statusAbout($id){
        $about=About::find($id);
        if($about->publication_status==1){
            $about->publication_status=0;
            $about->save();
            return back();
        }
        else{
            $about->publication_status=1;
            $about->save();
            return back();
        }
    }
    function editAbout($id){
        return view('admin.about.edit-about',[
            'about'=>About::find($id)
        ]);

    }
    function updateAbout(Request $request){
        $about=About::find($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        if ($request->image){
            unlink($about->image);
            $about->image = $this->image($request);
        }
        $about->url = $request->url;
        $about->publication_status = $request->publication_status;
        $about->save();
        return redirect('/about/manage')->with('massage', 'About Updated Successfully...');


    }
    function deleteAbout($id){
        $about=About::find($id);
        if ($about->image){
            unlink($about->image);
            $about->delete();
            return back();
        }else{
            $about->delete();
            return back()->with('delete', 'About Delete Successfully..');
        }

    }
}
