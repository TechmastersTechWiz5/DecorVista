<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => "User Logout Successfully",
        ], 200);
    }

    public function register(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required', 'min:8'],
                'role' => 'required|integer|in:1,2,3',
            ]);
        
            // If validation fails, return error response
            if ($validator->fails()) {
                Log::info($validator->errors()->first());
                return response()->json([
                    'status' => 'warning',
                    'message' => $validator->errors()->first(),
                ], 404);
            }
        
            // Create the user with the full name
            User::create([
                'name' => $request->name, // Ensure a space between first and last name
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        
            // Return success response
            return response()->json([
                'status' => 'success',
                'message' => "User Registered Successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => null,
            ]);
        }
    }
    
    

    public function login(Request $request)
    {
        try {
             // Validate the request
             $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => $validator->errors()->first(),
                ], 404);
            }
        
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
        
                // Check if the user has a role that requires OTP verification
                if ($user->role == "user" || $user->role == "designer") {
                    // Generate a 6-digit OTP
                    $code = rand(100000, 999999);
        
                    // Save the OTP to the user's record
                    $user->verification_code = $code;
                    $user->save();
        
                    // Send the OTP email to the user
                    Mail::to($user->email)->send(new VerificationCodeMail($code));
        
                    return response()->json([
                        'status' => 'success',
                        'message' =>'verification code has been send to your email',
                        'data' => null,
                    ]);
                    ;
                }

                if($user->role == "admin"){
                    return response()->json([
                        'status' => 'success',
                        'message' =>'Admin Logged in Successfully',
                        'data' => null,
                    ]);
                }
                
            }

            return response()->json([
                'status' => 'error',
                'message' =>'The provided credentials do not match our records.',
                'data' => null,
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => null,
            ]);
        }
    }

    public function verifyOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'otp' => 'required|numeric',
                'role' => 'required|integer|in:1,2,3',

            ]);
        
            // If validation fails, return error response
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => $validator->errors()->first(),
                ], 404);
            }

            $user = Auth::user();

            if ($user->verification_code == $request->otp) {
                if($user->role == "user" && $request->role == 1){
                    return response()->json([
                        'status' => 'success',
                        'message' =>'User Logged in Successfully',
                        'data' => null,
                    ]);
                }
                if($user->role == "designer" && $request->role == 2){
                    return response()->json([
                        'status' => 'success',
                        'message' =>'Designer Logged in Successfully',
                        'data' => null,
                    ]);
                }
            }
            return response()->json([
                'status' => 'error',
                'message' => "Invalid OTP. Please try again.",
                'data' => null,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => null,
            ]);
        }




    }



    
}
