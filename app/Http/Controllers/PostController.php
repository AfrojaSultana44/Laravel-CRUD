<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view ('create');
    }

    public function ourfilestore(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,webp',
        ]);

        $post = new Post;

        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->save();

        flash()->success('Your post has been created!');
        return redirect()->route("home");
    }

    public function editData($id){
        $post = POST::findOrFail($id);
        return view('edit',['ourPost'=>$post]);
    }

    public function updateData($id, Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,webp',
        ]);

        // update post
        $post = POST::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->save();

        flash()->success('Your post has been updated!');
        return redirect()->route("home");

    }

    public function deleteData($id){

        $post = POST::findOrFail($id);
        $post->delete();

        flash()->success('Your post has been deleted!');
        return redirect()->route("home");
    }
}


