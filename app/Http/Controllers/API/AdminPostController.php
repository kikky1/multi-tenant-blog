<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        if($request->user()->role !== 'admin'){

            return response()->json(['message' => 'Unauthorized'], 403);
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

    public function pending()
    {
       $user = User::where('status', 'pending')->get();

       return response()->json($user);
    }

    public function approve(Request $request, $id)
    {
        if($request->user()->role !== 'admin'){
            return response()->json(['message' => 'Unauthorized'], 403);
        }

       $user = User::findOrFail($id);

       if($user->status === 'approved'){
            return response()->json(['message' => 'Accoout Approved Already']);
       }


          $tenant = Tenant::create([
                'name' => $user->name . "'s Tenant"
            ]);
        
            $user->update([
                'status' => 'approved',
                'tenant_id' => $tenant->id
            ]);

        return response()->json(['message' => 'Account Approved and Tenant created']);
       
    }
}
