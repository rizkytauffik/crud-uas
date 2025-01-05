@extends('bookings.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Daftar Pemesanan</div>
            <div class="card-body">

                <!-- Menampilkan tombol hanya untuk tampilan web -->
                @if (!request()->is('bookings/download/pdf'))
                <a href="{{ route('bookings.create') }}" class="btn btn-success btn-sm my-2">
                    <i class="bi bi-plus-circle"></i> Tambahkan data pemesanan baru
                </a>
                <a href="{{ url('/bookings/download/pdf') }}" class="btn btn-danger btn-sm my-2">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </a>
                <form action="{{ url('/logout') }}" method="POST" class="d-inline my-2">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            @endif
            

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID Pemesanan</th>
                            <th scope="col">Nama Tamu</th>
                            <th scope="col">Tipe Kamar</th>
                            <th scope="col">Tanggal Check-in</th>
                            <th scope="col">Tanggal Check-out</th>
                            <!-- Sembunyikan kolom aksi di PDF -->
                            @if (!request()->is('bookings/download/pdf'))
                                <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <th scope="row">{{ $booking->id_pemesanan }}</th>
                                <td>{{ $booking->nama_tamu }}</td>
                                <td>{{ $booking->tipe_kamar }}</td>
                                <td>{{ $booking->tanggal_checkin->format('Y-m-d') }}</td>
                                <td>{{ $booking->tanggal_checkout->format('Y-m-d') }}</td>
                                <!-- Sembunyikan tombol aksi di PDF -->
                                @if (!request()->is('bookings/download/pdf'))
                                    <td>
                                        <form action="{{ route('bookings.destroy', $booking->id_pemesanan) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('bookings.show', $booking->id_pemesanan) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Tampilkan</a>

                                            <a href="{{ route('bookings.edit', $booking->id_pemesanan) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah anda ingin menghapus data pemesanan ini?');"><i
                                                    class="bi bi-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Pemesanan Tidak Ditemukan!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                </table>

                {{ $bookings->links() }}

            </div>
        </div>
    </div>
</div>

@endsection