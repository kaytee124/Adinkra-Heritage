var paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener('submit', payWithPaystack, false);

function payWithPaystack(e) {
    e.preventDefault(); // Prevent default form submission behavior

    var handler = PaystackPop.setup({
        key: 'pk_test_81cabeba362a280aa1e5a4b6645a963a57fc939c', // Replace with your public key
        email: 'kaytee@gmail.com', // Replace with the customer's email
        amount: 100, // the amount value is multiplied by 100 to convert to the lowest currency unit (GHS 100)
        currency: 'GHS', // Currency in Ghana Cedis (GHS)
        ref: "" + Math.floor(Math.random() * 1000000000 + 1), // Generate a random reference number
        callback: function(response) {
            // On successful payment, process the response
            $.ajax({
                url: "process.php?reference=" + response.reference, // Send the payment reference to your server for verification
                method: "GET", // Use GET method
                success: function (response) {
                    window.location.href = "index.php"; // Redirect to index page after payment
                }
            });
            var reference = response.reference;
            alert('Payment complete! Reference: ' + reference); // Alert the user of the payment completion
        },
        onClose: function() {
            alert('Transaction was not completed, window closed.'); // Alert if the user closes the payment window
        }
    });

    handler.openIframe(); // Open Paystack's inline payment iframe
}
