<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->string('nama_tamu');
            $table->enum('tipe_kamar', [
                'Standard Room',
                'Superior Room',
                'Deluxe Room',
                'Double Room',
                'Family Room',
                'Junior Suite',
                'Suite Room'
            ]);
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
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