<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'max:191'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->name,
        ]);
        $token = $user->createToken($user->name);
        return [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        
        if (Hash::check($request->password, $user->password)) {
            return [
                'message' => 'the provided credentials are not correct'
            ];
        }

        $token = $user->createToken($user->email);
        return [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        } else {
            return response()->json([
                'message' => 'User not authenticated'
            ], 401);
        }
    }


}


