<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Anda bisa menyesuaikan izin akses sesuai kebutuhan
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_tamu' => 'required|string|max:255', // Nama tamu wajib diisi, tipe string, dan maksimal 255 karakter
            'tipe_kamar' => 'required|string|max:255', // Tipe kamar wajib diisi, tipe string, dan maksimal 255 karakter
            'tanggal_checkin' => 'required|date', // Tanggal check-in wajib diisi dan bertipe tanggal
            'tanggal_checkout' => 'required|date|after_or_equal:tanggal_checkin', // Tanggal check-out wajib diisi, bertipe tanggal, dan harus setelah atau sama dengan tanggal check-in
        ];
    }
}