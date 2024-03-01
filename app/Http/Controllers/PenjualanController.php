<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\DetailJual;
use App\Models\DetailPenjualan;
use App\Models\DetailTransaksi;
use App\Models\Diskon;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Transaksi;
use tambah_detail_transaksi;
use Illuminate\Http\Request;
use Alert;
use App\Models\Pelanggan;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use LDAP\Result;
use PHPUnit\Framework\Attributes\Group;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use function Laravel\Prompts\alert;

class PenjualanController extends Controller
{
    //
    public function laporanpenjualan()
    {
        return view('laporan.penjualan');
    }
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
        $pdf = PDF::loadView('laporan.penjualan_pdf', compact('transaksis', 'start_date', 'end_date'));

        // Return file PDF untuk di-download oleh pengguna
        return $pdf->download('laporan_penjualan.pdf');
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

        return view('laporan.penjualan', compact('transaksis', 'start_date', 'end_date'));
    }
    public function cari(Request $req)
    {
        // // $data['produk']=Produk::all();
        // $data['produk']=Produk::where('nama_produk',$req->cari)->orWhere('id',$req->cari)->get();
        
        // return view('penjualan.index',$data);

        $searchTerm = $req->cari;
        $produk = Produk::where('nama_produk', 'like', "%{$searchTerm}%")
                        ->orWhere('id', 'like', "%{$searchTerm}%")
                        ->get();
    
        $data = [
            'produk' => $produk
        ];
    
        return view('penjualan.index', $data);
    }
    public function autocomplete(Request $request)
    {
        $term = $request->input('term');
        $produk = Produk::where('nama_produk', 'like', "%{$term}%")
                        ->orWhere('id', 'like', "%{$term}%")
                        ->pluck('nama_produk', 'id');

        return response()->json($produk);
    }

    public function index(Request $request){
        $diskon=Diskon::all();
        $produk=Produk::all();
        $pelanggan=Pelanggan::all();

        $dis = []; 
        foreach ($produk as $item) {
            $iddiskon = $item->id_diskon;
            $diskonProduk = Diskon::find($iddiskon);
            $dis[] = $diskonProduk;
        }
        // $detp=Detail_Transaksi::all();
        
        // $idp=$request->id_produk;
        // $dp=Produk::find($idp);
        $data=[
            'produk'=>$produk,
            // 'dp'=>$dp,
            'diskoninfo'=>$dis,
            'diskon'=>$diskon,
            'pel'=>$pelanggan,
            // 'dt'=>$detp
        ];
        return view('.penjualan.index',$data);
    }
    public function cart(){
        $data['pel']=Pelanggan::all();

    
        return view ('cart',$data);
    }
    public function removeFromCart($id_produk)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id_produk])) {
            unset($cart[$id_produk]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    // public function addToCart(Request $request, $id_produk) {
    //     $product = Produk::find($id_produk);
    
    //     if(!$product) {
    //         abort(404); // Handle jika produk tidak ditemukan
    //     }
    
    //     $cart = session()->get('cart');
    
    //     // Jika keranjang kosong, inisialisasi dengan array kosong
    //     if(!$cart) {
    //         $cart = [
    //             $id_produk => [
    //                 'nama_produk' => $product->nama_produk,
    //                 'harga' => $product->diskon,
    //                 'quantity' => 1,
    //                 'gambar_produk' => $product->gambar_produk
    //             ]
    //         ];
    
    //         session()->put('cart', $cart);
    //         Alert::success('horeng!','produk sudah ditambahkan ke keranjang');
    //         return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    //     }
    
    //     // Jika produk sudah ada di keranjang, cek apakah jumlah melebihi stok yang tersedia
    //     if(isset($cart[$id_produk])) {
    //         // Periksa apakah jumlah yang akan ditambahkan melebihi stok yang tersedia
    //         if($cart[$id_produk]['quantity'] + 1 > $product->stok) {
    //             Alert::error('error','Stok produk tidak mencukupi!');
    //             return redirect()->back();
    //         }
    
    //         $cart[$id_produk]['quantity']++;
    //         session()->put('cart', $cart);
    
    //         Alert::success('horeng!','produk sudah ditambahkan ke keranjang');
    //         return redirect()->back()->with('success', 'Kuantitas produk berhasil diperbarui!');
    //     }
    
    //     // Jika produk belum ada di keranjang, tambahkan ke keranjang
    //     $cart[$id_produk] = [
    //         'nama_produk' => $product->nama_produk,
    //         'harga' => $product->diskon,
    //         'quantity' => 1,
    //         'gambar_produk' => $product->gambar_produk
    //     ];
    
    //     session()->put('cart', $cart);
    //     Alert::success('horeng!','produk sudah ditambahkan ke keranjang');
    
    //     return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    // }
    public function addToCart(Request $request, $id_produk) {
        $product = Produk::find($id_produk);
        $totalQuantity = 0;
    
        if(!$product) {
            abort(404); // Handle jika produk tidak ditemukan
        }
        $request->validate([
            'jumlahBeli' => ['required', 'numeric', 'min:1', 'max:'.$product->stok],
        ]);
        // Jumlah pembelian yang diminta
        $jumlahBeli = $request->jumlahBeli;
    
        // Jika jumlah pembelian melebihi stok yang tersedia, kembalikan pesan kesalahan
        if($jumlahBeli > $product->stok) {
            Alert::error('bayar!','ulah poho mayar');
            return redirect()->back();

            // return redirect()->back();
        }
    
        $cart = session()->get('cart');
    
        // Jika keranjang kosong, inisialisasi dengan array kosong
        if(!$cart) {
            $cart = [];
        }
        

        // Periksa apakah produk sudah ada di keranjang
        if(isset($cart[$id_produk])) {
            // Update jumlah pembelian dengan yang diinputkan dalam modal
            if($product->stok <= 0 || $product->stok < $cart[$id_produk]['quantity'] + 1) {
                Alert::error('Error', 'Stok produk tidak mencukupi!');
                return redirect()->back();
            }
            $cart[$id_produk]['quantity'] += $jumlahBeli;
        } else {
            // Tambahkan produk ke keranjang dengan jumlah yang diinputkan dalam modal
            $cart[$id_produk] = [
                'nama_produk' => $product->nama_produk,
                'harga' => $product->diskon,
                'quantity' => $jumlahBeli,
                'gambar_produk' => $product->gambar_produk
            ];
        }

    
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
    // public function addToCart1(Request $request, $id_produk) {
    //     $product = Produk::find($id_produk);
    
    //     if(!$product) {
    //         abort(404); // Handle jika produk tidak ditemukan
    //     }
    
    //     $cart = session()->get('cart');
    
    //     // Jika keranjang kosong, inisialisasi dengan array kosong
    //     if(!$cart) {
    //         $cart = [
    //             $id_produk => [
    //                 'nama_produk' => $product->nama_produk,
    //                 'harga' => $product->harga,
    //                 'quantity' => 1,
    //                 'gambar_produk' => $product->gambar_produk
    //             ]
    //         ];
    
    //         session()->put('cart', $cart);
    //         Alert::success('horeng!','produk sudah ditambahkan ke keranjang');
    //         return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    //     }
    
    //     // Jika produk sudah ada di keranjang, tingkatkan kuantitasnya
    //     if(isset($cart[$id_produk])) {
    //         $cart[$id_produk]['quantity']++;
    //         session()->put('cart', $cart);
            
    //         //  return view ('cart');
    //         Alert::success('horeng!','produk sudah ditambahkan ke keranjang');

    //         return redirect()->back()->with('success', 'Kuantitas produk berhasil diperbarui!');
    //     }
    
    //     // Jika produk belum ada di keranjang, tambahkan ke keranjang
    //     $cart[$id_produk] = [
    //         'nama_produk' => $product->nama_produk,
    //         'harga' => $product->diskon,
    //         'quantity' => 1,
    //         'gambar_produk' => $product->gambar_produk
    //     ];

    
    //     session()->put('cart', $cart);
    //     Alert::success('horeng!','produk sudah ditambahkan ke keranjang');

    //     // return view ('cart');
    //     return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    // }
    public function addToCart1(Request $request, $id_produk) {
        $product = Produk::find($id_produk);
    
        if(!$product) {
            abort(404); // Handle jika produk tidak ditemukan
        }
    
        $cart = session()->get('cart');
    
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
    
            session()->put('cart', $cart);
            Alert::success('horeng!','produk sudah ditambahkan ke keranjang');
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        }
    
        // Jika produk sudah ada di keranjang, dan quantity tidak melebihi stok, tingkatkan kuantitasnya
        if(isset($cart[$id_produk])) {
            // Periksa apakah jumlah yang akan ditambahkan melebihi stok yang tersedia
            if($cart[$id_produk]['quantity'] + 1 > $product->stok) {
                Alert::error('Error', 'Stok produk tidak mencukupi!');
                return redirect()->back();
            }
    
            // Tingkatkan kuantitas produk hanya jika tidak melebihi stok
            $cart[$id_produk]['quantity']++;
            session()->put('cart', $cart);
    
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
    
        session()->put('cart', $cart);
        Alert::success('horeng!','produk sudah ditambahkan ke keranjang');
    
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
    

    
    
    
    public function checkout(Request $request)
    {
        // Mendapatkan data keranjang dari session
        $cart = session()->get('cart');

        if (!$cart) {
            // Handle ketika keranjang kosong, misalnya redirect atau tampilkan pesan error
            Alert::error('error', 'Keranjang belanja kosong!');

            return redirect()->back()->with();
        }

        // Misalnya, Anda ingin membuat transaksi baru untuk setiap checkout
        $transaksi = new Transaksi();
        $transaksi['tanggal_jual']=date('y-m-d');
        $mb=$transaksi['metode_pembayaran']=$request->metode_pembayaran;
        $transaksi->save();
        if($mb=='TF'){
            return redirect('transfer');
        }   
        $totalharga=0;
        // Iterasi melalui setiap item di keranjang untuk membuat detail transaksi
        foreach ($cart as $id_produk => $details) {
            // Misalnya, Anda ingin menyimpan setiap produk yang dibeli ke dalam tabel Detail_Transaksi
            $detailTransaksi = new Detail_Transaksi();  
            $detailTransaksi->transaksi_id = $transaksi->id; // Menghubungkan detail transaksi dengan transaksi yang baru dibuat
            $detailTransaksi->produk_id = $id_produk;
            $detailTransaksi->jumlah = $details['quantity'];
            $detailTransaksi->harga = $details['harga'];
            $detailTransaksi->save();
            $totalharga += $details['harga'] * $details['quantity'];   
            
            $prod=Produk::find($id_produk);
            $prod->stok -= $details['quantity'];
            $prod->save();
            
        }
        $details=Detail_Transaksi::where('transaksi_id',$transaksi->id)->get();
        $pel=Pelanggan::where('id',$request->id_pelanggan)->first();
        
        $tothar=$request->totalharga;
        $inputdiskon=$request->diskon;
        $totalsetdiskon=$request->total_setelah_diskon;
        // Setelah checkout selesai, hapus keranjang dari session
        session()->forget('cart');   
        // Redirect ke halaman sukses atau konfirmasi pembayaran
        Alert::info('bayar!','ulah poho mayar');

        return view('invoice',compact('transaksi', 'details', 'totalharga','pel','totalsetdiskon','inputdiskon','tothar'));
    }   

    public function cetak_pdf(Request $request)
    {
        $transaksiId = $request->input('transaksi_id');
        $pelangganId = $request->input('id_pelanggan');
        $tothar=$request->input('totalharga');
        // Ambil data transaksi, pelanggan, dan detail transaksi
        $transaksi = Transaksi::findOrFail($transaksiId);
        $pelanggan = Pelanggan::findOrFail($pelangganId);
        $details = Detail_Transaksi::where('transaksi_id', $transaksiId)->get();
    
        // Pastikan $pelanggan memiliki data sebelum melanjutkan
        if ($pelanggan) {
            // Load view invoice_pdf.blade.php dan kirimkan data yang diperlukan
            $pdf = PDF::loadView('invoice_pdf', compact('transaksi', 'details', 'pelanggan','tothar'));
    
            // Download file PDF
            return $pdf->download('invoice.pdf');
        } else {
            // Lakukan penanganan kesalahan jika $pelanggan kosong
            return redirect()->back()->with('error', 'Data pelanggan tidak ditemukan.');
        }

        return redirect('penjualan');
    }
    
    
    
}
