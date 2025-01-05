<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Tentukan primary key jika menggunakan selain id default
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_pemesanan',
        'nama_tamu',
        'tipe_kamar',
        'tanggal_checkin',
        'tanggal_checkout',
    ];

    /**
     * Get the available room types.
     *
     * @return array
     */
    public static function getRoomTypes(): array
    {
        return [
            'Standard Room',
            'Superior Room',
            'Deluxe Room',
            'Double Room',
            'Family Room',
            'Junior Suite',
            'Suite Room',
        ];
    }

    /**
     * Cast tanggal_checkin dan tanggal_checkout menjadi tipe data date (Carbon).
     */
    protected $casts = [
        'tanggal_checkin' => 'date',
        'tanggal_checkout' => 'date',
    ];
}