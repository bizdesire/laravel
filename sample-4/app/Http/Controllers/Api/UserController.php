<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    User, Forum
};

class UserController extends Controller
{
    
    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"User"},
     *     summary="Register a new user",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="User's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="201", description="User registered successfully"),
     *     @OA\Response(response="422", description="Validation errors")
     * )
     */

    public function register(Request $request)
    {
      //  $validatedData = $request->validate();

        $v = \Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        if($v->fails()){
            return response()->json(['errors' => $v->errors()], 422);
        }else{ 
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => \Hash::make($request->password),
            ]); 
            return response()->json(['message' => 'User registered successfully'], 201);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/user", 
     *     tags={"User"},
     *     summary="Get logged-in user details",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */

    public function getUserDetails(Request $request)
    {
        $user = $request->user();
        return response()->json(['user' => $user], 200);
    }  
}