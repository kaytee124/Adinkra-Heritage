$(document).ready(function() {

    // Increment Button Click
    $('.increment-btn').click(function(e) {
        e.preventDefault();

        // Select the input field inside the same .input-group
        var qty = $(this).siblings('.input-qty').val();  // Using siblings to find the input-qty next to the button

        var value = parseInt(qty, 100);
        value = isNaN(value) ? 0 : value;

        // If value is less than 100, increment it
        if (value < 100) {
            value++;
            $(this).siblings('.input-qty').val(value);  // Update the input value
        }
    });

    // Decrement Button Click (You can also implement the decrement button similarly)
    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var qty = $(this).siblings('.input-qty').val();
        var value = parseInt(qty, 100);
        value = isNaN(value) ? 0 : value;

        // If value is greater than 1, decrement it
        if (value > 1) {
            value--;
            $(this).siblings('.input-qty').val(value);
        }
    });

});





    function addToCart(productId) {
        let quantity = document.getElementById('quantity').value;
        var cid = sessionStorage.getItem('cid');
        
        // Ensure quantity is a positive number
        if (isNaN(quantity) || quantity <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter a valid quantity.',
            });
            return;
        }

        // Send the request via AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../actions/addcart_action.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(this.responseText);
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to Cart',
                        text: response.message,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error,
                    });
                }
            }
        };
        xhr.send('product_id=' + productId + '&quantity=' + quantity + '&cid='+ cid); // Replace '1' with actual customer ID
    }

    function updatecart(productId) {
        let quantity = document.getElementById('quantity').value;
        var cid = sessionStorage.getItem('cid');
        document.cookie = 'cid=' + cid;
        
        // Ensure quantity is a positive number
        if (isNaN(quantity) || quantity <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter a valid quantity.',
            });
            return;
        }

        // Send the request via AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../actions/update_cart_action.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Update Cart',
                        text: response.message,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error,
                    });
                }
            }
        };
        xhr.send('product_id=' + productId + '&quantity=' + quantity + '&cid='+ cid); // Replace '1' with actual customer ID
    }
