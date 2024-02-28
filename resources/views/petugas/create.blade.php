@extends('layouts.nav')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email Terferivikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($petugas as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    {{-- <td></td> --}}
                                </tr>               
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <form action="/petugas/store" method="post">
                    @csrf
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Nama </label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <input name="level" type="hidden" value="petugas">
                    <input class="btn btn-primary" type="submit">
                </form>
            </div>
        </div>
    </div>
@endsection