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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
   header {
      background-color: #4CAF50; /* Green background */
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
   }

   header h1 {
      font-size: 36px;
      margin: 0;
   }

   header nav {
      margin-top: 10px;
   }

   header nav a {
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      margin: 0 15px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
   }

   header nav a:hover {
      background-color: #45a049;
   }
</style>

</head>
<header class="header">
    <div class="flex">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="viewproduct.php">Adinkra Heritage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="brand.php">Add a brand</a>
                <a class="nav-link" href="viewproduct.php">Products</a>
                <a class="nav-link" href="view-brand_list.php">Brands</a>
                <a class="nav-link" href="add-product.php">Add Product</a>
                <a class="nav-link" href="../actions/logoutactions.php">Logout</a>
              </div>
            </div>
          </div>
        </nav>
    </div>
</header>

<body>
    <!-- Your body content goes here -->
</body>
</html>
