<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Str;

class PostController extends Controller
{
    function addPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.add-post',[
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
    function postStore(Request $request)
    {
        $after_implode_tag = implode(',', $request->tag_id);
        $post_id = Post::insertGetId([
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'short_desp' => $request->short_desp,
            'tag_id' =>$after_implode_tag,
            'image' => $request->image,
            'slug' => Str::lower(str_replace(' ', '-', $request->title)).'-'.rand(100000,999999),
            'created_at' => Carbon::now(),
        ]);
        $uploaded_file = $request->image;
        $extension = $uploaded_file->getClientOriginalExtension();
        $file_name = Str::lower(str_replace(' ', '-', Auth::user()->name)).'-'.rand(100000,999999).'.'.$extension;
        Image::make($uploaded_file)->save(public_path('admin-assets/post-image/'.$file_name));
        $update = Post::find($post_id)->update([
            'image' => $file_name,
        ]);
        return back();
    }
    function myPost()
    {
        $mypost = Post::all();
        return view('admin.post.post', [
            'mypost'=>$mypost,
        ]);
    }
    function postView($post_id)
    {
        $post = Post::find($post_id);
        return view('admin.post.view-post',[
            'post'=>$post,
        ]);
    }
    function postDelete($post_id)
    {
        $post_imge = Post::find($post_id);
        $delete_from = public_path('admin-assets/post-image/'.$post_imge->image);
        unlink($delete_from);
        Post::find($post_id)->delete();
        return back();
    }
    function postEdit($post_id)
    {
        $categories = Category::all();
        $tags_main = Tag::all();
        $post_info = Post::find($post_id);
        return view('admin.post.edit',[
            'categories'=>$categories,
            'tags_main'=>$tags_main,
            'post_info'=>$post_info,
        ]);
    }
    function postUpdate(Request $request)
    {
        $after_emplode_tag = implode(',', $request->tag_id);

        if ($request->image == '') {
            Post::find($request->post_id)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'tag_id' => $after_emplode_tag,
                'short_desp' => $request->short_desp,
                'description' => $request->description,
            ]);
        } else {
            $post_imge = Post::find($request->post_id);
            $delete_from = public_path('admin-assets/post-image/' . $post_imge->image);
            unlink($delete_from);
            $uploaded_file = $request->image;
            $extension = $uploaded_file->getClientOriginalExtension();
            $file_name = Str::lower(Auth::user()->name) . '-' . rand(1000000000, 9999999999) . '.' . $extension;
            Image::make($uploaded_file)->save(public_path('admin-assets/post-image/' . $file_name));
            Post::find($request->post_id)->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'tag_id' => $after_emplode_tag,
                'short_desp' => $request->short_desp,
                'description' => $request->description,
                'image' => $file_name,
            ]);
            return back();
        }
    }
}
