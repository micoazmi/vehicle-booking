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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade'); // Pemesanan yang disetujui
            $table->foreignId('approver_id')->constrained('users')->onDelete('cascade'); // Pihak yang menyetujui
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status persetujuan
            $table->text('remarks')->nullable(); // Catatan persetujuan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
