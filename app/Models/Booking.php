<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'driver_id',
        'start_time',
        'end_time',
        'status',
        'approver_id', 
    ];

    /**
     * Relationship: Booking has one Approval
     */
    public function approval()
    {
        return $this->hasOne(Approval::class);
    }

    /**
     * Relationship: Booking belongs to a User (who made the booking)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Booking belongs to a Vehicle
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Relationship: Booking belongs to a Driver (optional)
     */
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    /**
     * Boot method to automatically create an approval when a booking is created.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($booking) {
            Approval::create([
                'booking_id' => $booking->id,
                'approver_id' => request()->approver_id ?? null, // Assign from request
                'status' => 'pending',
                'remarks' => null,
            ]);
        });
    }

}
