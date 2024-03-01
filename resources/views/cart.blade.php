@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
</head>
    <style>
        .text-danger {
            color: red !important;
        }
    </style>
<body>
    @include('sweetalert::alert')
    <div class="container">
        <a class="btn btn-primary icon-move-left bg-gradient-primary" href="/penjualan">
            <i class="ni ni-bold-left"></i> Kembali
        </a>
        @if(session('cart'))
        <div class="card">
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
        <form id="checkoutForm" action="/checkout" method="post">
            @csrf
            <input type="hidden" value="{{ $total }}" name="hartot">
            <div class="form-group">
                <div class="input-group mt-4 mb-4">
                    <input type="number" class="form-control" id="jumlah_uang" name="jumlah_uang" placeholder="Jumlah Uang Dibayarkan" oninput="hitungKembalian()">
                    <span class="input-group-text bg-gradient-primary">
                        <i class="text-white ni ni-money-coins"></i>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="kembalian">Kembalian:</label>
                <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
            </div>
            <div class="form-group">
                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select class="form-select" name="metode_pembayaran" id="metode_pembayaran" onchange="showPaymentModal()" >
                    <option value=""></option>
                    <option value="CASH">CASH</option>
                    <option  value="TF">Transfer</option>
                </select>
               
            </div>
            <div class="form-group">
                <label for="id_pelanggan">Pelanggan:</label>
                <select class="form-select" name="id_pelanggan" id="id_pelanggan">
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
            <input type="hidden" name="selectedBank" id="selectedBankInput">
            <div class="d-grid">
                <button class="btn bg-gradient-primary">Tambah Transaksi</button>
            </div>
        </div>
    </form>
    @else
    <p>Keranjang belanja kosong</p>
    @endif
</div>
<div class="modal fade" id="bankModal" tabindex="-1" aria-labelledby="bankModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bankModalLabel">Pilih Bank</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi modal -->
                <form>
                    <div class="mb-3">
                        <label for="bankSelection" class="form-label">Pilih Bank:</label>
                        <select class="form-select" id="bankSelection" name="bankSelection">
                            <option value="bank1">Bank 1</option>
                            <option value="bank2">Bank 2</option>
                            <option value="bank3">Bank 3</option>
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="accountNumber" class="form-label">Nomor Rekening:</label>
                        <input type="text" class="form-control" id="accountNumber" name="accountNumber">
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah Transfer:</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="saveBankSelection()">Simpan</button>
            </div>
        </div>
    </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
<script>
    function saveBankSelection() {
        var selectedBank = document.querySelector('input[name="bankSelection"]:checked').value;
        document.getElementById('selectedBankInput').value = selectedBank;
        $('#bankModal').modal('hide'); // Menutup modal setelah memilih bank
    }

    function showPaymentModal() {
        var metodePembayaran = document.getElementById('metode_pembayaran').value;
        var bankModal = document.getElementById('bankModal');

        if (metodePembayaran === 'TF') {
            // Show bank selection modal
            $('#bankModal').modal('show');
        } else {
            // Hide bank selection modal if other payment method selected
            $('#bankModal').modal('hide');
        }
    }

    function hitungKembalian() {
        var totalHarga = {{ $total }};
        var jumlahUang = document.getElementById('jumlah_uang').value;
        var kembalian = jumlahUang - totalHarga;

        var kembalianInput = document.getElementById('kembalian');
        kembalianInput.value = formatRupiah(kembalian, true);

        // Tambahkan kelas CSS jika kembalian negatif
        if (kembalian < 0) {
            kembalianInput.classList.add('text-danger');
        } else {
            kembalianInput.classList.remove('text-danger');
        }
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
</html>


@endsection
