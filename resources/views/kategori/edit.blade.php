@extends('layouts.nav')
@section('content')
    <form action="/kategori/update/{{ $kat->id_kategori_produk }}" method="post">
    @csrf
    <div class="">
        <label class="form-label" for="">Nama Kategori</label>
        <input value="{{ $kat->nama_kategori }}" name="nama_kategori" type="text" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
    </form>
@endsection