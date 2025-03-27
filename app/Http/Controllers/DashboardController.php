<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalBookings = Booking::count();
        $approvedBookings = Booking::where('status', 'approved')->count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $rejectedBookings = Booking::where('status', 'rejected')->count(); // Add Rejected Count
        $bookingsWithDriver = Booking::whereNotNull('driver_id')->count();
        
        $recentBookings = Booking::with(['vehicle', 'user', 'driver', 'approval.approver'])
        ->orderBy('created_at', 'desc')
        ->get();
    
        return view('dashboard.index', compact(
            'totalBookings', 
            'approvedBookings', 
            'pendingBookings', 
            'rejectedBookings', 
            'bookingsWithDriver', 
            'recentBookings'
        ));
    }
    
}
