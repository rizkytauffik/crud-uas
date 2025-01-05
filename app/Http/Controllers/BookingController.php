<?php

namespace App\Http\Controllers;

use App\Models\Booking; // Ubah menjadi Booking
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Mpdf\Mpdf;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data bookings dan mengurutkannya berdasarkan id_pemesanan
        // Mengurutkan berdasarkan id_pemesanan secara menaik atau menurun sesuai keinginan
        $bookings = Booking::orderBy('id_pemesanan', 'asc')->paginate(10); // 'asc' untuk urutan menaik, 'desc' untuk urutan menurun
        return view('bookings.index', compact('bookings'));
    }
    public function view_pdf()
    {

        $mpdf = new Mpdf();
        $bookings = Booking::orderBy('id_pemesanan', 'asc')->paginate(10);
        $mpdf->WriteHTML(view('bookings.index', compact('bookings')));
        $mpdf->Output();
    }
    public function download_pdf()
    {
        $bookings = Booking::all();  // Ambil data pemesanan

        // Ambil tampilan HTML untuk PDF
        $html = view('bookings.pdf', compact('bookings'))->render();

        // Pengaturan mPDF
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'margin_top' => 20,
            'margin_bottom' => 20,
            'margin_left' => 15,
            'margin_right' => 15
        ]);

        // Menambahkan HTML ke mPDF
        $mpdf->WriteHTML($html);

        // Menyimpan atau mengunduh PDF
        return $mpdf->Output('list-bookings.pdf', 'D');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request): RedirectResponse
    {
        Booking::create([
            'nama_tamu' => $request->nama_tamu,
            'tipe_kamar' => $request->tipe_kamar,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
        ]);

        return redirect()->route('bookings.index')
            ->withSuccess('Pemesanan baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking): View
    {
        return view('bookings.show', [
            'booking' => $booking
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking): View
    {
        return view('bookings.edit', [
            'booking' => $booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking): RedirectResponse
    {
        $booking->update([
            'nama_tamu' => $request->nama_tamu,
            'tipe_kamar' => $request->tipe_kamar,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
        ]);

        return redirect()->back()
            ->withSuccess('Pemesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->withSuccess('Pemesanan berhasil dihapus.');
    }
}