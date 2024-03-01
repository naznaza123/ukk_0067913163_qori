<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Alert;
use App\Models\Detail_beli;
use App\Models\DetailJual;
use App\Models\Pembelian;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PembelianController extends Controller
{
    //
    public function index()
    {
        
        $data['produk']=Produk::all();
        return view ('pembelian.index',$data);
    }
    public function laporanpembelian()
    {
        return view ('laporan.pembelian');
    }
    public function search(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Convert tanggal awal dan akhir ke format yang sesuai
        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');
        // Ambil data penjualan berdasarkan rentang tanggal
        $transaksis = Pembelian::with('detailBeli')
            ->whereBetween('tanggal_beli', [$start_date, $end_date])
            ->get();

        return view('laporan.pembelian', compact('transaksis', 'start_date', 'end_date'));
    }
    public function cetakPDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Convert tanggal awal dan akhir ke format yang sesuai
        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');

        // Ambil data penjualan berdasarkan rentang tanggal
        $transaksis = Pembelian::with('detailBeli')
            ->whereBetween('tanggal_beli', [$start_date, $end_date])
            ->get();

        // Lakukan pengecekan apakah ada data transaksi
        if ($transaksis->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data penjualan pada rentang tanggal yang diminta.');
        }

        // Load view laporan penjualan ke dalam PDF
        $pdf = PDF::loadView('laporan.pembelian_pdf', compact('transaksis', 'start_date', 'end_date'));

        // Return file PDF untuk di-download oleh pengguna
        return $pdf->download('laporan_pembelian.pdf');
    
    }
    public function addstok(Request $request, $id_produk)
    {
        // Temukan produk berdasarkan ID
        $produk = Produk::findOrFail($id_produk);
        
        $pembelian= new Pembelian();
        $pembelian['tanggal_beli']=date('y-m-d');
        $pembelian['metode_pembayaran']='CASH';
        $pembelian->save();

        // Validasi request
        $request->validate([
            'jumlah' => 'required|numeric|min:1', // Pastikan jumlah yang dimasukkan adalah angka dan minimal 1
            
        ]);
        $data=[
            'pembelian_id'=>$pembelian->id,
            'produk_id'=>$produk->id,
            'harga'=>$request->hargatotal,
            'jumlah'=>$request->jumlah
        ];
    
        // Tambahkan stok produk sesuai dengan jumlah yang dimasukkan
        $produk->stok += $request->jumlah;
    
        // Simpan perubahan
        $produk->save();
        Detail_beli::create($data);

        Alert::success('Pembelian Berhasil','produk sudah di update stok');
        return redirect('pembelian');
    }
    
    public function pilih($id_produk)
    {
        $data['produkbeli']=Produk::find($id_produk);
        return view ('pembelian.beli',$data);
    }

    public function carts()
    {
        // session()->forget('carts');   
        return view('pembelian.carts');
    }
    public function addkeranjang(Request $request, $id_produk) {
        $product = Produk::find($id_produk);
    
        if(!$product) {
            abort(404); // Handle jika produk tidak ditemukan
        }
    
        $cart = session()->get('carts');
    
        // Jika keranjang kosong, inisialisasi dengan array kosong
        if(!$cart) {
            $cart = [
                $id_produk => [
                    'nama_produk' => $product->nama_produk,
                    'harga' => $product->harga,
                    'quantity' => 1,
                    'gambar_produk' => $product->gambar_produk
                ]
            ];
    
            session()->put('carts', $cart);
            Alert::success('horeng!','produk sudah ditambahkan ke keranjang');
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        }
    
        // Jika produk sudah ada di keranjang, tingkatkan kuantitasnya
        if(isset($cart[$id_produk])) {
            $cart[$id_produk]['quantity']++;
            session()->put('carts', $cart);
            
            //  return view ('cart');
            Alert::success('horeng!','produk sudah ditambahkan ke keranjang');

            return redirect()->back()->with('success', 'Kuantitas produk berhasil diperbarui!');
        }
    
        // Jika produk belum ada di keranjang, tambahkan ke keranjang
        $cart[$id_produk] = [
            'nama_produk' => $product->nama_produk,
            'harga' => $product->diskon,
            'quantity' => 1,
            'gambar_produk' => $product->gambar_produk
        ];
    
        session()->put('carts', $cart);
        Alert::success('horeng!','produk sudah ditambahkan ke keranjang');

        // return view ('cart');
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function beli(Request $request)
    {
        // Mendapatkan data keranjang dari session
        
        $cart = session()->get('carts');

        if (!$cart) {
            // Handle ketika keranjang kosong, misalnya redirect atau tampilkan pesan error
            Alert::error('error', 'Keranjang belanja kosong!');

            return redirect()->back()->with();
        }

        // Misalnya, Anda ingin membuat transaksi baru untuk setiap checkout
        $transaksi = new Pembelian();
        $transaksi['tanggal_beli']=date('y-m-d');
        $mb=$transaksi['metode_pembayaran']=$request->metode_pembayaran;
        $transaksi->save();

        if($mb=='TF'){
            return redirect('transfer');
        }   
        

        $totalharga=0;

        // Iterasi melalui setiap item di keranjang untuk membuat detail transaksi
        foreach ($cart as $id_produk => $details) {
            // Misalnya, Anda ingin menyimpan setiap produk yang dibeli ke dalam tabel Detail_Transaksi
            $detailTransaksi = new Detail_beli();  
            $detailTransaksi->pembelian_id = $transaksi->id; // Menghubungkan detail transaksi dengan transaksi yang baru dibuat
            $detailTransaksi->produk_id = $id_produk;
            $detailTransaksi->jumlah = $details['quantity'];
            $detailTransaksi->harga = $details['harga'];
            $detailTransaksi->save();
            
            
            $totalharga += $details['harga'] * $details['quantity'];

            $prod=Produk::find($id_produk);
            $prod->stok += $details['quantity'];
            $prod->save();
            
        }
        // $details=[
        //     'transaksi'=>$transaksi,
        //     'details'=>Detail_Transaksi::where('transaksi_id',$transaksi->id)->get()
        // ]   ;


        $details=Detail_beli::where('pembelian_id',$transaksi->id)->get();

        
        // Setelah checkout selesai, hapus keranjang dari session
        session()->forget('carts');   
        // Redirect ke halaman sukses atau konfirmasi pembayaran
        Alert::info('ok','okkkkkkkkk');
        
        return back();
        // return view('invoice',compact('transaksi', 'details', 'totalharga','pel','totalsetdiskon','inputdiskon'));
        // return redirect('pembayaran');
        // return redirect()->route('thankyou')->with('success', 'Pesanan berhasil ditempatkan!');
    }


}
