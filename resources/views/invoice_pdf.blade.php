<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3 {
            margin-top: 0;
            font-weight: normal;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        ta  ble th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
        }
        .total {
            font-size: 1.2em;
            font-weight: bold;
        }
        .note {
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>POStify</h1>
        
        <div>
            <h2>Informasi Pelanggan</h2>
            <p>Nama: {{ $pelanggan->nama_pelanggan }}</p>
            <p>Alamat: {{ $pelanggan->alamat }}</p>
            <p>Nomor Telepon: {{ $pelanggan->nomor_telepon }}</p>
            <!-- Tambahkan informasi pelanggan lainnya sesuai kebutuhan -->
        </div>
        
        <div>
            <h2>Detail Transaksi</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail->produk->nama_produk }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>{{ formatRupiah($detail->harga,true) }}</td>
                        <td>{{ formatRupiah($detail->harga * $detail->jumlah,true) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="total">
            <h2>Total Tagihan</h2>
            <p>Total Harga: {{ formatRupiah($tothar, true) }}</p>
            <!-- Tambahkan informasi total tagihan lainnya sesuai kebutuhan -->
        </div>
        
        <div class="note">
            <h2>Catatan Tambahan</h2>
            <p>Silakan lakukan pembayaran sesuai dengan total tagihan dalam waktu yang ditentukan.</p>
            <!-- Tambahkan catatan tambahan atau instruksi pembayaran lainnya sesuai kebutuhan -->
        </div>
        <div class="informasi-pembayaran">
            <h6>Uang bayar : {{ $jmluang }}</h6>
            <p>Kembalian: {{ $kembalian }}</p>
        </div>
    </div>
</body>
</html>
