<?php
    if(isset($_POST['Submit'])) {
        $product_name = $_POST['product_name'];
        $product_desc = $_POST['product_desc'];
        $quantity = $_POST['quantity'];

        include_once("config.php");

        $result = mysqli_query($db, "INSERT INTO product(product_name, product_desc, quantity)
        VALUES('$product_name', '$product_desc', '$quantity')");
        $result = true;

        if ($result) {
            echo '<script>alert("Product entered successfully!"); window.location.href = "products.php";</script>';
        }
    }
?>

<html>
    <head>
        <title>Add Product &#124 Warehouse Application</title>
        <link rel="stylesheet" href="stylee.css">
    </head>
    <body>
        <br><br>

        <div class="header">
  			<h2>Add Product</h2>
		</div>
        <form action="addproduct.php" method="post" name="form1">
                
                <div class="col">
                    <label>Name</label>
                    <input type="text" name="product_name">
                </div>
                
                <div class="col">
                    <label>Description</label>
                    <input type="text" name="product_desc">
                </div>
                
                <div class="col">
                    <label>Quantity</label>
                    <input type="text" name="quantity">
                </div>

                <input type="submit" class="btn" name="Submit" value="   Add    ">
                <a href="products.php">Back to Products</a>
        </form>
    </body>
</html>