@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($pesanan->status == 1)
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan->tanggal }}</td>
                                    <td>RP-, {{ number_format($pesanan->jumlah_harga) }} </td>
                                    <td>
                                        <button id="paybtn" type="button" class="btn btn-primary center-block">
                                            Bayar Sekarang
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>

            <form id="payment-form" method="get" action="Payment">
                <input type="hidden" name="result_data" id="result-data" value=""></div>
            </form>
            <pre><div id="result-json"></div></pre>
            </body>

            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-d3KFumzg5tau0DVW"></script>
            <script type="text/javascript" src="https://api.affinipay.com/assets/api/v1/chargeio.min.js"></script>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script type="text/javascript">
                            document.getElementById('paybtn').onclick = function(){

                        var resultType = document.getElementById('result-type');
                        var resultData = document.getElementById('result-data');
                        function changeResult(type,data){
                            $("#result-type").val(type);
                            $("#result-data").val(JSON.stringify(data));
                        }
                        snap.pay('<?= $snapToken ?>', {
                            // optional
                            onSuccess: function(result){
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form").submit();
                            },
                            onPending: function(result){
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            },
                            onError: function(result){
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            }
                        });
                        };
            </script>

@endsection