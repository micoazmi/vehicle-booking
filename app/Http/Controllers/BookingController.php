<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Approval;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function index()
    {
        $vehicles = Vehicle::all(); // Get all available vehicles
        $drivers = User::where('role', 'driver')->get(); // Get drivers
        $approvers = User::where('role', 'approver')->get(); // Get admin users
        return view('bookings.index', compact('vehicles', 'drivers', 'approvers'));;
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'nullable|exists:users,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'approver_id' => 'required|exists:users,id', 
        ]);
    
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending',
        ]);
    
    
        return redirect()->route('bookings.index')->with('success', 'Booking submitted successfully!');
    }
    
    
    

    
}
