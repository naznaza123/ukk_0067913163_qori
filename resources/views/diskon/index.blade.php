@extends('layouts.master')
@section('content')
    <div class="container mt-5 p-5" >
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/diskon/create" method="POST">
                        @csrf
                        <div class="">
                            <label for="nama_diskon">Nama Diskon</label>
                            <input type="text" name="nama_diskon" class="form-control">
                        </div>
                        <div class="">
                            <label for="jenis_diskon">Jenis</label>
                            <select name="jenis_diskon" id="">
                                <option value=""></option>
                                <option value="%">Persen</option>
                                <option value="RP">RP</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="nilai_diskon">Nilai</label>
                            <input type="text" name="nilai_diskon" class="form-control">
                        </div>
                        <div class="">
                            <label for="deskripsi">Desk</label>
                            <input type="text" name="deskripsi" class="form-control">
                        </div>
                        <div class="">
                            <label for="berlaku_mulai">mulai</label>
                            <input type="date" name="berlaku_mulai" class="form-control">
                        </div>
                        <div class="">
                            <label for="berlaku_selesai">selesai</label>
                            <input type="date" name="berlaku_selesai" class="form-control">
                        </div>
                        <button type="submit">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <table class="table table-striped table-responsive">
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Nilai</th>
                        <th>Deskripsi</th>
                        <th>Berlaku</th>
                    </tr>
                    @foreach ($diskon as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->nama_diskon }}</td>
                        <td>{{ $item->jenis_diskon }}</td>
                        <td>{{ $item->nilai_diskon }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->berlaku_mulai.'-'.$item->berlaku_selesai }} </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection