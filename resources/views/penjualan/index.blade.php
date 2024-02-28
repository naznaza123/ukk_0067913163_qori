    @extends('layouts.master')
    @section('content')
        <script>
            $( function() {
                $( "#searchInput" ).autocomplete({
                    source: function( request, response ) {
                        // Lakukan request AJAX untuk mendapatkan data produk berdasarkan input
                        $.ajax({
                            url: "{{ route('autocomplete') }}",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function( data ) {
                                response( data );
                            }
                        });
                    },
                    minLength: 2 // Jumlah minimum karakter sebelum pencarian dimulai
                });
            } );
        </script>

        <div class="container">
            @include('sweetalert::alert')
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($produk as $item)
                <div class="col">
                    <div class="card h-100">
                        <img src="/image/{{ $item->gambar_produk }}" class="card-img-top" alt="{{ $item->nama_produk }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_produk }}</h5>
                            <p class="card-text">
                                <strong class="text-danger">{{ formatRupiah($item->diskon, true) }}</strong>
                                <del class="text-muted">{{ formatRupiah($item->harga, true) }}</del>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Stok: {{ $item->stok }}</small>
                            </p>
                        </div>
                        <div class="card-footer">
                            @if ($item->stok > 0)
                                <a href="addToCart/{{ $item->id }}" class="btn btn-primary btn-sm">
                                    <i class="ni ni-cart"></i> Add to Cart
                                </a>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>
                                    Stok Habis
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endsection