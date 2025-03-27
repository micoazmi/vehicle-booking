@extends('layouts.app')

@section('title', 'Vehicle Booking')

@section('content')
<div class="container mt-4">
    <h2>Vehicle Booking</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Select Vehicle</label>
            <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                <option value="">-- Choose Vehicle --</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="driver_id" class="form-label">Select Driver (Optional)</label>
            <select class="form-control" id="driver_id" name="driver_id">
                <option value="">-- No Driver --</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>
        
        <div class="mb-3">
            <label for="approver_id" class="form-label">Select Approver</label>
            <select class="form-control" id="approver_id" name="approver_id">
                <option value="">-- Choose Approver --</option>
                @foreach($approvers as $approver)
                    <option value="{{ $approver->id }}">{{ $approver->name }}</option>
                @endforeach
            </select>
        </div>
        
        

        <button type="submit" class="btn btn-primary">Submit Booking</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </form>
</div>
@endsection
