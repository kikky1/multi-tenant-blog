<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class AuthController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();
        return view('welcome', compact('posts'));
    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
      try
      {
        $IncomingField =  $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|string|max:255|confirmed',
           ]);
    
            $user = new User;
    
            $user->name         = $IncomingField['name'];
            $user->email        = $IncomingField['email'];
            $user->password     = Hash::make($IncomingField['password']);
            $user->status       = 'pending';
            $user->role         = 'user';
    
            $user->save();

            return redirect()->route('login')->with('success', 'You have been registered, Please Hold until the Admin Approve your Account');

      } 
      catch(Throwable $e)
      {
        return back()->with('error', $e->getMessage());
      }
    }

    public function login(Request $request)
    {
        try{
            
            $IncomingField  =  $request->validate([
                'email'     => 'required|email|exists:users,email',
                'password'  => 'required|string',
               ]);

            if(Auth::attempt($IncomingField)){

                if(Auth::user()->status === 'pending'){
                    return back()->with('error', 'Your account is still under pending');
                }
                $request->session()->regenerate();

                if(Auth::user()->role !== 'admin'){

                return redirect()->route('welcome')->with('success', 'You are welcome');

                } else {
                    return redirect()->route('admin.dashboard')->with('success', 'Welcome as an Admin');
                }
                

            } else {
                return back()->with('error', 'Invalid credentials');
            }
        }
        catch(\Exception $e)
        {
         
          return back()->with('error', $e->getMessage());
        }

    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
       $request->session()->regenerateToken();
       
    
        return redirect()->route('login')->with("success", "You're logged out");
    }
}
