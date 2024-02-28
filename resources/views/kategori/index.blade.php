@extends('layouts.nav')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-responsive table align-items-center mb-0">
                        <thead>
                            <tr class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                <th>nama</th>
                                <th>
                                    act
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kateg as $item)
                                <tr>
                                    <td>
                                        {{ $item->nama_kategori }}
                                    </td>
                                    <td>
                                        <a href="/kategori/edit/{{ $item->id_kategori_produk }}">edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <form action="kategori/store" method="post">
            @csrf
            <div class="">
                <label class="form-label" for="">Nama Kategori</label>
                <input name="nama_kategori" type="text" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection