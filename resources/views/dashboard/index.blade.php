@extends('layouts.app')

@section('title', 'Dashboard - Booking Vehicle')

@section('content')
<div class="container mt-4">
    <h2>Dashboard</h2>
    <p>Welcome, {{ auth()->user()->name }}!</p>

    <!-- Booking Summary -->
    <div class="row">
        <div class="col-md-2">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Bookings</h5>
                    <h3>{{ $totalBookings }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Approved</h5>
                    <h3>{{ $approvedBookings }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>Pending Approvals</h5>
                    <h3>{{ $pendingBookings }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Rejected</h5>
                    <h3>{{ $rejectedBookings }}</h3> {{-- Add Rejected Count --}}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>With Driver</h5>
                    <h3>{{ $bookingsWithDriver }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="mt-4">
        <h4>Recent Bookings</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vehicle</th>
                    <th>Admin</th>                   
                    <th>Driver</th>
                    <th>Approver</th> {{-- NEW COLUMN --}}
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentBookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->vehicle->name ?? 'Unknown Vehicle' }}</td>
                        <td>{{ $booking->user->name ?? 'Unknown User' }}</td>
                        <td>{{ $booking->driver->name ?? 'No Driver' }}</td>
                        <td>{{ $booking->approval->approver->name ?? 'Not Assigned' }}</td> {{-- SHOW APPROVER --}}
                        <td>
                            @if($booking->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($booking->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($booking->status == 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                @if($recentBookings->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">No bookings found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
