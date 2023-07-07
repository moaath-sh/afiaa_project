<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return Response([
                'Message' => 'Bad Cred'
            ], 401);
        }
        $token = $user->createToken('AfiaApp')->plainTextToken;
        $response = [
            'name' => $user,
            'token' => $token,
        ];
        return $response;
    }

    public function logout(Request $request)
    {
        auth()->user()->currentAccessToken()->delete();
        $request->session()->regenerate();
        $request->session()->invalidate();
        return response([
            'message' => 'successfully Logged out'
        ]);
    }
}
