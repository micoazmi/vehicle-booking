<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all(); // Get all vehicles
        return view('vehicles.index', compact('vehicles'));
    }
}
