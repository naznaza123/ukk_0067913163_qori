@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-gradient-primary shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="text-white text-uppercase mb-1">Total Penjualan</div>
                                <div class="h5 font-weight-bold text-white mb-0">Rp. {{ number_format($totalPenjualan, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-white-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-gradient-success shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="text-white text-uppercase mb-1">Total Keuntungan</div>
                                <div class="h5 font-weight-bold text-white mb-0">Rp. {{ number_format($totalKeuntungan, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-line fa-2x text-white-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
