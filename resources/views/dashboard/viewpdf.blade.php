<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title></title>
    <style>
      h5 {
            margin-top: -80px;
            text-align: center;
          }
    </style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  

  <!--header-->
          
            <img src="img/logoakn.png" style="height: 100px;">
            <h5>KONTRAKTOR – PENGADAAN BARANG/JASA <br>
          JL. MT. HARYONO 970 RUKO METRO PLAZA BLOK C 17 SEMARANG <br>
          TELP. (024) 8417926. FAX. (024)86454424</h5>

          <hr>

      

        
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Detail Pemesanan</h1>
          </div>
          
                  <table class="table" style="border:1px; text-align:center;">
                    <thead>
                      <tr>
                        <th scope="col" style="border:1px solid">No</th>
                        <th scope="col" style="border:1px solid">Nama Pemesan</th>
                        <th scope="col" style="border:1px solid">ID Pemesan</th>
                        <th scope="col" style="border:1px solid">Total Harga</th>
                        <th scope="col" style="border:1px solid">Pembayaran via</th>
                        <th scope="col" style="border:1px solid">Bank Pembayaran</th>
                        <th scope="col" style="border:1px solid">Tanggal Pembayaran</th>
                        <th scope="col" style="border:1px solid">Status Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($transaksi as $t)
                      <tr>
                        <td style="border:1px solid">{{ $loop->iteration }}</td>
                        <td style="border:1px solid">{{ $t->name }}</td>
                        <td style="border:1px solid">{{ $t->order_id }}</td>
                        <td style="border:1px solid">RP-,{{ number_format($t->gross_amount) }}</td>
                        <td style="border:1px solid">{{ $t->payment_type }}</td>
                        <td style="border:1px solid">{{ $t->bank }}</td>
                        <td style="border:1px solid">{{ $t->transaction_time }}</td>
                        <td style="border:1px solid">{{ $t->status }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

</body>

</html>