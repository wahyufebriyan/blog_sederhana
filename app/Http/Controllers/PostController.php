<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DataTables;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'kategori' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $inputvalidate = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profile = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profile);
            $inputvalidate['image'] = "$profile";
        }

        Post::create($inputvalidate);

        return redirect()->route('posts.index')
            ->with('success','Created successfully.');
    }

    public function update(Request $request, Post $post) {

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'kategori' => 'required',
            'description' => 'required',
        ]);

        $inputvalidate = $request->all();

        if ($image = $request->file('image')) {
            $path = 'images/';
            $profile = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $profile);
            $inputvalidate['image'] = "$profile";
        }else{
            unset($inputvalidate['image']);
        }

        $post->update($inputvalidate);

        return redirect()->route('posts.index')
            ->with('success','Updated successfully.');
    }

    public function view($id) {

        $post = Post::find($id);
        return view('posts', compact('post'));
    }

    public function destroy(Post $post) {

        $image_path = public_path().'/images/'.$post->image;
        unlink($image_path);

        $post->delete();
        return redirect()->route('posts.index')
                        ->with('success','Deleted successfully');

    }
}
