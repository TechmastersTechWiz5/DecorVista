<?php

namespace App\Http\Controllers\Designer;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index(Request $request) {
        $Appointments = Appointment::with(['designer', 'user', 'portfolios.consultants'])
            ->where('designer_id', Auth::user()->id)
            ->get();

        return view('designer.appointments.index', compact('Appointments'));
    }
    public function completedappointments(Request $request) {
        $Appointments = Appointment::with(['designer', 'user', 'portfolios.consultants'])
            ->where('designer_id', Auth::user()->id)
            ->get();

        return view('designer.appointments.index', compact('Appointments'));
    }

    public function updateStatus(Request $request, $id) {
        $appointment = Appointment::findOrFail($id);
        if ($appointment->status == 1) { // Only allow changes if the current status is 1
            $appointment->status = 2;
            $appointment->save();
            return redirect()->route('designer.appointments.index')->with('success', 'Appointment status Apprved.');
        }else{
            $appointment->status = 1;
            $appointment->save();
            return redirect()->route('designer.appointments.index')->with('success', 'Appointment status Rejected.');
        }
    }
}
