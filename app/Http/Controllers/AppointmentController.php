<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::orderBy('created_at', 'desc')->get();
        return view('appointment.read', compact('appointments'));
    }

    public function create()
    {
        return view('appointment.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'appointment_type' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $appointment = Appointment::create([
            'nama' => $request->full_name,
            'telepon' => $request->phone,
            'email' => $request->email,
            'tanggal' => $request->appointment_date,
            'waktu' => $request->appointment_time,
            'jenis_janji' => $request->appointment_type,
            'catatan' => $request->notes,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your appointment has been booked successfully!',
            'appointment' => $appointment
        ]);
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointment.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}