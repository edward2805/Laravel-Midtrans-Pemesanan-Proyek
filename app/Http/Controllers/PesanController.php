<?php

namespace App\Http\Controllers;
use App\Models\DetailBarang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Auth;
use Alert;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index(DetailBarang $Barang){

        return view ('pesan.index', [
            "title" => "Home",
            "active" => "Home",
            "Barang" => $Barang]);
    }

    public function pesan(Request $request, $id){

        $Barang = DetailBarang::where('id', $id)->first();
        $tanggal = Carbon::now();

        // cek stok
        if($request->jumlah_pesan > $Barang->stok)
        {
            alert()->error('stok tidak cukup', 'error');
            return redirect('pesan/'.$id);
        }

        // cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        // menyimpan ke database pesanan 
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
        }
        
        // menyimpan ke database detail pesanan
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        // cek pesanan detail

        $cek_pesanan_detail = PesananDetail::where('barang_id', $Barang->id)
            ->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $Barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $Barang->harga*$request->jumlah_pesan;
            $pesanan_detail->save();
        }else
        {
            $pesanan_detail = PesananDetail::where('barang_id', $Barang->id)
            ->where('pesanan_id', $pesanan_baru->id)->first();

            $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

            // jml harga baru
            $harga_pesanan_detail_baru = $Barang->harga*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        // jumlah keseluruhan 
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$Barang->harga*$request->jumlah_pesan;
        $pesanan->update();
        
        alert()->success('Pesanan Berhasil di masukkan keranjang', 'Succes');
        return redirect('/');

    }

    public function check_out(){
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if(!empty($pesanan)){
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            
            return view ('pesan.check_out', [
                "title" => "Home",
                "active" => "Home",
                "pesanan" => $pesanan,
                "pesanan_details" => $pesanan_details,
            ]);
        }
        
        // return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
        return view ('pesan.check_out', [
            "title" => "Home",
            "active" => "Home",
            "pesanan" => $pesanan,
        ]);
        

    }

    public function delete($id){

        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        alert()->success('Pesanan Berhasil di Hapus', 'Hapus');
        return redirect('check-out');
    }

    public function konfirmasi(){

        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            alert()->error('Maaf, Identitas Harap Dilengkapi!!', 'error');
            return redirect('profil');
        }
        if(empty($user->nohp))
        {
            alert()->error('Maaf, Identitas Harap Dilengkapi!!', 'error');
            return redirect('profil');
        }
        

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->status = 1;
        $pesanan_id = $pesanan->id;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach($pesanan_details as $pesanan_detail){
            $Barang = DetailBarang::where('id', $pesanan_detail->barang_id)->first();
            $Barang->stok = $Barang->stok-$pesanan_detail->jumlah;
            $Barang->update();
        }

        alert()->success('Pesanan Berhasil Check Out', 'Success');
        return redirect('history');

    }
}
