<?php
    include_once("config.php");

    $id = $_GET['id'];

    $result2 = mysqli_query($db, "DELETE FROM product_trans WHERE transaction_id = $id"); //diubah jadi id
    $result2 = true;
    
    $result = mysqli_query($db, "DELETE FROM transaction WHERE transaction_id = $id"); //diubah jadi id
    $result = true;

    $result2 = mysqli_query($db, "DELETE FROM product_trans WHERE transaction_id = $id"); //diubah jadi id
    $result2 = true;

    if ($result && $result2) {
        echo '<script>alert("Data deleted successfully!"); window.location.href = "transactions.php";</script>';
    }
?>