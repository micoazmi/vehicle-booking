@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Approval Requests</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(auth()->user()->role === 'approver') {{-- ✅ Only show if user is an approver --}}
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vehicle</th>
                    <th>Booked By</th>
                    <th>Approver</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvals as $approval)
                    <tr>
                        <td>{{ $approval->id }}</td>
                        <td>{{ $approval->booking->vehicle->name ?? 'Unknown' }}</td>
                        <td>{{ $approval->booking->user->name ?? 'Unknown' }}</td>
                        <td>{{ $approval->approver->name ?? 'Unknown' }}</td>
                        <td><span class="badge bg-warning text-dark">{{ ucfirst($approval->status) }}</span></td>
                        <td>
                            <form action="{{ route('approvals.approve', $approval->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="remarks" value="Approved by Admin">
                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>

                            <form action="{{ route('approvals.reject', $approval->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="remarks" value="Rejected due to issues">
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($approvals->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">No pending approvals</td>
                    </tr>
                @endif
            </tbody>
        </table>
    @else
        <div class="alert alert-danger">You do not have permission to access this page.</div>
    @endif
</div>
@endsection
