<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function slider()
    {
        return view('admin.slider.slider');
    }
     function addSlider(Request $request){
        $slider =new Slider();
        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->description = $request->description;
        $slider->image = $this->image($request);
        $slider->url = $request->url;
        $slider->publication_status = $request->publication_status;
        $slider->save();
        return redirect('/slider/manage')->with('massage', 'Slider Save Successfully...');
    }
     function image(Request $request){
        $image = $request->file('image');
        $imageName ='slider'.'-'.rand().'.'.$image->extension();
        $directory = 'admin-assets/slider-image/';
        $imageurl = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageurl;

    }
    function manageSlider(){
        return view('admin.slider.manage-slider',[
            'sliders' => Slider::all(),
        ]);
    }
    function statusSlider($id){
        $slider=Slider::find($id);
        if($slider->publication_status==1){
            $slider->publication_status=0;
            $slider->save();
            return back();
        }
        else{
            $slider->publication_status=1;
            $slider->save();
            return back();
        }
    }
    function editSlider($id){
        return view('admin.slider.edit-slider',[
            'slider'=>Slider::find($id)
        ]);

    }
    function updateSlider(Request $request){
        $slider=Slider::find($request->id);
        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->description = $request->description;
        if ($request->image){
            unlink($slider->image);
            $slider->image = $this->image($request);
        }
        $slider->url = $request->url;
        $slider->publication_status = $request->publication_status;
        $slider->save();
        return redirect('/slider/manage')->with('massage', 'Slider Updated Successfully...');
    }
    function deleteSlider($id){
        $slider=Slider::find($id);
        if ($slider->image){
            unlink($slider->image);
            $slider->delete();
            return back();
        }else{
            $slider->delete();
            return back()->with('delete', 'Slider Delete Successfully..');
        }
    }
}
