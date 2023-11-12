<?php

namespace App\Http\Controllers;
use App\Models\DetailBarang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Auth;
use Alert;
use Illuminate\Http\Request;
use App\Models\transaksi_pembayaran;
use Illuminate\Support\Arr;

class HistoryController extends Controller
{
    public $snapToken;
    public $pesanan;
    public $va_number, $gross_amount, $bank, $transaction_status, $deadline;

    public function index(){
        $pesan = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();
        
        
            return view ('history.index', [
                "title" => "History",
                "active" => "Home",
                "pesanans" => $pesan]);
    }


    public function bayar($id){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-WrsrdmI5DQdQnbr-Lh1Hji_O';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        if(isset($_GET['result_data'])){

            $current_status = json_decode($_GET['result_data'],true);
            $order_id       = $current_status['order_id'];
            $this->pesanan = Pesanan::where('id', $order_id)->first();
            $this->pesanan->status = 2;
            $this->pesanan->update();
        }else{
            $this->pesanan = Pesanan::find($id);
        }
            
            if(!empty($this->pesanan)){
                if($this->pesanan->status == 1){
                    $params = array(
                        'transaction_details' => array(
                            'order_id' => $this->pesanan->id,
                            'gross_amount' => $this->pesanan->jumlah_harga,
                        ),
                        'customer_details' => array(
                            'first_name' => 'Saudara',
                            'last_name' => Auth::user()->name,
                            'email' => Auth::user()->email,
                            'phone' => Auth::user()->nohp,
                        ),
                    );
                    $this->snapToken = \Midtrans\Snap::getSnapToken($params);
            }
            else if($this->pesanan->status == 2){
                $status = \Midtrans\Transaction::status($this->pesanan->id);
                $status = json_decode(json_encode($status), true);
                

                $transaksi = new transaksi_pembayaran;
                $transaksi->status = $status['transaction_status'];
                $transaksi->name = Auth::user()->name;
                $transaksi->email = Auth::user()->email;
                $transaksi->order_id = $status['order_id'];
                $transaksi->payment_type = $status['payment_type'];
                $transaksi->payment_code = $status['transaction_id'];
                $transaksi->gross_amount = $status['gross_amount'];
                $transaksi->transaction_time = $status['transaction_time'];
                $transaksi->va_number = $status['va_numbers'][0]['va_number'];
                $transaksi->bank = $status['va_numbers'][0]['bank'];
                $transaksi->save();
                
                alert()->success('Pembayaran sukses', 'Bayar');
                return redirect('history');
                
            }
            return view ('history.pembayaran', [
                "title" => "History",
                "active" => "Home",
                "pesanan" =>$this->pesanan,
                "snapToken" =>$this->snapToken]);
        }
    }
    public function status($id){
        $transaksi = transaksi_pembayaran::where('order_id', $id)->first();
        $status = json_decode($transaksi,true);
          
        // dd($status);

        $name                 = $status['name'];
        $va_number            = $status['va_number'];
        $gross_amount         = $status['gross_amount'];
        $bank                 = $status['bank'];
        $status_transaksi     = $status['status'];


        // dd($barang_id1);

        return view ('history.status', [
            "title" => "status",
            "active" => "Home",
            "name" => $name,
            "va_number" => $va_number,
            "gross_amount" => $gross_amount,
            "bank" => $bank,
            "status" => $status_transaksi
        ]);
    }

    

}
