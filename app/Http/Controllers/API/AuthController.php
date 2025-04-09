<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {

     return User::all();
    }
    public function register(Request $request)
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

           return response()->json(['message' => 'Account Created, Awaiting for the Admin Approval.'], 201);

    }

    public function login(Request $request)
    {       
            $IncomingField  =  $request->validate([
                'email'     => 'required|email|exists:users,email',
                'password'  => 'required|string',
               ]);

              $user = User::where('email', $IncomingField['email'])->first();

              if(!$user || !Hash::check($IncomingField['password'], $user->password)){

                return response()->json(['message' => 'Invalid credentials'], 401);

              }

              if($user->status !== 'approved'){

                return response()->json(['message' => 'Account not Approved Yet'], 403);
              }

              $token = $user->createToken($user->name)->plainTextToken;

              return response()->json([
                'token' => $token,
                'user'  => $user
              ]);

    }

    public function show(User $user)
    {
        return $user;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => "You're Logged Out"]);
    }

}
