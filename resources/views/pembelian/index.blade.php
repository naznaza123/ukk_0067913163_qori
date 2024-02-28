@extends('layouts.nav')

@section('content')
    @include('sweetalert::alert')

    <div class="row">
        @foreach ($produk as $item)
            <div class="col-md-3">
                <div class="card m-3" style="width: 15rem;">
                    <img src="/image/{{ $item->gambar_produk }}" class="card-img-top" alt="{{ $item->nama_produk }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->nama_produk }}</h5>
                        <p class="card-text font-weight-bold text-primary mb-0">
                            {{-- <strong>{{ formatRupiah($item->diskon, true) }}</strong> --}}
                        </p>
                        <strong class="card-text">
                            {{-- <del>{{ formatRupiah($item->harga, true) }}</del> --}}
                            Stok : {{ $item->stok }}
                            @if($item->stok == 0)
                                <span class="text-danger">Stok Habis</span>
                            @endif
                        </strong>
                        <div class="mt-auto">
                            <a href="pilih/{{ $item->id }}" class="btn btn-primary btn-sm mt-2">Pilih Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Produk ke Keranjang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Nama Produk"
                        value="{{ isset($produkbeli) ? $produkbeli->nama_produk : '' }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
@endsection
