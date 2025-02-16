<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'gender' => 'required|string',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create($validatedData);
        $userToken = $user->createToken($request->name);

        return [
            'user' => new UserResource($user),
            'userToken' => $userToken->plainTextToken,
        ];
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        if (! $user) {
            return response()->json(
                [
                    'message' => 'User is not founded',
                ],
                404
            );
        }

        return new UserResource($user);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if (! $user || ! Hash::check($validatedData['password'], $user->password)) {
            return [
                'message' => 'The provided data is  incorrect. Please, try again',
            ];
        }

        $userToken = $user->createToken($user->name);

        return [
            'user' => new UserResource($user),
            'userToken' => $userToken->plainTextToken,
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'You are successfull logout'
        ];
    }
}
