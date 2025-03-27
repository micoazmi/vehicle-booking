<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pemesan
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade'); // Kendaraan yang dipilih
            $table->foreignId('driver_id')->nullable()->constrained('users')->onDelete('set null'); // Driver (Opsional)
            $table->dateTime('start_time'); // Waktu mulai pemakaian
            $table->dateTime('end_time'); // Waktu selesai pemakaian
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status pemesanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
