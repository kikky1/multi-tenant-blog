<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        if($request->user()->role !== 'admin'){

            return response()->json(['message' => 'Forbidden'], 403);
        }
        $query =  Post::with(['user', 'tenant'])->latest();

        if($request->has('title')){

            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        if($request->has('user_id')){

            $query->where('user_id', $request->user_id);
        }

        if($request->has('tenant_id')){
            
            $query->where('tenant_id', $request->tenant_id);
        }

        $posts = $query->paginate($request->get('per_page', 5));

        return response()->json($posts);
    }
}
