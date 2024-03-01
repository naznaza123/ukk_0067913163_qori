<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Diskon;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    //
    public function cetakPDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Convert tanggal awal dan akhir ke format yang sesuai
        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');

        // Ambil data penjualan berdasarkan rentang tanggal
        $transaksis = Transaksi::with('detailTransaksis')
            ->whereBetween('tanggal_jual', [$start_date, $end_date])
            ->get();

        // Lakukan pengecekan apakah ada data transaksi
        if ($transaksis->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data penjualan pada rentang tanggal yang diminta.');
        }
    

        // Load view laporan penjualan ke dalam PDF
        $pdf = PDF::loadView('petugas.penjualan_pdf', compact('transaksis', 'start_date', 'end_date'));

        // Return file PDF untuk di-download oleh pengguna
        return $pdf->download('laporan_penjualan.pdf');
    }
    public function laporanpenjualan()
    {
        return view('petugas.laporan_penjualan');
    }
    public function search(Request $request)
    {
        
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Convert tanggal awal dan akhir ke format yang sesuai
        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');

        // Ambil data penjualan berdasarkan rentang tanggal
        $transaksis = Transaksi::with('detailTransaksis')
            ->whereBetween('tanggal_jual', [$start_date, $end_date])
            ->get();

        return view('petugas.laporan_penjualan', compact('transaksis', 'start_date', 'end_date'));
    }
    public function index(){
    
        $transaksis = Transaksi::with('detailTransaksis')->get();
        $totalKeuntungan = 0;
        // Menghitung total penjualan
        $totalPenjualan = 0;
        foreach ($transaksis as $transaksi) {
            foreach ($transaksi->detailTransaksis as $detailTransaksi) {
                // Hitung total harga jual
                $totalHargaJual = $detailTransaksi->jumlah * $detailTransaksi->harga;
    
                // Hitung total biaya pembelian produk
                $totalBiayaPembelian = $detailTransaksi->jumlah * $detailTransaksi->produk->harga_beli;
    
                // Hitung keuntungan
                $keuntungan = $totalHargaJual - $totalBiayaPembelian;
    
                // Tambahkan keuntungan ke total keuntungan keseluruhan
                $totalKeuntungan += $keuntungan;
    
                // Tambahkan total harga jual ke total penjualan
                $totalPenjualan += $totalHargaJual;
            }
        }
    
        // Memuat tampilan dashboard petugas sambil menyertakan variabel total penjualan
        return view('petugas.index', compact('totalPenjualan','totalKeuntungan'));
    }
    

    public function tabproduk()
    {
        $data['diskon']=Diskon::all();
        return view('petugas.produk',$data);
    }
    public function create()
    {
        $data['petugas'] = User::where('level','petugas')->get();
        return view ('petugas.create',$data);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'email'=>'email',
            'password'=>'required',
            'level'=>'required'
        ]);
        $data['password']=bcrypt($request->password);
        User::create($data);
        return back();
    }
}
