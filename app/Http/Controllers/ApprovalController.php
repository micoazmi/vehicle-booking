<?php

namespace App\Http\Controllers;
use App\Models\Approval;
use App\Models\Booking;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    //
    public function index()
    {
        // Fetch all pending approvals with booking and user details
        $approvals = Approval::where('status', 'pending')->with(['booking.vehicle', 'booking.user', 'approver'])->get();

        return view('approvals.index', compact('approvals'));
    }

    public function approve(Request $request, Approval $approval)
    {
        $approval->update([
            'status' => 'approved',
            'remarks' => $request->remarks,
        ]);

        // Update booking status as well
        $approval->booking->update(['status' => 'approved']);

        return redirect()->route('approvals.index')->with('success', 'Booking approved successfully!');
    }

    public function reject(Request $request, Approval $approval)
    {
        $approval->update([
            'status' => 'rejected',
            'remarks' => $request->remarks,
        ]);

        // Update booking status as rejected
        $approval->booking->update(['status' => 'rejected']);

        return redirect()->route('approvals.index')->with('error', 'Booking rejected.');
    }
}
