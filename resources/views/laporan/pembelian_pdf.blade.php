<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembelian</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        /* Gaya CSS untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        th:nth-child(4),
        td:nth-child(4) {
            text-align: right; /* Mengatur teks di kolom total harga ke kanan */
        }
        tfoot td {
            font-weight: bold;
        }
        /* Gaya CSS untuk judul laporan dan periode */
        h2, p {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
    </style>
</head>
<body>
    <!-- Judul laporan -->
    <h2>Laporan Penjualan</h2>
    <p>
        <i>
            POStify
        </i>
    </p>
    <p>Periode: {{ $start_date }} - {{ $end_date }}</p>

    <!-- Tabel laporan -->
    <table border="1">
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
                $totalHargaSeluruh = 0; // Variabel untuk mengakumulasi total harga seluruh transaksi
            @endphp
            {{-- @foreach($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->id }}</td>
                <td>{{ $transaksi->tanggal_jual }}</td>
                <td>{{ $transaksi->metode_pembayaran }}</td>
                <td>
                    @if($transaksi->detailTransaksis->count() > 0)
                        @php
                            $totalHargaTransaksi = $transaksi->detailTransaksis->sum('harga');
                            $totalSeluruh += $totalHargaTransaksi; // Menambahkan total harga transaksi ke total seluruh
                        @endphp
                        {{ formatRupiah($totalHargaTransaksi, true) }}
                    @else
                        Tidak ada detail transaksi
                    @endif
                </td>
            </tr>
            @endforeach --}}
            @foreach($transaksis as $transaksi)
            @php
                $totalHargaTransaksi = 0; // Inisialisasi total harga transaksi
                foreach ($transaksi->detailBeli as $detail) {
                    $totalHargaTransaksi += $detail->harga * $detail->jumlah; // Menghitung total harga transaksi
                }
                $totalHargaSeluruh += $totalHargaTransaksi; // Menambahkan total harga transaksi ke total harga seluruh
            @endphp
            <tr>
                <td>{{ $transaksi->id }}</td>
                <td>{{ $transaksi->tanggal_beli }}</td>
                <td>{{ $transaksi->metode_pembayaran }}</td>
                <td>{{ formatRupiah($totalHargaTransaksi, true) }}</td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Total Harga Seluruh</strong></td>
                <td><strong>{{ formatRupiah($totalHargaSeluruh, true) }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
