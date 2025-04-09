<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
       $post = Post::all();
        return view('admin.dashboard');
    }
    public function pending()
    {
       $pendingUsers = User::where('status', 'pending')->get();
        return view('admin.pending', compact('pendingUsers'));
    }

    public function approve(User $user)
    {

       $user =  User::findOrFail($user->id);

      $tenant = Tenant::create([
        'name' => $user->name . "'s name"
       ]);

       $user->status = 'approved';
       $user->tenant_id = $tenant->id;
       $user->save();

       return back()->with('success', 'User Account as been Approved and Tenant Created');
    }

    public function viewPost()
    {
        $posts = Post::with(['user', 'tenant'])->latest()->paginate(5);
        return view('admin.viewPost', compact('posts'));
    }
}
