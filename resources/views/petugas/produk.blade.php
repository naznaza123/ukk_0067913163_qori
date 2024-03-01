@extends('layouts.master')
@section('content')
<style>
    .hidden {
      display: none;
    }
  </style>
<div class="row">
    @include('sweetalert::alert')
    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Diskon</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai Diskon</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Berlaku</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diskon as $item)
                    <tr>
                        <td class="align-middle text-center text-sm">{{ $item->nama_diskon }}</td>
                        <td class="align-middle  text-center text-sm">{{ $item->jenis_diskon }}</td>
                        <td class="align-middle font-weight-bold text-center text-sm">
                        <span class="badge badge-pill bg-gradient-primary">
                                {{ $item->nilai_diskon }}
                        </span>
                        </td>
                        <td class="align-middle text-center text-sm">{{ $item->deskripsi }}</td>
                        <td class="align-middle font-weight-bold text-center text-sm">{{  $item->berlaku_mulai.' -Sampai- '.$item->berlaku_selesai  }}</td>
                        <td>&nbsp;</td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body ">
                <select class="form-select" id="jenisDiskon" onchange="toggleForm()">
                    <option value="persen">Diskon Persen</option>
                    <option value="rupiah">Diskon Rupiah</option>
                </select>

                <div id="formDiskonPersen">
                    <!-- Tampilkan form untuk diskon persen -->
                    <form action="/diskon/create" method="post">
                        @csrf
                        <input type="hidden" value="%" name="jenis_diskon">
                        <label for="namadiskon">Nama Diskon</label>
                        <input id="namadiskon" type="text" class="form-control" name="nama_diskon">
                        <label for="desk">Deskripsi</label>
                        <input id="desk" type="text" class="form-control" name="deskripsi">
                        <div class="d-flex p-2">
                            <input class="form-control" type="date" name="berlaku_mulai" placeholder="Berlaku mulai..">
                            <div class="align-middle m-2">
                            <label for="">Sampai</label>
                            </div>
                            <input class="form-control" type="date" name="berlaku_selesai" placeholder="Berlaku selesai..">
                        </div>
                        <label for="diskonPersen">Diskon Persen:</label>
                        <input class="form-control " placeholder="masukan diskon.....%" type="number" id="diskonPersen" name="nilai_diskon" min="0" max="100">
                        <div class="d-grid">
                            <button type="submit" class="d-grid btn btn-success mt-3">
                                <i class="ni ni-fat-add"></i>
                            </button>
                        </div>
                    </form>
                </div>
                  
                <div id="formDiskonRupiah" class="hidden">
                    <!-- Tampilkan form untuk diskon rupiah -->
                    <form action="/diskon/create" method="post">
                        @csrf
                        <input type="hidden" value="RP" name="jenis_diskon">
                        <label for="namadiskon">Nama Diskon</label>
                        <input id="namadiskon" type="text" class="form-control" name="nama_diskon">
                        <label for="desk">Deskripsi</label>
                        <input id="desk" type="text" class="form-control" name="deskripsi">
                        <div class="d-flex p-2">
                            <input class="form-control" type="date" name="berlaku_mulai" placeholder="Berlaku mulai..">
                            <div class="align-middle m-2">
                            <label for="">Sampai</label>
                            </div>
                            <input class="form-control" type="date" name="berlaku_selesai" placeholder="Berlaku selesai..">
                        </div>
                        <label for="diskonRupiah">Diskon Rupiah:</label>
                        <input class="form-control" placeholder="masukan diskon Rupiah..." type="number" id="diskonRupiah" name="nilai_diskon" min="0">
                        <div class="d-grid">
                            <button type="submit" class="d-grid btn btn-success mt-3">
                                <i class="ni ni-fat-add"></i>
                            </button>
                        </div>
                    </form>
                </div>
                  
                <script>
                  function toggleForm() {
                    var jenisDiskon = document.getElementById("jenisDiskon").value;
                    var formDiskonPersen = document.getElementById("formDiskonPersen");
                    var formDiskonRupiah = document.getElementById("formDiskonRupiah");
                  
                    if (jenisDiskon === "persen") {
                      formDiskonPersen.classList.remove("hidden");
                      formDiskonRupiah.classList.add("hidden");
                    } else if (jenisDiskon === "rupiah") {
                      formDiskonPersen.classList.add("hidden");
                      formDiskonRupiah.classList.remove("hidden");
                    }
                  }
                  
                  // Panggil toggleForm() untuk menyesuaikan tampilan saat halaman dimuat
                  toggleForm();
                </script>        
            </div>
        </div>
       
    </div>
</div>
@endsection