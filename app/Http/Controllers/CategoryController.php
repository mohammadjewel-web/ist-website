<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Hash;
use Str;
use Image;

class CategoryController extends Controller
{
    function category()
    {
        $categories = Category::all();
        return view('admin.category.category',[
            'categories' => $categories,
        ]);
    }
    function categoryStore(Request $request)
    {
        $request->validate([
            'category_name' =>'required|unique:categories',
            'category_image' =>'required|mimes:png,jpg,jpeg,webp|file|max:2048',
        ]);


        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);
        $uploaded_file = $request->category_image;
        $extension = $uploaded_file->getclientOriginalExtension();
        $file_name = Str::lower(str_replace(' ', '-', $request->category_name)).'-'.rand(100000,999999).'.'.$extension;
        Image::make($uploaded_file)->resize(250, 200)->save(public_path('admin-assets/category-image/'.$file_name));

        Category::find($category_id)->update([
            'category_image' => $file_name,
        ]);
        return back()->with('massage', 'Category Save Successfully..');
    }
    function categoryDelete($category_id)
    {
        $category_image = Category::where('id', $category_id)->first()->category_image;
        $delete_from = public_path('admin-assets/category-image/'.$category_image);
        unlink($delete_from);
        Category::find($category_id)->delete();
        return back()->with('delete', 'Category Delete Successfully..');
    }
    function categoryEdit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit',[
            'category' => $category
        ]);
    }
    function categoryUpdate(Request $request)
    {
        if ($request->category_image == ''){
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
            ]);
            return back();
        }
        else{$category_image = Category::where('id', $request->category_id)->first()->category_image;
            $delete_from = public_path('admin-assets/category-image/'.$category_image);
            unlink($delete_from);

            $uploaded_file = $request->category_image;
            $extension = $uploaded_file->getclientOriginalExtension();
            $file_name = Str::lower(str_replace(' ', '-', $request->category_name)).'-'.rand(100000,999999).'.'.$extension;
            Image::make($uploaded_file)->resize(250, 200)->save(public_path('admin-assets/category-image/'.$file_name));

            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
                'category_image' => $file_name,
            ]);
            return redirect('/category')->with('edit', 'Updated Successfully...');
        }
    }
}
