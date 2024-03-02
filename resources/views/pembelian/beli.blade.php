@extends('layouts.nav')

@section('content')
    <form action="/tambahstok/{{ $produkbeli->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" value="{{ $produkbeli->nama_produk }}" readonly>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
        </div>
        <div class="mb-3">
            <label for="harga_per_produk" class="form-label">Harga Beli</label>
            <input type="number" class="form-control" id="harga_per_produk" name="harga_per_produk" placeholder="Harga per produk" disabled value="{{ $hargabeli }}">
        </div>
        <div class="mb-3">
            <label for="hargatotal" class="form-label">Harga Total</label>
            <input type="number" class="form-control" id="hargatotal" name="hargatotal" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

    <script>
        // Mengambil elemen input dan mendengarkan perubahan
        const jumlahInput = document.getElementById('jumlah');
        const hargaPerProdukInput = document.getElementById('harga_per_produk');
        const hargaTotalInput = document.getElementById('hargatotal');
        
        // Menambahkan event listener untuk setiap perubahan pada input jumlah atau harga per produk
        [jumlahInput, hargaPerProdukInput].forEach(input => {
            input.addEventListener('input', function() {
                // Mendapatkan nilai jumlah dan harga per produk
                const jumlah = parseFloat(jumlahInput.value);
                const hargaPerProduk = parseFloat(hargaPerProdukInput.value);
                
                // Melakukan perhitungan untuk mendapatkan harga total
                const hargaTotal = jumlah * hargaPerProduk;
                
                // Mengisi nilai pada input harga total
                hargaTotalInput.value = hargaTotal.toFixed(2); // Menggunakan toFixed untuk menampilkan 2 digit desimal
            });
        });
    </script>
@endsection
