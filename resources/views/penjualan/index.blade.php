    @extends('layouts.master')
    @section('content')
    
        <script>
        </script>
        <script>
                function addToCartWithoutQuantity(id_produk) {
                    $.ajax({
                        url: "{{ url('addToCart') }}/" + id_produk,
                        method: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Produk berhasil ditambahkan ke keranjang!'
                            });
                        },
                        error: function(xhr, status, error) {
                            if(xhr.status === 422) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Jumlah melebihi stok produk!'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Terjadi kesalahan: ' + error
                                });
                            }
                        }
                    });
                }

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
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Produk berhasil ditambahkan ke keranjang!'
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle jika terjadi kesalahan saat menambahkan ke keranjang
                            // Misalnya, tampilkan pesan error atau lakukan tindakan lain
                            if(xhr.status === 422) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Jumlah melebihi stok produk!'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Terjadi kesalahan: ' + error
                                });
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

        <style>
            .diskon-info {
                position: absolute;
                top: 10px; /* Sesuaikan posisi vertikal teks sesuai kebutuhan */
                left: 10px; /* Sesuaikan posisi horizontal teks sesuai kebutuhan */
                background-color: rgba(255, 255, 255, 0.8); /* Atur warna latar belakang dengan transparansi */
                padding: 5px 10px; /* Sesuaikan padding sesuai kebutuhan */
                border-radius: 5px; /* Atur radius sudut untuk menampilkan kotak */
                font-weight: bold; /* Atur teks menjadi tebal */
            }
        </style>

        <div class="container">
            @include('sweetalert::alert')
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($produk as $item)
                <div class="col">
                    <div class="card h-100">
                        <img src="/image/{{ $item->gambar_produk }}" class="card-img-top" alt="{{ $item->nama_produk }}">
                        @if(isset($diskon[$item->id]))
                            <div class="diskon-info">
                                <span class="badge badge-pill bg-gradient-warning">
                                    @if ($diskon[$item->id]->jenis_diskon=='%')
                                        {{ $diskon[$item->id]->nilai_diskon.'%' }}     
                                    @else
                                        -{{ formatRupiah($diskon[$item->id]->nilai_diskon,true) }}      
                                    @endif
                                </span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_produk }}</h5>
                            <p class="card-text">
                                <strong class="text-primary text-gradient">{{ formatRupiah($item->diskon, true) }}</strong>
                                <del class="text-muted">{{ formatRupiah($item->harga, true) }}</del>
                            </p>
                            <p class="card-text">
                                @if ($item->stok > 0 )
                                <span class="badge badge-pill bg-gradient-primary">
                                    <small class="">Stok: {{ $item->stok }}</small>
                                </span>            
                                @else
                                <span class="badge badge-pill bg-gradient-danger">
                                    <small class="">Stok: {{ $item->stok }}</small>
                                </span>              
                                @endif
                            </p>
                        </div>
                        <div class="card-footer">
                            @if ($item->stok > 0)
                            <div class="d-grid">
                                <button class="btn bg-gradient-success btn-sm btnAddToCart" data-toggle="modal" data-target="#modalBeli_{{$item->id}}">
                                   Jumlah Lebih Banyak
                                </button>
                            </div>
                            <div class="d-grid">
                                <a class="btn bg-gradient-primary"  onclick="addToCartWithoutQuantity({{ $item->id }})" href="/addToCart/{{ $item->id }}">Pilih Produk</a>

                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                            </div>
                            {{-- modal --}}
                            <div class="modal fade" id="modalBeli_{{$item->id}}" tabindex="-1" aria-labelledby="modalBeliLabel_{{$item->id}}" aria-hidden="true">
                                 @include('sweetalert::alert')
                                
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
                            <button class="btn bg-gradient-secondary btn-sm" disabled>
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