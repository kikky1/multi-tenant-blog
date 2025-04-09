<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
       $posts = Post::where('tenant_id', $request->user()->tenant_id)->get();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

      $post =  Post::create([
            'title' => $validate['title'],
            'content' => $validate['content'],
            'user_id' => $request->user()->id,
            'tenant_id' => $request->user()->tenant_id
        ]);

        return response()->json($post, 201);

    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorizeTenantAccess($post);

        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $post->update($validate);

        return response()->json($post);

    }

    public function destroy(Post $post)
    {
       $this->authorizeTenantAccess($post);

        $post->delete();

        return response()->json(['message' => 'Post Deleted']);
    }

    protected function authorizeTenantAccess(Post $post)
    {
        if (Auth::user()->tenant_id !== $post->tenant_id) {
            abort(403, 'Unauthorized');
        }
    }

}
