function payWithPaystack(email, amount) {
    var handler = PaystackPop.setup({
        key: 'pk_test_81cabeba362a280aa1e5a4b6645a963a57fc939c',
        email: email,
        amount: amount,
        currency: 'GHS',
        ref: '' + Math.floor(Math.random() * 1000000000 + 1),
        callback: function(response) {
            $.ajax({
                url: "../payment/checkout_process.php?reference=" + response.reference,
                method: "GET",
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Payment Successful!',
                        text: 'Your payment was completed successfully!',
                    }).then(() => {
                        sessionStorage.setItem('paymentStatus', 'success');
                        window.location.href = "../view/checkout.php";
                    });
                }
            });
        },
        onClose: function() {
            Swal.fire({
                icon: 'warning',
                title: 'Payment Cancelled',
                text: 'You did not complete the payment process.',
            });
        }
    });
    handler.openIframe();
}
