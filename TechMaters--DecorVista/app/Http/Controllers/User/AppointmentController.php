<?php

namespace App\Http\Controllers\User;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AppointmentController extends Controller
{
    public function create()
    {
        return view("");
    }
    public function store($id)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'status' => 'success',
                'message' => 'You must be logged in to book an appointment.',
                'data' => null
            ]); // Unauthorized    
        }
        Log::info('categories data', ['categories data' => $id]);
        // Validate that the portfolio exists   
        $portfolio = Portfolio::find($id);
        if (!$portfolio) {
            return response()->json([
                'status' => 'success',
                'message' => 'Portfolio not found!',
                'data' => null
            ], 404);
        }

        // Check if the appointment already exists for the user and portfolio
        $existingAppointment = Appointment::where('user_id', Auth::user()->id)
            ->where('portfolio_id', $id)
            ->first();
        if ($existingAppointment) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already booked an appointment for this portfolio.',
                'data' => null
            ], 409); // Conflict
        }

        // Create the appointment
        $appointment = Appointment::create([
            'user_id' => Auth::user()->id,
            'designer_id' => $portfolio->designer_id,
            'portfolio_id' => $id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Your appointment has been scheduled. Please wait for the designer to respond.',
            'data' => $appointment,
        ], 200);
    }

}
