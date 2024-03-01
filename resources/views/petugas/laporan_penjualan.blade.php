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
                                            <i class="material-icons">search</i>    
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
                                            <i class="material-icons">print</i>
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
