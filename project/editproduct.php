<?php
include_once("config.php"); 
//masalahnya ada di product id, di bawah ini. product id bermasalah, jd product lain juga ga kedetect
if(isset($_POST['update'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $quantity = $_POST['quantity'];

    $result = mysqli_query($db, "UPDATE product SET product_name='$product_name', product_desc='$product_desc', quantity='$quantity' WHERE product_id='$product_id'");
    $result = true;

    if ($result) {
        echo '<script>alert("Product edited successfully!"); window.location.href = "products.php";</script>';
    }
}

if (isset($_GET['product_id'])) {
    while($product = mysqli_fetch_array($result)) {
        $product_name = $product['product_name'];
        $product_desc = $product['product_desc'];
        $quantity = $product['quantity'];
    }
}
    $id = $_GET['id'];//diubah dr sini, getnya diubah jadi id

    $result = mysqli_query($db, "SELECT * FROM product WHERE product_id='$id'");//biar product id 
    $product = mysqli_fetch_array($result);

    // $product_name = $product['product_name'];
    // $product_desc = $product['product_desc'];
    // $quantity = $product['quantity']; -->
// } else {
//     $product_id = '';
//     $product_name = '';
//     $product_desc = '';
//     $quantity = '';
// }
// echo $product_id;//untuk ngecheck apakah product id bekerja. kalau product id dibuatinnya "1", bukan hidden, muncul.
?>
<html>
<head>
    <title>Edit Product Data &#124 Warehouse Application</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
<br><br>

    <div class="header">
  	<h2>Edit Product</h2>
	</div>
        <form name="update_student" method="post" action="editproduct.php">
            <div class="col">
                <label>Name</label>
                <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>"> <!--tambah square bracket-->
            </div>
        
            <div class="col">
                <label>Description</label>
                <input type="text" name="product_desc" value="<?php echo $product['product_desc']; ?>">
            </div>
        
            <div class="col">
                <label>Quantity</label>
                <input type="text" name="quantity" value="<?php echo $product['quantity']; ?>"></td>
            </div>
        
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            <input type="submit" class = "btn" name="update" value="Update">

        <a href="products.php">Back to Products</a>
        </form>
</body>
</html>
