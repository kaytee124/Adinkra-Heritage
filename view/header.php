<?php
include_once('../settings/core.php');

check_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    Adinkra Heritage
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Add styles to ensure horizontal alignment */
        .header .flex nav ul li.logo {
            display: flex;
            align-items: center; /* Vertically center the text and icon */
        }

        .header .flex nav ul li.logo svg {
            margin-right: 8px; /* Space between the icon and the text */
        }
    </style>
</head>
<header class="header">
    <div class="flex">
        <nav>
            <ul>
                <li class="logo"> 
                    <a href="userDash.php" class="menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                        </svg>
                        <span>Home</span>
                        
                    </a>
                </li>
                <li><a href="view-brand_list_customers.php" class="menu">Brands</a></li>
                <li><a href="view_product_customers.php" class="menu">Products</a></li>
                <li class="logo"> 
                    <a href="viewcart.php" class="menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1h1.11l.401 2H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zM5.5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm5 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                        <span>Cart</span>
                    </a>
                </li>
                <li><a href="order-histoy.php" class="menu">Orders</a></li>
                <li><a href="../actions/logoutactions.php" class="menu">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>
    <!-- Your body content goes here -->
</body>
</html>
