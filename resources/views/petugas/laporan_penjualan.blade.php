@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Laporan Penjualan</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('laporan.penjualan.search') }}" method="GET">
                                <div class="form-group row">
                                    <label for="start_date" class="col-md-4 col-form-label text-md-right">Tanggal Awal:</label>
                                    <div class="col-md-6">
                                        <input type="date" id="start_date" name="start_date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end_date" class="col-md-4 col-form-label text-md-right">Tanggal Akhir:</label>
                                    <div class="col-md-6">
                                        <input type="date" id="end_date" name="end_date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <svg class="text-dark" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#ffff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM228 104c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V312c0 11 9 20 20 20s20-9 20-20V298.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V104z"/>
                                            </svg>   
                                            Cari
                                        </button>
                                        {{-- <a href="{{ route('laporan.cetak') }}" class="btn btn-success">Cetak</a> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('laporan.penjualan.cetak') }}" method="GET">
                                <div class="form-group row">
                                    <label for="start_date" class="col-md-4 col-form-label text-md-right">Tanggal Awal:</label>
                                    <div class="col-md-6">
                                        <input type="date" id="start_date" name="start_date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end_date" class="col-md-4 col-form-label text-md-right">Tanggal Akhir:</label>
                                    <div class="col-md-6">
                                        <input type="date" id="end_date" name="end_date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            <svg class="text-dark" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#ffffff" d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                                            </svg>
                                            Cetak   
                                        </button>
                                        {{-- <a href="{{ route('laporan.cetak') }}" class="btn btn-success">Cetak</a> --}}
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    {{--  --}}
                    @if(isset($start_date) && isset($end_date))
                        <h2 class="mt-4">Laporan Penjualan ({{ $start_date }} - {{ $end_date }})</h2>
                    @endif
                    @if(isset($transaksis))
                        @if($transaksis->isEmpty())
                            <p class="mt-4">Tidak ada data penjualan pada rentang tanggal yang diminta.</p>
                        @else
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered">
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
                                        {{-- @foreach($transaksis as $transaksi)
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
                                        @endforeach --}}
                                        @foreach($transaksis as $transaksi)
                                            @php
                                                $totalHargaTransaksi = 0; // Inisialisasi total harga transaksi
                                                foreach ($transaksi->detailTransaksis as $detail) {
                                                    $totalHargaTransaksi += $detail->harga * $detail->jumlah; // Menghitung total harga transaksi
                                                }
                                                $totalHargaSeluruh += $totalHargaTransaksi; // Menambahkan total harga transaksi ke total harga seluruh
                                            @endphp
                                            <tr>
                                                <td>{{ $transaksi->id }}</td>
                                                <td>{{ $transaksi->tanggal_jual }}</td>
                                                <td>{{ $transaksi->metode_pembayaran }}</td>
                                                <td>{{ formatRupiah($totalHargaTransaksi, true) }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="3"><strong>Total Harga Seluruh</strong></td>
                                            <td><strong>{{ formatRupiah($totalHargaSeluruh, true) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
