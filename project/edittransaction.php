<?php
include_once("config.php"); 
//masalahnya ada di product id, di bawah ini. product id bermasalah, jd product lain juga ga kedetect
if(isset($_POST['update'])) {
    $transaction_id = $_POST['transaction_id'];
    $transaction_name = $_POST['transaction_name'];
    $t_date = $_POST['t_date'];
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];

    $result = mysqli_query($db, "UPDATE transaction SET transaction_id='$transaction_id', transaction_name='$transaction_name', t_date='$t_date', user_id='$user_id' WHERE transaction_id='$transaction_id'");
    $result = true;

    $result2 = mysqli_query($db, "UPDATE product_trans SET transaction_id='$transaction_id', product_id='$product_id', quantity='$quantity', status='$status', notes='$notes' WHERE transaction_id='$transaction_id'");
    $result2 = true;

    if ($result && $result2) {
        echo '<script>alert("Data edited successfully!"); window.location.href = "transactions.php";</script>';
    }
}

if (isset($_GET['transaction_id'])) {
    while($transaction = mysqli_fetch_array($result)) {
        $transaction_id = $transaction['transaction_id'];
        $transaction_name = $transaction['transaction_name'];
        $t_date = $transaction['t_date'];
        $user_id = $transaction['user_id'];
    }
}
if (isset($_GET['transaction_id'])) {
    while($product_trans = mysqli_fetch_array($result2)) {
        $transaction_id = $transaction['transaction_id'];
        $product_id = $product_trans['product_id'];
        $quantity = $product_trans['quantity'];
        $status = $product_trans['status'];
        $notes = $product_trans['notes'];
    }
}

    $id = $_GET['id'];//diubah dr sini, getnya diubah jadi id

    $result = mysqli_query($db, "SELECT * FROM transaction JOIN product_trans ON transaction.transaction_id = product_trans.transaction_id WHERE transaction.transaction_id = $id");//biar product id 
    $transaction = mysqli_fetch_array($result);

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
    <title>Edit Transaction Data &#124 Warehouse Application</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
<br><br>
<div class="header">
  	<h2>Edit Transaction</h2>
</div>
<form name="update_student" method="post" action="edittransaction.php">
        <div class="col">
            <label>Transaction Name</label>
            <input type="text" name="transaction_name" value="<?php echo $transaction['transaction_name']; ?>">
        </div>
        
        <div class="col">
            <label>Date</label>
            <input type="date" name="t_date" value="<?php echo $transaction['t_date']; ?>">
        </div>
        
        <div class="col">
            <label>User ID</label>
            <input type="text" name="user_id" value="<?php echo $transaction['user_id']; ?>">
        </div>
        
        <div class="col">
            <label>Product ID</label>
            <input type="text" name="product_id" value="<?php echo $transaction['product_id']; ?>">
        </div>

        <div class="col">
            <label>Quantity</label>
            <input type="text" name="quantity" value="<?php echo $transaction['quantity']; ?>">
        </div>

        <div class="col">
            <label>Status</label>
            <input type="text" name="status" value="<?php echo $transaction['status']; ?>">
        </div>

        <div class="col">
            <label>Notes</label>
            <input type="text" name="notes" value="<?php echo $transaction['notes']; ?>">
        </div>

            <input type="hidden" name="transaction_id" value="<?php echo $transaction['transaction_id']; ?>">
            <input type="submit" class="btn" name="update" value="Update">
            <a href="transactions.php">Go to Transaction</a>
</form>
</body>
</html>

