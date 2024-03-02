@extends('layouts.nav')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Produk') }}</div>

                <div class="card-body">
                    <form action="/produk/update/{{ $produk->id }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" name="id_produk" value="{{ $produk->id }}">

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="nama_produk">Nama Produk:</label>
                            <input id="nama_produk" class="form-control" type="text" name="nama_produk" value="{{ $produk->nama_produk }}" required>
                        </div>

                        <div class="form-group">
                            <label for="gambar_produk">Gambar Produk:</label>
                            <input id="gambar_produk" class="form-control-file" type="file" name="gambar_produk">
                            <img src="/image/{{ $produk->gambar_produk }}" width="60px" height="60px" alt="" srcset="">
                        </div>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="harga">Harga:</label>
                            <input id="harga" class="form-control" type="number" name="harga" value="{{ $produk->harga }}" required>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="harga_beli">Harga Beli:</label>
                            <input id="harga_beli" class="form-control" type="number" name="harga_beli" value="{{ $produk->harga_beli }}" required>
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok:</label>
                            <input id="stok" class="form-control" type="number" name="stok" value="{{ $produk->stok }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
                            <input id="tanggal_kadaluarsa" class="form-control" type="date" name="tanggal_kadaluarsa" value="{{ $produk->tanggal_kadaluarsa }}" required>
                        </div>

                        <div class="form-group ">
                            <label  for="id_kategori">Kategori:</label>
                            <select id="id_kategori" class="form-select" name="id_kategori" required>
                                @foreach($kateg as $kategori)
                                    <option value="{{ $kategori->id_kategori_produk }}" {{ $produk->id_kategori == $kategori->id_kategori_produk ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_diskon">Diskon:</label>
                            <select id="id_diskon" class="form-select" name="id_diskon" required>
                                @foreach($diskon as $d)
                                    <option value="{{ $d->id }}" {{ $produk->id_diskon == $d->id ? 'selected' : '' }}>{{ $d->nama_diskon }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
