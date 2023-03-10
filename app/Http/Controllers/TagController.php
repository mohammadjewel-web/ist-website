<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function tag()
    {
        return view('admin.tag.tag',[
            'tags' => Tag::all(),
        ]);
    }
    function tagStore(Request $request)
    {
        $request->validate([
            'tag_name' =>'required|unique:tags',
        ]);
        Tag::insert([
            'tag_name' => $request->tag_name,
        ]);
        return back();
    }
    function tagDelete($tag_id)
    {
        Tag::find($tag_id)->delete();
        return back()->with('delete', 'Tag Delete Successfully..');
    }
}
