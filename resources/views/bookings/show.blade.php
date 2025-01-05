@extends('bookings.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Informasi Pemesanan
                </div>
                <div class="float-end">
                    <a href="{{ route('bookings.index') }}" class="btn btn-primary btn-sm">&larr; Kembali</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="nama_tamu" class="col-md-4 col-form-label text-md-end text-start"><strong>Nama Tamu :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $booking->nama_tamu }}
                    </div>
                </div>

                <div class="row">
                    <label for="tipe_kamar" class="col-md-4 col-form-label text-md-end text-start"><strong>Tipe Kamar :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $booking->tipe_kamar }}
                    </div>
                </div>

                <div class="row">
                    <label for="tanggal_checkin" class="col-md-4 col-form-label text-md-end text-start"><strong>Tanggal Check-in :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ ($booking->tanggal_checkin)->format('Y-m-d') }}
                    </div>
                </div>

                <div class="row">
                    <label for="tanggal_checkout" class="col-md-4 col-form-label text-md-end text-start"><strong>Tanggal Check-out :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ ($booking->tanggal_checkout)->format('Y-m-d') }}
                    </div>
                </div>

            </div>
        </div>
    </div>    
</div>
    
@endsection