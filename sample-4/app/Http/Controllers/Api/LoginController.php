<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"authentication"},
     *     summary="Authenticate user and generate JWT token",
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
     *     @OA\Response(response="200", description="Login successful"),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $data = ['email' => $request->email, 'password' => $request->password,'role' => 'user'];
        if (Auth::attempt($data)) {
            $token = Auth::user()->createToken('api_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    /**
    * @OA\Post(
    *     path="/api/passwordSettings",
    *     tags={"authentication"},
    *     summary="Change password",  
    *      @OA\Parameter(
    *         name="oldPassword",
    *         in="query",
    *         description="Old Password",
    *         required=true,
    *         @OA\Schema(type="string")
    *     ),
    *     @OA\Parameter(
    *         name="newPassword",
    *         in="query",
    *         description="New Password",
    *         required=true,
    *         @OA\Schema(type="string")
    *     ),
    *     @OA\Response(response="201", description="Password Changed successfully"),
    *     @OA\Response(response="422", description="Validation errors"),
    *     security={{ "bearerAuth":{ }}}
    * )
    */

    public function passwordSettings(Request $request)
    {
        $user = $request->user();
        $hashedPassword = $user->password;
        if (\Hash::check($request->oldPassword, $hashedPassword)) {
            $u = \App\Models\User::find($user->id);
            $u->password = \Hash::make($request->newPassword);
            $u->save();
            return response()->json(['message' => 'Password Changed successfully'], 200);
        }else{
            return response()->json(['error' => 'Invalid Old Password'], 401);
        } 
    }

}
 