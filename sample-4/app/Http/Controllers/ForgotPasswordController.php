<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Hash;
use App\Models\User;
class ForgotPasswordController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/forgot-password",
     *     tags={"User"},
     *     summary="Forgot password",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Blog data including image upload",
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"email"},
     *                 @OA\Property(
     *                     property="email",
     *                     type="email", 
     *                     description="email"
     *                 ), 
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="Link sent successfully"),
     *     @OA\Response(response="422", description="Validation errors"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function forgot(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'We could not find a user with that email address.', 'status' => false], 400);
        }
        $token = Str::random(64); // Generate a custom reset token
        $token = Hash::make($token);
        $data = \DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => now()
            ]
        ); 

       // $user->sendPasswordResetNotification($token);
       return response()->json(['message' => 'Reset link sent to your email.', 'status' => true,'token' => $token]);
       // $status = Password::sendResetLink($request->only('email'));
        // return $status === Password::RESET_LINK_SENT
        //     ? response()->json(['message' => 'Reset link sent to your email.', 'status' => true])
        //     : response()->json(['message' => 'Unable to send reset link', 'status' => false], 400);
    }

    /**
     * @OA\Post(
     *     path="/api/password/reset",
     *     tags={"User"},
     *     summary="Reset password",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Blog data including image upload",
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"email","token","password"},
     *                 @OA\Property(
     *                     property="token",
     *                     type="string", 
     *                     description="token"
     *                 ), 
     *                 @OA\Property(
     *                     property="email",
     *                     type="email", 
     *                     description="email"
     *                 ), 
     *                @OA\Property(
     *                     property="password",
     *                     type="password", 
     *                     description="password"
     *                 ), 
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="password reset successfully"),
     *     @OA\Response(response="422", description="Validation errors"),
     *     security={{"bearerAuth":{}}}
     * )
     */

    public function reset(Request $request)
    {     
        $v = \Validator::make($request->all(),[
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]); 
        if($v->fails()){
            return response()->json(['errors' => $v->errors()], 422);
        }else{
            // $status = Password::reset($request->only('email', 'password', 'token'), function ($user, $password) {
            //     $user->password = bcrypt($password);
            //     $user->save();
            // });
            $p = \DB::table('password_resets')->select('*')->where('token',$request->token)->where('email',$request->email)->first();
            if(!empty($p)){
                $u = User::where('email',$request->email)->first();
                $u->password = bcrypt($request->password);
                $u->save();
                \DB::table('password_resets')->select('*')->where('token',$request->token)->where('email',$request->email)->delete();
                return response()->json(['message' => 'Password reset successfully', 'status' => true]);
            }else{
                return response()->json(['message' => 'Unable to reset password', 'status' => false], 400);
            }
        }
     
    }
}