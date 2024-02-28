@extends('layouts.nav')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container">
        <a class="btn btn-primary icon-move-left bg-gradient-primary" href="/pembelian">
           <i class="ni ni-bold-left"></i> Kembali
        </a>
        @if(session('carts'))
        <div class="card mt-4">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach(session('carts') as $id_produk => $details)
                        @php $total += $details['harga'] * $details['quantity'] @endphp
                        <tr>
                            <td>
                                <div class="text-xs font-weight-bold mb-0"> 
                                    {{ $details['nama_produk'] }}
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">{{ formatRupiah($details['harga'],true) }}</td>
                            <td class="align-middle text-center text-sm">{{ $details['quantity'] }}</td>
                            <td class="align-middle text-center text-sm">{{ formatRupiah($details['harga'] * $details['quantity'],true) }}</td>
                            <td>&nbsp;</td>
                            <td>
                                <form action="{{ route('removeFromCart', $id_produk) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="ni ni-fat-remove text-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="">
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="3">Total</td>
                            <td class="align-middle text-center text-sm"> 
                                <div class="text-xs font-weight-bold mb-0"> 
                                    {{ formatRupiah($total,true) }}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <form action="/belisekarang" method="post">
            @csrf
            <div class="form-group mt-4">
                <div class="input-group">
                    <select class="form-select" name="metode_pembayaran" id="">
                        <option value=""></option>
                        <option value="CASH">CASH</option>
                        <option value="TF">Transfer</option>
                    </select>
                  <span class="input-group-text bg-gradient-primary">
                    <i class="text-white ni ni-money-coins"></i>
                  </span>
                </div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Checkout</button>
            </div>
        </form>
        @else
        <p class="mt-4">Keranjang belanja kosong</p>
        @endif
    </div>      
</body>
</html>
@endsection
