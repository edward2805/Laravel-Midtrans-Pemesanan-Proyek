<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($pesanan->status == 1)
                <div class="row">
                    <div class="col-md-12">
                        <button id="paybtn" type="button" class="btn btn-primary center-block">
                            Pay!!
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<form id="payment-form" method="get" action="Payment">
    <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>

</body>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-d3KFumzg5tau0DVW"></script>
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
                console.log(result);
                $("#payment-form").submit();
            },
            onError: function(result){
                changeResult('error', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
            }
        });
    };
</script>