    @extends('layouts.master')
    @section('content')
        <script>
        </script>
        <script>
            function addToCartWithQuantity(id_produk) {
                var jumlahBeli = document.getElementById('jumlahBeli_' + id_produk).value;
                
                $.ajax({
                    url: "{{ url('addToCart') }}/" + id_produk,
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        jumlahBeli: jumlahBeli
                    },
                    success: function(response) {
                        // Handle jika penambahan ke keranjang berhasil
                        // Misalnya, tampilkan pesan sukses atau lakukan tindakan lain
                        $('#modalBeli_' + id_produk).modal('hide');
                        alert('Produk berhasil ditambahkan ke keranjang!');
                    },
                    error: function(xhr, status, error) {
                        // Handle jika terjadi kesalahan saat menambahkan ke keranjang
                        // Misalnya, tampilkan pesan error atau lakukan tindakan lain
                        if(xhr.status === 422) {
                            alert('Jumlah melebihi stok produk!');
                        } else {
                            alert('Terjadi kesalahan: ' + error);
                        }
                    }
                });
            }

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
                            <button class="btn btn-primary btn-sm btnAddToCart" data-toggle="modal" data-target="#modalBeli_{{$item->id}}">
                                <i class="ni ni-cart"></i> Add to Cart
                            </button>
                            {{-- modal --}}
                            <div class="modal fade" id="modalBeli_{{$item->id}}" tabindex="-1" aria-labelledby="modalBeliLabel_{{$item->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalBeliLabel_{{$item->id}}">Masukkan Jumlah Pembelian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formBeli_{{$item->id}}">
                                                <div class="form-group">
                                                    <label for="jumlahBeli">Jumlah:</label>
                                                    <input type="number" class="form-control" id="jumlahBeli_{{$item->id}}" name="jumlahBeli" min="1">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary" onclick="addToCartWithQuantity({{$item->id}})">Tambah ke Keranjang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        {{-- Modal --}}
        <!-- Modal -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> --}}
        
  
    @endsection