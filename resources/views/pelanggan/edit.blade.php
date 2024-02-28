@extends('layouts.nav')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="/pelanggan/update/{{ $pel->id }}" method="post">
            @csrf
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Nama</label>
                <input value="{{ $pel->nama_pelanggan }}" type="text" name="nama_pelanggan" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Alamat</label>
                <input value="{{ $pel->alamat }}" type="text" name="alamat" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Nama</label>
                <input value="{{ $pel->no_telepon }}" type="text" name="no_telepon" class="form-control">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
           
        </div>
    </div>
@endsection