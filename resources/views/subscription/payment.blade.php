<html>
<head>
    <title>Midtrans Payment</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <h2>Pilih Metode Pembayaran</h2>

    <select id="payment-method">
        <option value="gopay">GoPay</option>
        <option value="bank_transfer">Bank Transfer</option>
        <option value="credit_card">Kartu Kredit</option>
    </select>

    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        var paymentMethod = document.getElementById('payment-method');

        payButton.addEventListener('click', function () {
            var selectedMethod = paymentMethod.value;
            
            window.snap.pay('{{ $snapToken }}', {
                paymentType: selectedMethod, // ini untuk informasi ke server kamu (kalau mau)
                onSuccess: function(result){
                    alert("Pembayaran sukses!");
                    console.log(result);
                    window.location.href = "/subscription/success"; // Redirect setelah sukses
                },
                onPending: function(result){
                    alert("Pembayaran pending.");
                    console.log(result);
                },
                onError: function(result){
                    alert("Pembayaran gagal.");
                    console.log(result);
                },
                onClose: function(){
                    alert('Kamu menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        });
    </script>
</body>
</html>
