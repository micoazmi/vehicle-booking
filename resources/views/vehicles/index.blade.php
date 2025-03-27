@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Vehicle List</h2>

    @if($vehicles->isEmpty())
        <p>No vehicles available.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>License Plate</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->name }}</td>
                        <td>{{ $vehicle->license_plate }}</td>
                        <td>{{ ucfirst($vehicle->type) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
