@extends('layouts.nav')
@section('content')
<div class="container ">
    <div class="row">
        @include('sweetalert::alert')
        <div class="col-md-6">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                                <th>Diskon</th>
                                <th>Harga Diskon</th>
                                <td>&nbsp;</td>
                                <th>
                                    Act
                                </th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                            <tr class="align-middle text-center text-sm">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td class=" font-weight-bolder ">{{ formatRupiah($item->harga,true) }}</td>
                                <td>{{ $item->stok }}
                                    @if($item->stok == 0)
                                        <span class="text-danger">Stok Habis</span>
                                    @endif
                                </td>
                                <td>
                                    <img width="60px" height="60px" src="image/{{ $item->gambar_produk }}" alt="" srcset="">
                                </td>
                                <td>
                                    {{ $item->id_diskon }}
                                </td>
                                <td>
                                    {{ formatRupiah($item->diskon,true) }}
                                </td>
                                <td>
                                    <a href="/produk/delete/{{ $item->id }}">
                                        <i class="fas fa-solid fa-xmark fa-sm" style="color: #ff0000;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="/produk/edit/{{ $item->id }}">
                                        <i class="fa-solid fa-pen fa-sm" style="color: #74C0FC;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <table border="1" class="table ">
                        
                       
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/produk/store" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        {{-- <label class="form-label">gambar</label> --}}
                        <input type="file" name="gambar_produk" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Expired</label>
                        <input type="date" name="tanggal_kadaluarsa" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Kategori id</label>
                        <select class="form-control" name="id_kategori" id="">
                            <option value=""></option>
                            @foreach ($kateg as $item)
                                <option value="{{ $item->id_kategori_produk }}">{{ $item->id_kategori_produk.'-'.$item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="number" name="id_kategori" class="form-control"> --}}
                    </div>
                    <label class="form-label">Pilih Diskon</label>
                    <div class="input-group input-group-outline my-3">
                        <select class="form-select" name="id_diskon" id="">
                            <option value=""></option>
                            @foreach ($diskon as $item)
                                <option value="{{ $item->id }}">{{ $item->id.'-'.$item->nama_diskon }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid">
                        <input class="d-grid btn bg-gradient-primary" value="SIMPAN" type="submit">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection