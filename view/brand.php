<?php include '../view/venderheader.php'; ?>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />
<body class="Brand">
  <div class="brand-list-container">
    <div class="add-brandbox" id="brandBox">
      <form action="../actions/add_brand_action.php" id="add-brand-Form" method="POST" enctype="multipart/form-data">
      <b id="BrandTitle" class="welcome-text">Add a Brand</b>
      <?php
                require("../classes/category_class.php");
                echo "
                <script>
                    var cid = sessionStorage.getItem('cid');
                    document.cookie = 'cid=' + cid;
                </script>
                ";
                $cid = $_COOKIE['cid'] ?? null; // Get customer ID from cookie
                $catModel = new category_class();
                $category = $catModel->db_fetch_all("SELECT * FROM categories");
                ?>
                <input type="hidden" name="customer_id" value="<?php echo $cid; ?>"> <!-- Add customer_id field -->
                <select name="brand_cat" class ="input-field" required>
                    <option value="" disabled selected>Select Category</option>
                    <?php
                    foreach ($category as $category) {
                        echo "<option value='{$category['cat_id']}'>{$category['cat_name']}</option>";
                    }
                    ?>
                </select>
        <input type="text" name="brand_name" placeholder="Brand Name" required class="input-field">
        <input type="file" id="image" name="image" class="input-field">
        <button type="submit" class="add-brand">Add-Brand</button>
        <hr>
      </form>
    </div>
  </div>
</body>
</html>
