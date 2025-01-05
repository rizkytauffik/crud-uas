@extends('bookings.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Pemesanan
                </div>
                <div class="float-end">
                    <a href="{{ route('bookings.index') }}" class="btn btn-primary btn-sm">&larr; Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <!-- Form Edit Pemesanan -->
                <form action="{{ route('bookings.update', $booking->id_pemesanan) }}" method="post">
                    @csrf
                    @method("PUT")

                    <!-- Nama Tamu -->
                    <div class="mb-3 row">
                        <label for="nama_tamu" class="col-md-4 col-form-label text-md-end text-start">Nama Tamu</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('nama_tamu') is-invalid @enderror" id="nama_tamu" name="nama_tamu" value="{{ $booking->nama_tamu }}">
                            @if ($errors->has('nama_tamu'))
                                <span class="text-danger">{{ $errors->first('nama_tamu') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Tipe Kamar -->
                    <div class="mb-3 row">
                        <label for="tipe_kamar" class="col-md-4 col-form-label text-md-end text-start">Tipe Kamar</label>
                        <div class="col-md-6">
                            <select class="form-control @error('tipe_kamar') is-invalid @enderror" id="tipe_kamar" name="tipe_kamar">
                                @foreach(App\Models\Booking::getRoomTypes() as $roomType)
                                    <option value="{{ $roomType }}" {{ $booking->tipe_kamar == $roomType ? 'selected' : '' }}>{{ $roomType }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('tipe_kamar'))
                                <span class="text-danger">{{ $errors->first('tipe_kamar') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Tanggal Check-in -->
                    <div class="mb-3 row">
                        <label for="tanggal_checkin" class="col-md-4 col-form-label text-md-end text-start">Tanggal Check-in</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('tanggal_checkin') is-invalid @enderror" id="tanggal_checkin" name="tanggal_checkin" value="{{ $booking->tanggal_checkin->format('Y-m-d') }}">
                            @if ($errors->has('tanggal_checkin'))
                                <span class="text-danger">{{ $errors->first('tanggal_checkin') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Tanggal Check-out -->
                    <div class="mb-3 row">
                        <label for="tanggal_checkout" class="col-md-4 col-form-label text-md-end text-start">Tanggal Check-out</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('tanggal_checkout') is-invalid @enderror" id="tanggal_checkout" name="tanggal_checkout" value="{{ $booking->tanggal_checkout->format('Y-m-d') }}">
                            @if ($errors->has('tanggal_checkout'))
                                <span class="text-danger">{{ $errors->first('tanggal_checkout') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Simpan">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>

@endsection