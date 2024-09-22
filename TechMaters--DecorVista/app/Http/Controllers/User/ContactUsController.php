<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use App\Models\ContactUs;
use Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use DataTables;

class ContactUsController extends Controller
{
    public function create()
    {
        return view('users.contact',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $input = $request->all();    
    
            $validator = Validator::make($input, [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone_number' => 'required',
                'message' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => $validator->errors()->first(),
                ]);
            }

            $Contact = ContactUs::create([
                'name' => $input['name'], 
                'email' => $input['email'],
                'phone_number' => $input['phone_number'],
                'message' => $input['message'],
            ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Contact added successfully',
                'data' => $Contact,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }
    
        
}
