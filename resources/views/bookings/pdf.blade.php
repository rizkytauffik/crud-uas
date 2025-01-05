<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemesanan</title>
    <style>
        /* Menyembunyikan elemen untuk tampilan PDF */
        .no-print {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Daftar Pemesanan Hotel Santika</h1>

    <table>
        <thead>
            <tr>
                <th>ID Pemesanan</th>
                <th>Nama Tamu</th>
                <th>Tipe Kamar</th>
                <th>Tanggal Check-in</th>
                <th>Tanggal Check-out</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id_pemesanan }}</td>
                    <td>{{ $booking->nama_tamu }}</td>
                    <td>{{ $booking->tipe_kamar }}</td>
                    <td>{{ $booking->tanggal_checkin->format('Y-m-d') }}</td>
                    <td>{{ $booking->tanggal_checkout->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>