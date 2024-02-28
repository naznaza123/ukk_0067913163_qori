@extends('layouts.master')
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
    <div class="container ">
        <a class="btn btn-primary icon-move-left bg-gradient-primary" href="/penjualan">
           <i class="ni ni-bold-left"></i> Kembali
        </a>
        @if(session('cart'))
        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-0" >
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
                        @foreach(session('cart') as $id_produk => $details)
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
        <form action="/checkout" method="post">
            @csrf
            <div class="form-group">
                <div class="input-group mt-4 mb-4">
                    <select class="form-select"  name="metode_pembayaran" id="">
                        <option value=""></option>
                        <option value="CASH">CASH</option>
                        <option value="TF">Transfer</option>
                    </select>
                  <span class="input-group-text bg-gradient-primary ">
                    <i class="text-white ni ni-money-coins"></i>
                  </span>
                </div>
                <div class="input-group mt-3">
                    <select class="form-select " name="id_pelanggan" id="">
                        <option value=""></option>
                        @foreach ($pel as $item)
                            <option value="{{ $item->id }}">{{ $item->id.'-'.$item->nama_pelanggan }}</option>
                        @endforeach    
                    </select>    
                    <span>
                        <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class=" text-white ni ni-single-02"></i> <i class="ni ni-fat-add text-white"></i>
                        </button>   
                    </span>    
                </div>
            </div>
            

            <input class="form-control" type="number" name="diskon" id="diskon" placeholder="Diskon FInal" onchange="hitungTotalSetelahDiskon()">
            <input type="hidden" name="total_setelah_diskon" id="total_setelah_diskon">
            <div class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                <p>Total Setelah Diskon: <span  id="totalSetelahDiskon"></span></p>
            </div>

            
            <script>
                function formatRupiah(angka, prefix){
                    var number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split    = number_string.split(','),
                    sisa     = split[0].length % 3,
                    rupiah     = split[0].substr(0, sisa),
                    ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                    
                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                    if(ribuan){
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    
                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                }
                
                function hitungTotalSetelahDiskon() {
                    var totalharga = parseFloat(<?php echo json_encode($total); ?>);
                    var diskon = parseFloat(document.getElementById('diskon').value);
                    var totalSetelahDiskon = totalharga - diskon;
            
                    document.getElementById('total_setelah_diskon').value = totalSetelahDiskon;
                    document.getElementById('totalSetelahDiskon').innerText = formatRupiah(totalSetelahDiskon, true);
                }
                </script>
                
                <div class="d-grid mt-3">
                    <button class="btn btn-primary " type="submit">Checkout</button>
                </div>
        </form>
                @else
                <p>Keranjang belanja kosong</p>
                @endif
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/pelanggan/create" method="post">
                    @csrf
                    <div class="container p-3">
                        <input type="text" class="form-control mb-3" name="nama_pelanggan" placeholder="nama pelanggan">
                        <input type="text" class="form-control mb-3" name="alamat" placeholder="alamat">
                        <input type="text" class="form-control mb-3" name="no_telepon" placeholder="no_telepon">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Understood</button>     
                </div>
                </form>
        </div>
        </div>
    </div>         
</body>
</html>

@endsection