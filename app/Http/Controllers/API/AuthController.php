<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken('my_token')->plainTextToken;
            $response = [
                'success' => true,
                'token'   => $token,
                'name' => $user->name,
                'id' => $user->id,
                'message' =>  'user logged successfully'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Unauthorized'
            ];
        }

        return response()->json($response);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token =  $user->createToken('my_token')->plainTextToken;
        $response = [
            'success' => true,
            'token' => $token,
            'name' => $request->name,
            'message' => 'Register Successfully'
        ];

        return response()->json($response);
    }
}
