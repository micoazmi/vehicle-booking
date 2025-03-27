<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'approver_id',
        'status',
        'remarks',
    ];

    /**
     * Relationship: Approval belongs to a Booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Relationship: Approval belongs to an Approver (User)
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}
