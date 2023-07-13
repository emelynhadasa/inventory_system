<?php
    include_once("config.php");

    $id = $_GET['id'];
    
    // Delete rows from locator table
    $result1 = mysqli_query($db, "DELETE FROM locator WHERE product_id = $id");

    // Delete rows from product_trans table
    $result2 = mysqli_query($db, "DELETE FROM product_trans WHERE product_id = $id");

    // Delete rows from transaction table
    $result3 = mysqli_query($db, "DELETE FROM transaction WHERE transaction_id IN (SELECT transaction_id FROM product_trans WHERE product_id = $id)");

    // Delete row from product table
    $result4 = mysqli_query($db, "DELETE FROM product WHERE product_id = $id");

    if ($result1 && $result2 && $result3 && $result4) {
        echo '<script>alert("Product deleted successfully!"); window.location.href = "products.php";</script>';
    } else {
        echo "Error deleting product: " . mysqli_error($db);
    }
?>
