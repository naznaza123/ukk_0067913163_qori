@extends('layouts.nav')
@section('content')
@include('sweetalert::alert')
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Del</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pel as $item)
                    <tr class="align-middle text-center text-sm">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_pelanggan }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_telepon }}</td>
                        <td>
                            <a class="btn btn-danger" href="/pelanggan/delete/{{$item->id}}" data-confirm-delete="true">X</a>
                        </td>
                        <td>
                            <a href="/pelanggan/edit/{{ $item->id }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection