<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan Anda */
        body {
            font-family: Arial, sans-serif;
        }
        .logo {
            float: left;
            margin-right: 20px; /* Sesuaikan jarak logo dengan judul */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Logo toko -->
    {{-- <div class="logo">
        <img src="{{ public_path('postifylogo/logo3.png') }}" alt="Logo Toko" width="100">
    </div> --}}

    <!-- Judul laporan -->
    <h2>Laporan Penjualan</h2>
    <p>Periode: {{ $start_date }} - {{ $end_date }}</p>
    
    <!-- Tabel laporan -->
    <table>
        <thead>
            <tr>
                <th>No. Transaksi</th>
                <th>Tanggal Jual</th>
                <th>Metode Pembayaran</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalHargaSeluruh = 0;
            @endphp
            @foreach($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->id }}</td>
                <td>{{ $transaksi->tanggal_jual }}</td>
                <td>{{ $transaksi->metode_pembayaran }}</td>
                <td>
                    @if($transaksi->detailTransaksis->count() > 0)
                        @php
                            $totalHargaTransaksi = $transaksi->detailTransaksis->sum('harga');
                            $totalHargaSeluruh += $totalHargaTransaksi;
                        @endphp
                        {{ formatRupiah($totalHargaTransaksi, true) }}
                    @else
                        Tidak ada detail transaksi
                    @endif
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="total"><strong>Total Harga Seluruh</strong></td>
                <td class=
