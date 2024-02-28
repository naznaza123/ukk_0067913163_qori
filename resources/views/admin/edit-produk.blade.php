@extends('layouts.nav')
@section('content')
<div class="container p-5 mt-5">
    <div class="row">
        <div class="col">
            <form action="/produk/update/{{ $produk->id }}" enctype="multipart/form-data" method="post">
            @csrf
            <input value="{{ $produk->nama_produk }}" placeholder="nama" type="text" name="nama_produk">
            <input value="{{ $produk->gambar_produk }}" type="file" name="gambar_produk">
            <img src="/image/{{ $produk->gambar_produk }}" width="60px" height="60px" alt="" srcset="">
            <input value="{{ $produk->harga }}" placeholder="harga" type="number" name="harga">
            <input value="{{ $produk->stok }}" placeholder="stok" type="number" name="stok">
            <input type="date" name="tanggal_kadaluarsa"> <small class="text-body-danger">{{ $produk->tanggal_kadaluarsa }}</small>
            
            <input value="{{ $produk->id_kategori }}" placeholder="id_kat" type="text" name="id_kategori">
            <input value="{{ $produk->id_diskon }}" placeholder="disk" type="text" name="id_diskon">
            <input type="submit">
            </form>
        </div>
    </div>
</div>
@endsection