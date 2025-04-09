<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudController extends Controller
{
    public function showForm()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        $blogField = $request->validate([
            'title'     => 'required|string|min:3|max:100',
            'content'   => 'required|string|max:255'
        ]);

        $post               = new Post;
        $post->title        = $blogField['title'];
        $post->content      = $blogField['content'];
        $post->tenant_id    = Auth::user()->tenant_id;
        $post->user_id      = Auth::id();

        $post->save();

        return redirect()->route('welcome')->with('success', 'Post Created Successfully');
    }

    public function edit(Post $post)
    {
        $user = Auth::user();
      
        if($post->user_id !== $user->id){
            abort(403);
        }

        return view('crud.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $blogField = $request->validate([
            'title'     => 'required|string|min:3|max:100',
            'content'   => 'required|string|max:255'
        ]);

        $post->update([
            'title' => $blogField['title'],
            'content' => $blogField['content'],
            'user_id' => Auth::id(),
            'tenant_id' => Auth::user()->tenant_id
        ]);

        return redirect()->route('welcome')->with('success', 'Blog Post Updated Successfully');
    }

    public function destroy(Post $post)
    {
        if(Auth::user()->id === $post->user_id){

            $post->delete();

            return back()->with('success', 'Post Deleted Succesfully');
        }
    }
}
