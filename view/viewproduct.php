<?php include '../view/venderheader.php'; ?>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />
<link rel="stylesheet" href="../css/productdisplay.css">

<div class="container">
   <section class="display-product-table">
      <table>
         <thead>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Delete</th>
            <th>Edit</th>
         </thead>
         <tbody>
            <?php
               include("../controllers/product_controller.php");
               $products = viewProductsController();

               if ($products) {
                  foreach ($products as $product) {
                     echo "
                     <tr>
                        <td><img src='../images/product/{$product['product_image']}' height='100' alt='Product Image'></td>
                        <td>{$product['product_title']}</td>
                        <td>\${$product['product_price']}/-</td>
                        <td>
                           <a href='../actions/delete_product_action.php?id={$product['product_id']}' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this?\");'>
                              <i class='fas fa-trash'></i> Delete
                           </a>
                        </td>
                        <td>
                           <a href='vendorsedit.php?id={$product['product_id']}' class='delete-btn btn-success'>
                              Edit
                           </a>
                        </td>
                     </tr>";
                  }
               } else {
                  echo "<tr><td colspan='4' class='empty'>No products available</td></tr>";
               }
            ?>
         </tbody>
      </table>
   </section>
</div>

</body>
</html>
