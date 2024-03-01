<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
            display: inline-block; /* Added to align the image */
            margin-right: 10px; /* Added spacing between image and text */
        }
        .invoice-header img {
            max-width: 100px; /* Set the maximum width of the image */
            vertical-align: middle; /* Align the image vertically with the text */
        }
        .invoice-header p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details th,
        .invoice-details td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        .invoice-total {
            margin-top: 20px;
        }
        .invoice-total table {
            width: 50%;
            margin-left: auto;
            margin-right: 0;
            border-collapse: collapse;
        }
        .invoice-total th,
        .invoice-total td {
            padding: 10px;
            border: none;
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .btn-print {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 0 auto;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
        }
        /* CSS to position image to the left of the title */
        .invoice-header .left-img {
            float: left; /* Set image to float left */
            margin-right: 10px; /* Added spacing between image and text */
        }
    </style>
    <script>
        // JavaScript untuk mengirimkan permintaan AJAX dan mengunduh PDF
        function cetakInvoicePDF(transaksiId, pelangganId, totalharga) {
            $.ajax({
                url: '/penjualan/cetak_pdf',
                method: 'POST',
                data: {
                    transaksi_id: transaksiId,
                    id_pelanggan: pelangganId,
                    totalharga: totalharga,
                    _token: '{{ csrf_token() }}'
                },
                xhrFields: {
                    responseType: 'blob' // Menggunakan blob sebagai tipe respons
                },
                success: function(data) {
                    // Membuat objek blob dari respons
                    var blob = new Blob([data], { type: 'application/pdf' });

                    // Membuat URL objek blob
                    var url = window.URL.createObjectURL(blob);

                    // Membuat elemen anchor untuk unduhan otomatis
                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'invoice.pdf';
                    document.body.appendChild(a);
                    a.click();

                    // Melepaskan objek URL setelah unduhan selesai
                    window.URL.revokeObjectURL(url);

                    // Setelah unduhan selesai dan invoice telah dicetak, redirect ke halaman penjualan
                    window.location.href = '/penjualan';
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat mengunduh PDF.');
                }
            });
        }
    </script>

</head>
<body>
    <div class="container">
        <div class="invoice-header">
            {{-- <h1>Invoice</h1> --}}
            <img src="{{ asset('postifylogo/logo3.png') }}" > <!-- Change path to your image -->
            <p>Date: {{ date('Y-m-d') }}</p>
            <p>Kasir: {{ Auth::user()->name }}</p>
        </div>
        <div class="invoice-details">
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
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
        <div class="invoice-total">
            <table>
                <tr>
                    <th>Total:</th>
                    <td>{{ formatRupiah($totalharga,true) }}</td>
                </tr>
                {{-- <tr>
                    <th>Diskon:</th>
                    <td>{{ formatRupiah($inputdiskon,true) }}</td>
                </tr>
                <tr>
                    <th>Total Setelah Diskon:</th>
                    <td>{{ formatRupiah($totalsetdiskon,true) }}</td>
                </tr> --}}
            </table>
        </div>
        <form action="{{ route('invoice.cetak') }}" method="get">
            <input type="hidden" name="transaksi_id" value="{{ $transaksi->id }}">
            <input type="hidden" name="id_pelanggan" value="{{ $pel->id }}">
            <input type="hidden" name="totalharga" value="{{ $totalharga }}">
            <button type="submit"  class="btn btn-primary">Cetak Invoice PDF</button>
        </form>
        <div class="text-center">
            <a class="btn bg-gradient-primary" href="/penjualan">
                Kembali
            </a>
        </div>
        {{-- <a href="#" class="btn-print" onclick="window.print()">Print Invoice</a> --}}
    </div>
</body>
</html>
