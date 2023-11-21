<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //
    public function index() {
        $posts_data = Post::get();
        return view('admin.post', compact('posts_data'));
    }

    public function create() {
        return view('admin.post_create');
    }

    public function store(Request $request) {
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg,gif',
            'heading' => 'required',
            'slug' => 'required|alpha_dash|unique:posts',
            'short_description' => 'required',
            'description' => 'required'
        ]);

        $obj = new Post();
        $ext = $request->file('photo')->extension();
        $final_name = 'post_'.time().'.'.$ext;
        //Move the new photo
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->title = $request->title;
        $obj->meta_description = $request->meta_description;
        $obj->save();

        return redirect()->route('admin_post_create')->with('success', 'Data is saved successfully');
    }

    public function edit($id) {
        $post_single = Post::where('id', $id)->first();
        return view('admin.post_edit', compact('post_single'));
    }

    public function update(Request $request, $id) {
        $post_single = Post::where('id', $id)->first();
        $request->validate([
            'title' => 'required',
            'slug' => ['required','alpha_dash',Rule::unique('posts')->ignore($id)],
            'short_description' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:png,jpg,jpeg,gif'
            ]);

            //Remove the old photo
            unlink(public_path('uploads/'.$post_single->photo));
            //Get extension of the new photo
            $ext = $request->file('photo')->extension();
            $final_name = 'post_'.time().'.'.$ext;

            //Move the new photo
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $post_single->photo = $final_name;
        }

        $post_single->heading = $request->heading;
        $post_single->slug = $request->slug;
        $post_single->short_description = $request->short_description;
        $post_single->description = $request->description;
        $post_single->title = $request->title;
        $post_single->meta_description = $request->meta_description;
        $post_single->update();

        return redirect()->route('admin_post')->with('success', 'Data is updated successfully');
    }

    public function delete($id) {
        $post_single = Post::where('id', $id)->first();
        unlink(public_path('uploads/'.$post_single->photo));
        Post::where('id', $id)->delete();
        return redirect()->route('admin_post')->with('success', 'Data is deleted successfully');
    }
}
